<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class MessageController extends Controller
{
    public function inbox(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $userId = Auth::id();
        
        // Fetch active cart items for the header counter
        $cartData = Cart::where('user_id', '=', $userId)->get();

        // Get all unique users the current user has chatted with
        $senderIds = Message::where('receiver_id', $userId)->pluck('sender_id')->toArray();
        $receiverIds = Message::where('sender_id', $userId)->pluck('receiver_id')->toArray();
        $chattedUserIds = array_unique(array_merge($senderIds, $receiverIds));

        $chats = User::whereIn('id', $chattedUserIds)
            ->where('id', '!=', $userId)
            ->get()
            ->map(function ($user) use ($userId) {
                // Get last message in the conversation
                $lastMessage = Message::where(function ($q) use ($userId, $user) {
                    $q->where('sender_id', $userId)->where('receiver_id', $user->id);
                })->orWhere(function ($q) use ($userId, $user) {
                    $q->where('sender_id', $user->id)->where('receiver_id', $userId);
                })->orderBy('created_at', 'desc')->first();

                $user->last_message = $lastMessage;
                $user->unread_count = Message::where('sender_id', $user->id)
                    ->where('receiver_id', $userId)
                    ->where('is_read', false)
                    ->count();
                return $user;
            })
            ->sortByDesc(function ($chat) {
                return $chat->last_message ? $chat->last_message->created_at : now();
            });

        // Determine if there is an active chat selected
        $activeChatUser = null;
        $activeChatMessages = collect();
        $activeProduct = null;

        $targetUserId = $request->query('user_id');
        $targetProductId = $request->query('product_id');

        if ($targetUserId && $targetUserId != $userId) {
            $activeChatUser = User::find($targetUserId);
            if ($activeChatUser) {
                // If this is a new chat not yet in $chats, add it dynamically
                if (!$chats->contains('id', $activeChatUser->id)) {
                    $activeChatUser->last_message = null;
                    $activeChatUser->unread_count = 0;
                    $chats->push($activeChatUser);
                }
                
                // Mark messages from target user as read
                Message::where('sender_id', $targetUserId)
                    ->where('receiver_id', $userId)
                    ->where('is_read', false)
                    ->update(['is_read' => true]);

                $activeChatMessages = Message::where(function ($q) use ($userId, $targetUserId) {
                    $q->where('sender_id', $userId)->where('receiver_id', $targetUserId);
                })->orWhere(function ($q) use ($userId, $targetUserId) {
                    $q->where('sender_id', $targetUserId)->where('receiver_id', $userId);
                })->orderBy('created_at', 'asc')->get();
            }
        }

        if ($targetProductId) {
            $activeProduct = Product::find($targetProductId);
        }

        return view('user.chat', compact('chats', 'activeChatUser', 'activeChatMessages', 'activeProduct', 'cartData'));
    }

    public function getMessages($chatUserId)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $userId = Auth::id();

        // Mark messages as read
        Message::where('sender_id', $chatUserId)
            ->where('receiver_id', $userId)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        // Retrieve messages
        $messages = Message::where(function ($q) use ($userId, $chatUserId) {
            $q->where('sender_id', $userId)->where('receiver_id', $chatUserId);
        })->orWhere(function ($q) use ($userId, $chatUserId) {
            $q->where('sender_id', $chatUserId)->where('receiver_id', $userId);
        })->orderBy('created_at', 'asc')->get();

        $formattedMessages = $messages->map(function ($msg) {
            // Check if product image is video for preview
            $productInfo = null;
            if ($msg->product) {
                $ext = strtolower(pathinfo($msg->product->image, PATHINFO_EXTENSION));
                $productInfo = [
                    'title' => $msg->product->title,
                    'image' => $msg->product->image,
                    'is_video' => in_array($ext, ['mp4', 'webm', 'ogg', 'mov', 'avi'])
                ];
            }

            return [
                'id' => $msg->id,
                'sender_id' => $msg->sender_id,
                'receiver_id' => $msg->receiver_id,
                'message' => $msg->message,
                'created_at_formatted' => $msg->created_at->format('M d, H:i'),
                'is_read' => (bool)$msg->is_read,
                'product' => $productInfo
            ];
        });

        return response()->json([
            'messages' => $formattedMessages,
            'current_user_id' => $userId
        ]);
    }

    public function sendMessage(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
            'product_id' => 'nullable|exists:products,id'
        ]);

        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'product_id' => $request->product_id,
            'message' => $request->message,
            'is_read' => false
        ]);

        return response()->json([
            'success' => true,
            'message' => [
                'id' => $message->id,
                'sender_id' => $message->sender_id,
                'message' => $message->message,
                'created_at_formatted' => $message->created_at->format('M d, H:i')
            ]
        ]);
    }

    public function startChat($productId)
    {
        if (!Auth::check()) {
            Alert::warning('Login Required', 'Please log in to chat with the seller');
            return redirect()->route('login');
        }

        $product = Product::findOrFail($productId);
        $sellerId = $product->user_id;

        if ($sellerId == Auth::id()) {
            Alert::warning('Error', 'You cannot chat with yourself about your own product!');
            return redirect()->back();
        }

        // If product was listed by admin or user_id is empty, direct chat to admin user
        if (!$sellerId) {
            $admin = User::where('usertype', '1')->first();
            $sellerId = $admin ? $admin->id : 1;
        }

        return redirect()->route('messages.inbox', [
            'user_id' => $sellerId,
            'product_id' => $productId
        ]);
    }

    public function sync(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $userId = Auth::id();
        $activeChatUserId = $request->query('active_user_id');

        // Mark active chat messages as read
        if ($activeChatUserId) {
            Message::where('sender_id', $activeChatUserId)
                ->where('receiver_id', $userId)
                ->where('is_read', false)
                ->update(['is_read' => true]);
        }

        // Get chatted users
        $senderIds = Message::where('receiver_id', $userId)->pluck('sender_id')->toArray();
        $receiverIds = Message::where('sender_id', $userId)->pluck('receiver_id')->toArray();
        $chattedUserIds = array_unique(array_merge($senderIds, $receiverIds));

        $chats = User::whereIn('id', $chattedUserIds)
            ->where('id', '!=', $userId)
            ->get()
            ->map(function ($user) use ($userId) {
                $lastMessage = Message::where(function ($q) use ($userId, $user) {
                    $q->where('sender_id', $userId)->where('receiver_id', $user->id);
                })->orWhere(function ($q) use ($userId, $user) {
                    $q->where('sender_id', $user->id)->where('receiver_id', $userId);
                })->orderBy('created_at', 'desc')->first();

                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'unread_count' => Message::where('sender_id', $user->id)
                        ->where('receiver_id', $userId)
                        ->where('is_read', false)
                        ->count(),
                    'last_message' => $lastMessage ? [
                        'message' => $lastMessage->message,
                        'time' => $lastMessage->created_at->format('H:i'),
                        'timestamp' => $lastMessage->created_at->timestamp
                    ] : null
                ];
            })
            ->sortByDesc(function ($chat) {
                return $chat['last_message'] ? $chat['last_message']['timestamp'] : 0;
            })
            ->values()
            ->all();

        // Get active chat messages if active user is selected
        $activeMessages = [];
        if ($activeChatUserId) {
            $messages = Message::where(function ($q) use ($userId, $activeChatUserId) {
                $q->where('sender_id', $userId)->where('receiver_id', $activeChatUserId);
            })->orWhere(function ($q) use ($userId, $activeChatUserId) {
                $q->where('sender_id', $activeChatUserId)->where('receiver_id', $userId);
            })->orderBy('created_at', 'asc')->get();

            $activeMessages = $messages->map(function ($msg) {
                $productInfo = null;
                if ($msg->product) {
                    $ext = strtolower(pathinfo($msg->product->image, PATHINFO_EXTENSION));
                    $productInfo = [
                        'title' => $msg->product->title,
                        'image' => $msg->product->image,
                        'is_video' => in_array($ext, ['mp4', 'webm', 'ogg', 'mov', 'avi'])
                    ];
                }

                return [
                    'id' => $msg->id,
                    'sender_id' => $msg->sender_id,
                    'receiver_id' => $msg->receiver_id,
                    'message' => $msg->message,
                    'created_at_formatted' => $msg->created_at->format('M d, H:i'),
                    'is_read' => (bool)$msg->is_read,
                    'product' => $productInfo
                ];
            });
        }

        // Total unread messages count for header badges
        $totalUnreadCount = Message::where('receiver_id', $userId)
            ->where('is_read', false)
            ->count();

        return response()->json([
            'chats' => $chats,
            'messages' => $activeMessages,
            'total_unread_count' => $totalUnreadCount,
            'current_user_id' => $userId
        ]);
    }
}

