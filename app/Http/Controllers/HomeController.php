<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Stripe;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Models\SellerComment;
use App\Models\Reward;



class HomeController extends Controller
{
    //
    public function index(){
        $categories = Category::all();
        $products = Product::all();

        if(Auth::id()){
            // Only block users who have a pending SMS code (new registrations awaiting verification)
            if (!is_null(Auth::user()->sms_code) && is_null(Auth::user()->sms_verified_at) && Auth::user()->usertype == 0) {
                return redirect()->route('sms.verify');
            }
            $user_id = Auth::user()->id;
            $cartData = Cart::where('user_id', '=', $user_id)->get();
            return view('user.index', compact('products', 'categories', 'cartData'));
        }else{
            return view('user.index', compact('products', 'categories'));
        }
    }

    public function Home(){

        $userType = Auth::user()->usertype;

        // Only block users who have a pending SMS code (new registrations awaiting verification)
        if ($userType == '0' && !is_null(Auth::user()->sms_code) && is_null(Auth::user()->sms_verified_at)) {
            return redirect()->route('sms.verify');
        }

        /* Admin User */
        if($userType == '1'){

            $total_users = User::where('usertype', 0)->count();
            $products = Product::all();
            $total_product = 0;
            $revenue = 0;
            $sold_products = 0;

            foreach($products as $product){
                $total_product += $product->quantity;
            }

            $total_orders  = Order::where('delivery_status','!=','passive_order')->count();
            $orders = Order::all();

            foreach($orders as $order){
                $sold_products += $order->quantity;
                if($order->payment_status == 'paid'){
                    $revenue += $order->price;
                }
            }

            return view('admin.home',compact(
                'total_users',
                'total_product',
                'total_orders',
                'revenue',
                'sold_products'
            ));

        }else{

            /* Regular User */
            $categories = Category::all();
            $products = Product::all();
            $user_id = Auth::user()->id;
            $cartData = Cart::where('user_id', '=', $user_id)->get();
            return view('user.index', compact('products', 'categories','cartData'));
            
        }

    }

    public function UserAccount()
    {
        if (Auth::check()) {
            $userType = Auth::user()->usertype;
            if ($userType == 0) {
                $user = Auth::user();
                $cartData = Cart::where('user_id', '=', $user->id)->get();
                $categories = Category::all();
                $user_products = Product::where('user_id', $user->id)->get();
                $sold_orders = Order::whereIn('product_id', $user_products->pluck('id'))->latest()->get();
                $bought_orders = Order::where('user_id', $user->id)->latest()->get();
                $user_categories = Category::where('user_id', $user->id)->get();
                return view('user.my-account', compact('user', 'cartData', 'categories', 'user_products', 'sold_orders', 'bought_orders', 'user_categories'));
            } else {
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
    }

    public function UserLogout(Request $request): RedirectResponse
    {

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Cookie::queue(Cookie::forget('XSRF-TOKEN'));
        Cookie::queue(Cookie::forget('laravel_session'));
        return redirect('/');
    }

    public function ProductDetails($id)
    {
        $product = Product::find($id);

        // check if a user is logged in
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $cartData = Cart::where('user_id', '=', $user_id)->get();
            return view('user.product_details', compact('product', 'cartData'));
        }else{
            return view('user.product_details', compact('product'));
        }
    }

    public function ShopPage()
    {
        $categories = Category::all();
        $products = Product::all();
        // check if a user is logged in
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $cartData = Cart::where('user_id', '=', $user_id)->get();
            return view('user.shop', compact('products', 'categories', 'cartData'));
        }else{
            return view('user.shop', compact('products', 'categories'));
        }
        
    }

    public function ContactPage()
    {
        $cartData = collect();
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $cartData = Cart::where('user_id', '=', $user_id)->get();
        }
        return view('user.contact', compact('cartData'));
    }

    public function SendContactMail(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:150',
            'phone'   => 'nullable|string|max:30',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:5000',
        ]);

        // Send email (non-fatal)
        try {
            Mail::to('shamal.geethanjanpathirana@gmail.com')
                ->send(new ContactFormMail(
                    $validated['name'],
                    $validated['email'],
                    $validated['phone'] ?? '',
                    $validated['subject'],
                    $validated['message']
                ));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Contact email failed: ' . $e->getMessage());
        }

        // Send SMS to owner via Twilio (non-fatal)
        try {
            $smsBody  = "New Contact Msg\n";
            $smsBody .= "Name: " . $validated['name'] . "\n";
            $smsBody .= "Email: " . $validated['email'] . "\n";
            $smsBody .= "Phone: " . ($validated['phone'] ?? 'N/A') . "\n";
            $smsBody .= "Subject: " . $validated['subject'] . "\n";
            $smsBody .= "Msg: " . \Illuminate\Support\Str::limit($validated['message'], 160);

            \App\Services\TwilioService::sendSms('+94715356253', $smsBody);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Contact SMS failed: ' . $e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Your message has been sent successfully!']);
    }

    public function AddToCart(Request $request, $id)
    {
        if(Auth::check()){

            $user = Auth::user();
            $product = Product::find($id);

            /* Prevent buying own product */
            if ($user->id == $product->user_id) {
                Alert::warning('Adding product failed!', 'You cannot purchase your own product!');
                return redirect()->back();
            }

            /* check if the requested quantity is more then stock quantity */
            if($request->quantity > $product->quantity){
                Alert::warning('Adding product failed!', 'The requested quantity for this product exceeds the available stock. We have only ' . $product->quantity . ' of this product in out stock.');
                return redirect()->back();
            }else{
                /* check if product already exits in the card
                in this case just the quantity and price should be updated
            */
                $rawPrice = !empty($product->discount_price) ? $product->discount_price : $product->price;
                $unitPrice = floatval(preg_replace('/[^0-9.]/', '', $rawPrice));
                $addedTotalPrice = $unitPrice * intval($request->quantity);

                $cart = Cart::where('product_id', $product->id)->where('user_id', $user->id)->first();
                if ($cart) {
                    // if the cart record exists, update the quantity and price columns
                    $cart->quantity += $request->quantity;
                    $cart->price = strval(floatval($cart->price) + $addedTotalPrice);
                    $cart->save();
                } else {

                    $cart = new Cart();
                    $cart->user_id = $user->id;
                    $cart->name = $user->name;
                    $cart->email = $user->email;
                    $cart->phone = $user->phone;
                    $cart->address = $user->address;
                    $cart->product_title = $product->title;
                    $cart->product_id = $product->id;
                    $cart->quantity = $request->quantity;
                    $cart->price = strval($addedTotalPrice);
                    $cart->image = $product->image;
                    $cart->save();
                }

                // update the quantity in products table
                $product->quantity -= $request->quantity;
                $product->save();

                // Send SMS stock alert to seller if product quantity is 0 or less
                if ($product->quantity <= 0) {
                    try {
                        $seller = \App\Models\User::find($product->user_id);
                        if ($seller && !empty($seller->phone)) {
                            $smsAlert = "⚠️ Stock Alert: Your product '{$product->title}' is out of stock! Please log in to your account to refill stock.";
                            \App\Services\TwilioService::sendSms($seller->phone, $smsAlert);
                        }
                    } catch (\Exception $e) {
                        \Illuminate\Support\Facades\Log::error('Seller stock SMS alert error: ' . $e->getMessage());
                    }
                }

                Alert::success('Product Added Successfully!','We have added product to cart');
                return redirect()->back();
            }

        }else{
            return redirect('login');
        }
    }

    public function CartPage()
    {
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $cartData = Cart::where('user_id', '=', $user_id)->get();
            return view('user.cart', compact('cartData'));
        }else{
            return redirect('login');
        }
    }

    public function RemoveProductFromCart($id)
    {
        if (Auth::check()) {
            $removing_product = Cart::find($id);
            if ($removing_product) {
                $product = Product::find($removing_product->product_id);
                if ($product) {
                    // Update the quantity of the product in the products table
                    $product->quantity += $removing_product->quantity;
                    $product->save();

                    // Remove the product from the cart
                    $removing_product->delete();

                    return redirect()->route('user.cart')->with('success', 'Product removed from cart!');
                } else {
                    return redirect()->back()->with('error', 'Product not found!');
                }
            } else {
                return redirect()->back()->with('error', 'Product not found in cart!');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function ClearCart()
    {
        if (Auth::check()) {
            Cart::where('user_id', Auth::id())->delete();
            return redirect()->back()->with('success', 'Cart cleared successfully!');
        } else {
            return redirect('login');
        }
    }

    public function Checkout()
    {
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $cartData = Cart::where('user_id', '=', $user_id)->get();
            return view('user.checkout', compact('cartData'));
        }else{
            return redirect('login');
        }
    }

    public function CashOrder()
    {
        if(Auth::check()){

            $user = Auth::user();
            $user_id = $user->id;
            $cartData = Cart::where('user_id','=',$user_id)->get();

            foreach($cartData as $data){

                $order = new Order();
                $order->user_id = $data->user_id;
                $order->name = $data->name;
                $order->email = $data->email;
                $order->phone = $data->phone;
                $order->address = $data->address;
                $order->product_title = $data->product_title;
                $order->product_id = $data->product_id;
                $order->quantity = $data->quantity;
                $order->price = $data->price;
                $order->image = $data->image;
                $order->tracking_id ='TRK' . Str::limit(uniqid('', true), 15 - strlen('TRK'), '');
                $order->delivery_status = 'pending';
                $order->payment_status = 'cash_on_delivery';
                $order->save();

                
                $cart_id = $data->id;
                $cart = Cart::find($cart_id);
                $cart->delete();
                   
            }
            Alert::success('your order has been received', 'Your order has been received');
            return redirect()->route('user.orders');


        }else{
            redirect('login');
        }
    }

    public function UserOrders()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $cartData = Cart::where('user_id', '=', $user_id)->get();
            $orderData = Order::where('user_id', '=', $user_id)->where('delivery_status', '<>', 'passive_order')->get();
            $past_orders = Order::where('user_id', '=', $user_id)->where('delivery_status', '=', 'passive_order')->get();
            return view('user.orders', compact('orderData', 'cartData','past_orders'));
        } else {
            return redirect('login');
        }
    }

    public function OrderReceived($id)
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $order = Order::where('id', $id)->where('user_id', $user_id)->first();

            if ($order) {
                $order->delivery_status = 'passive_order';
                $order->save();

                $buyer = Auth::user();
                $buyer->reward_points += floor(floatval($order->price));
                $buyer->save();

                Alert::success('Order Received & Confirmed! ✅', 'Thank you! Your order is complete with a Green Tick status.');
                return redirect(route('user.account') . '#my-orders');
            } else {
                Alert::error('Error', 'Order not found.');
                return redirect(route('user.account') . '#my-orders');
            }
        } else {
            return redirect('login');
        }
    }

    public function CancelOrder($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            // Get the order that needs to be canceled
            $order = Order::find($id);

            // Create a new cart item for the canceled order
            $cartItem = new Cart();
            $cartItem->user_id = $user->id;
            $cartItem->product_id = $order->product_id;
            $cartItem->quantity = $order->quantity;
            $cartItem->price = $order->price;
            $cartItem->name = $user->name;
            $cartItem->email = $user->email;
            $cartItem->phone = $user->phone;
            $cartItem->address = $user->address;
            $cartItem->product_title = $order->product_title;
            $cartItem->image = $order->image;
            $cartItem->save();

            // Delete the order
            $order->delete();
            Alert::success('Order Cancelled!', 'The Order Has Been Successfully Cancelled');
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }

    public function Stripe($totalPrice)
    {
        if(Auth::check()){
            return view('user.stripe', compact('totalPrice'));
        }else{
            return redirect('login');
        }
    }

    public function StripePost(Request $request, $totalPrice)
    {
        if(Auth::check()){
            $stripeSecret = env('STRIPE_SECRET');
            $isTest = true;

            if (!empty($stripeSecret) && !str_contains($stripeSecret, '00000') && $request->has('stripeToken')) {
                try {
                    Stripe\Stripe::setApiKey($stripeSecret);
                    Stripe\Charge::create([
                        "amount" => floatval($totalPrice) * 100,
                        "currency" => "usd",
                        "source" => $request->stripeToken,
                        "description" => "Cyclone Technologies Order Payment"
                    ]);
                    $isTest = false;
                } catch (\Exception $e) {
                    \Illuminate\Support\Facades\Log::info("Stripe charge notice (Test Mode activated): " . $e->getMessage());
                }
            }

            $user = Auth::user();
            $user_id = $user->id;
            $cartData = Cart::where('user_id', '=', $user_id)->get();

            foreach ($cartData as $data) {
                $order = new Order();
                $order->user_id = $data->user_id;
                $order->name = $data->name;
                $order->email = $data->email;
                $order->phone = $data->phone;
                $order->address = $data->address;
                $order->product_title = $data->product_title;
                $order->product_id = $data->product_id;
                $order->quantity = $data->quantity;
                $order->price = $data->price;
                $order->image = $data->image;
                $order->tracking_id = 'TRK' . Str::limit(uniqid('', true), 15 - strlen('TRK'), '');
                $order->delivery_status = 'pending';
                $order->payment_status = 'paid';
                $order->save();

                $cart = Cart::find($data->id);
                if ($cart) {
                    $cart->delete();
                }
            }

            Session::flash('success', 'Payment successful!');
            Alert::success('Payment Successfully Done!', $isTest ? 'Your order has been placed in Free Test Mode.' : 'Your order has been received.');

            return redirect()->route('user.orders');
        }else{
            return redirect('login');
        }
    }

    public function SearchProduct(Request $request)
    {
        $searchText = trim($request->search ?? '');

        if (empty($searchText)) {
            $products = Product::all();
        } else {
            $keywords = array_filter(explode(' ', $searchText));

            $query = Product::query();

            $query->where(function ($q) use ($keywords, $searchText) {
                // Exact phrase match across major columns
                $q->where('title', 'LIKE', "%{$searchText}%")
                  ->orWhere('category', 'LIKE', "%{$searchText}%")
                  ->orWhere('processor', 'LIKE', "%{$searchText}%")
                  ->orWhere('processor_type', 'LIKE', "%{$searchText}%")
                  ->orWhere('graphics_type', 'LIKE', "%{$searchText}%")
                  ->orWhere('ram', 'LIKE', "%{$searchText}%")
                  ->orWhere('ssd_capacity', 'LIKE', "%{$searchText}%")
                  ->orWhere('operating_system', 'LIKE', "%{$searchText}%")
                  ->orWhere('color', 'LIKE', "%{$searchText}%");

                // Individual keyword match across all searchable product columns
                foreach ($keywords as $word) {
                    $q->orWhere('title', 'LIKE', "%{$word}%")
                      ->orWhere('category', 'LIKE', "%{$word}%")
                      ->orWhere('processor', 'LIKE', "%{$word}%")
                      ->orWhere('processor_type', 'LIKE', "%{$word}%")
                      ->orWhere('graphics_type', 'LIKE', "%{$word}%")
                      ->orWhere('ram', 'LIKE', "%{$word}%")
                      ->orWhere('ssd_capacity', 'LIKE', "%{$word}%")
                      ->orWhere('operating_system', 'LIKE', "%{$word}%")
                      ->orWhere('color', 'LIKE', "%{$word}%");
                }
            });

            $products = $query->get();
        }

        $categories = Category::all();
        // check if a user is logged in
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $cartData = Cart::where('user_id', '=', $user_id)->get();
            return view('user.shop', compact('products', 'categories', 'cartData'));
        } else {
            return view('user.shop', compact('products', 'categories'));
        }
    }

    public function UpdatePassword()
    {
        if(Auth::check()){
            return view('profile.update-profile-information-form');
        }else{
            return redirect('login');
        }
    }

    public function GetTechnologyNews()
    {
        $apiKey = env('NEWS_API_KEY');
        $response = Http::get("https://newsapi.org/v2/top-headlines?category=technology&language=en&pageSize=4&apiKey={$apiKey}");
        $data = $response->json();
        $articles = $data['articles'] ?? [];
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $cartData = Cart::where('user_id', '=', $user_id)->get();
            return view('user.news', compact('articles','cartData'));
        }else{
            return view('user.news', compact('articles'));
        }

    }

    public function userAddProduct(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $product = new Product();
            $product->user_id = $user->id;
            $product->title = $request->title ?? '';
            $product->category = $request->category ?? '';
            $product->quantity = $request->quantity ?? 0;
            $product->price = $request->price ?? '0';
            $product->discount_price = !empty($request->discount_price) ? $request->discount_price : ($request->price ?? '0');
            $product->screen_size = $request->screen_size ?? '';
            $product->screen_resolution = $request->screen_resolution ?? '';
            $product->screen_refresh_rate = $request->screen_refresh_rate ?? '';
            $product->device_weight = $request->device_weight ?? '';
            $product->graphics_type = $request->graphics_type ?? '';
            $product->graphics_card_memory = $request->graphics_card_memory ?? '';
            $product->ssd_capacity = $request->ssd_capacity ?? '';
            $product->operating_system = $request->operating_system ?? '';
            $product->processor = $request->processor ?? '';
            $product->processor_generation = $request->processor_generation ?? '';
            $product->processor_type = $request->processor_type ?? '';
            $product->processor_speed = $request->processor_speed ?? '';
            $product->ram = $request->ram ?? '';
            $product->keyboard = $request->keyboard ?? '';
            $product->color = $request->color ?? '';
            
            $image = $request->image;
            if ($image) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $request->image->move('products_images', $imageName);
                $product->image = $imageName;
            }
            $product->save();

            Alert::success('Product Added Successfully!', 'Your product is listed for sale');
            return redirect(route('user.account') . '#my-products');
        } else {
            return redirect('login');
        }
    }

    public function userDeleteProduct($id)
    {
        if (Auth::check()) {
            $product = Product::find($id);
            if ($product && $product->user_id == Auth::id()) {
                $product->delete();
                Alert::success('Success', 'Product deleted successfully!');
            } else {
                Alert::error('Error', 'Product not found or unauthorized!');
            }
            return redirect(route('user.account') . '#my-products');
        } else {
            return redirect('login');
        }
    }

    public function userEditProduct($id)
    {
        if (Auth::check()) {
            $product = Product::find($id);
            if ($product && $product->user_id == Auth::id()) {
                $categories = Category::all();
                $user_id = Auth::user()->id;
                $cartData = Cart::where('user_id', '=', $user_id)->get();
                return view('user.edit_product', compact('product', 'categories', 'cartData'));
            } else {
                Alert::error('Error', 'Unauthorized action!');
                return redirect()->route('user.account');
            }
        } else {
            return redirect('login');
        }
    }

    public function userUpdateProduct(Request $request, $id)
    {
        if (Auth::check()) {
            $product = Product::find($id);
            if ($product && $product->user_id == Auth::id()) {
                $product->title = $request->title ?? '';
                $product->category = $request->category ?? '';
                $product->quantity = $request->quantity ?? 0;
                $product->price = $request->price ?? '0';
                $product->discount_price = !empty($request->discount_price) ? $request->discount_price : ($request->price ?? '0');
                $product->screen_size = $request->screen_size ?? '';
                $product->screen_resolution = $request->screen_resolution ?? '';
                $product->screen_refresh_rate = $request->screen_refresh_rate ?? '';
                $product->device_weight = $request->device_weight ?? '';
                $product->graphics_type = $request->graphics_type ?? '';
                $product->graphics_card_memory = $request->graphics_card_memory ?? '';
                $product->ssd_capacity = $request->ssd_capacity ?? '';
                $product->operating_system = $request->operating_system ?? '';
                $product->processor = $request->processor ?? '';
                $product->processor_generation = $request->processor_generation ?? '';
                $product->processor_type = $request->processor_type ?? '';
                $product->processor_speed = $request->processor_speed ?? '';
                $product->ram = $request->ram ?? '';
                $product->keyboard = $request->keyboard ?? '';
                $product->color = $request->color ?? '';
                
                $image = $request->image;
                if ($image) {
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $request->image->move('products_images', $imageName);
                    $product->image = $imageName;
                }
                $product->save();
                Alert::success('Success', 'Product updated successfully!');
            } else {
                Alert::error('Error', 'Unauthorized action!');
            }
            return redirect(route('user.account') . '#my-products');
        } else {
            return redirect('login');
        }
    }

    public function userRefillStock(Request $request, $id)
    {
        if (Auth::check()) {
            $product = Product::find($id);
            if ($product && $product->user_id == Auth::id()) {
                $refillQty = intval($request->quantity) > 0 ? intval($request->quantity) : 10;
                $product->quantity += $refillQty;
                $product->save();
                Alert::success('Stock Refilled Successfully!', "Added {$refillQty} units to {$product->title}. Total Stock: {$product->quantity}");
            } else {
                Alert::error('Error', 'Product not found or unauthorized action!');
            }
            return redirect(route('user.account') . '#my-products');
        } else {
            return redirect('login');
        }
    }

    public function userUpdateOrderStatus(Request $request, $id)
    {
        if (Auth::check()) {
            $order = Order::find($id);
            if ($order) {
                $product = Product::find($order->product_id);
                if ($product && $product->user_id == Auth::id()) {
                    $oldStatus = $order->delivery_status;
                    $order->delivery_status = $request->delivery_status;
                    $order->save();

                    // Send SMS notification to customer on order status update
                    try {
                        $buyer = User::find($order->user_id);
                        if ($buyer && !empty($buyer->phone)) {
                            $statusTitle = str_replace('_', ' ', strtoupper($request->delivery_status));
                            $smsText = "📦 Order Update: Your order ({$order->tracking_id}) for '{$order->product_title}' status is updated to: {$statusTitle}. Check your orders page for details.";
                            \App\Services\TwilioService::sendSms($buyer->phone, $smsText);
                        }
                    } catch (\Exception $e) {
                        \Illuminate\Support\Facades\Log::error('Order status SMS update error: ' . $e->getMessage());
                    }

                    // Award reward points if status changed to delivered
                    if ($oldStatus !== 'delivered' && $request->delivery_status == 'delivered') {
                        $buyer = User::find($order->user_id);
                        if ($buyer) {
                            $buyer->reward_points += floor($order->price);
                            $buyer->save();
                        }
                    }

                    Alert::success('Order Status Updated!', 'Status set to: ' . str_replace('_', ' ', ucfirst($request->delivery_status)));
                } else {
                    Alert::error('Error', 'Unauthorized action!');
                }
            } else {
                Alert::error('Error', 'Order not found!');
            }
            return redirect(route('user.account') . '#sales-orders');
        } else {
            return redirect('login');
        }
    }

    public function userAddCategory(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $data = new Category();
            $data->category_name = $request->category;
            $data->user_id = $user->id;
            $data->save();
            
            Alert::success('Category Added Successfully!', 'Your new category is ready');
            return redirect(route('user.account') . '#my-categories');
        } else {
            return redirect('login');
        }
    }

    public function userDeleteCategory($id)
    {
        if (Auth::check()) {
            $category = Category::find($id);
            if ($category && $category->user_id == Auth::id()) {
                $category->delete();
                Alert::success('Success', 'Category deleted successfully!');
            } else {
                Alert::error('Error', 'Category not found or unauthorized!');
            }
            return redirect(route('user.account') . '#my-categories');
        } else {
            return redirect('login');
        }
    }

    public function userUpdateCategory(Request $request, $id)
    {
        if (Auth::check()) {
            $category = Category::find($id);
            if ($category && $category->user_id == Auth::id()) {
                $category->category_name = $request->category_name;
                $category->save();
                Alert::success('Success', 'Category updated successfully!');
            } else {
                Alert::error('Error', 'Category not found or unauthorized!');
            }
            return redirect(route('user.account') . '#my-categories');
        } else {
            return redirect('login');
        }
    }

    public function storeSellerReview(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $request->validate([
            'seller_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        $buyerId = Auth::id();

        if ($buyerId == $request->seller_id) {
            Alert::error('Error', 'You cannot review yourself!');
            return redirect()->back();
        }

        SellerComment::create([
            'buyer_id' => $buyerId,
            'seller_id' => $request->seller_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        Alert::success('Thank You!', 'Your review for the seller has been submitted successfully.');
        return redirect()->back();
    }

    public function RewardsPage()
    {
        $rewards = Reward::with('user')->latest()->get();

        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $cartData = Cart::where('user_id', '=', $user_id)->get();
            return view('user.rewards', compact('rewards', 'cartData'));
        } else {
            return view('user.rewards', compact('rewards'));
        }
    }

    public function StoreReward(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'points_required' => 'nullable|integer|min:0',
            'reward_code' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
        ]);

        $reward = new Reward();
        $reward->user_id = Auth::id();
        $reward->title = $request->title;
        $reward->description = $request->description;
        $reward->points_required = $request->points_required ?? 0;
        $reward->reward_code = $request->reward_code;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('rewards_images', $imagename);
            $reward->image = $imagename;
        }

        $reward->save();

        Alert::success('Reward Added!', 'Your reward has been posted successfully.');
        return redirect()->back();
    }

    public function DeleteReward($id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $reward = Reward::find($id);
        if ($reward) {
            if ($reward->user_id == Auth::id() || Auth::user()->usertype == 1) {
                if ($reward->image && file_exists(public_path('rewards_images/' . $reward->image))) {
                    unlink(public_path('rewards_images/' . $reward->image));
                }
                $reward->delete();
                Alert::success('Deleted!', 'Reward has been deleted successfully.');
            } else {
                Alert::error('Unauthorized', 'You can only delete your own rewards.');
            }
        }

        return redirect()->back();
    }
}
