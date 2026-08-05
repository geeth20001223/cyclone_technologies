<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>CYCLONE TECHNOLOGIES | Messages</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Communicate with buyers and sellers on CYCLONE TECHNOLOGIES">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="/user/assets/imgs/theme/favicon.ico">
    <link rel="stylesheet" href="/user/assets/css/main.css">
    <link rel="stylesheet" href="/user/assets/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        .chat-container {
            height: calc(100vh - 220px);
            min-height: 580px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            margin-bottom: 30px;
            display: flex;
        }
        .chat-sidebar {
            width: 320px;
            border-right: 1px solid #f0f0f0;
            display: flex;
            flex-direction: column;
            background: #fff;
            flex-shrink: 0;
        }
        .chat-sidebar-header {
            padding: 20px;
            border-bottom: 1px solid #f0f0f0;
        }
        .chat-sidebar-header h4 {
            font-size: 18px;
            font-weight: 700;
            color: #2C3333;
        }
        .chat-list {
            flex: 1;
            overflow-y: auto;
        }
        .chat-item {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid #f9f9f9;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            color: inherit;
        }
        .chat-item:hover {
            background: #f8f9fa;
            text-decoration: none;
        }
        .chat-item.active {
            background: #fef4f0;
            border-left: 4px solid #f15412;
            text-decoration: none;
        }
        .chat-item-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50px;
            margin-right: 15px;
            border: 2px solid #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            object-fit: cover;
        }
        .chat-item-info {
            flex: 1;
            min-width: 0;
        }
        .chat-item-name {
            font-weight: 700;
            font-size: 14px;
            margin-bottom: 4px;
            color: #2C3333;
        }
        .chat-item-last {
            font-size: 12px;
            color: #777;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .chat-item-meta {
            text-align: right;
            margin-left: 10px;
            flex-shrink: 0;
        }
        .chat-item-time {
            font-size: 10px;
            color: #bbb;
            margin-bottom: 5px;
        }
        .chat-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            background: #fdfdfd;
            position: relative;
            min-width: 0;
        }
        .chat-header {
            padding: 15px 25px;
            background: #fff;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
        }
        .chat-header-user {
            display: flex;
            align-items: center;
        }
        .chat-header-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50px;
            margin-right: 12px;
            object-fit: cover;
        }
        .chat-header-name {
            font-weight: 700;
            font-size: 15px;
            color: #2C3333;
        }
        .chat-header-product {
            display: flex;
            align-items: center;
            background: #f9f9f9;
            padding: 6px 12px;
            border-radius: 6px;
            border: 1px solid #eee;
            font-size: 12px;
            max-width: 320px;
            gap: 10px;
            color: inherit;
        }
        .chat-header-product:hover {
            background: #f1f1f1;
            text-decoration: none;
            color: inherit;
        }
        .chat-body {
            flex: 1;
            padding: 25px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 15px;
            background-color: #efeae2;
        }
        .message-wrapper {
            display: flex !important;
            width: 100% !important;
            margin-bottom: 12px !important;
            clear: both !important;
        }
        .message-wrapper.sent {
            justify-content: flex-end !important;
        }
        .message-wrapper.received {
            justify-content: flex-start !important;
        }
        .message-bubble {
            max-width: 70% !important;
            padding: 12px 16px !important;
            border-radius: 14px !important;
            position: relative !important;
            font-size: 14px !important;
            line-height: 1.5 !important;
            box-shadow: 0 2px 6px rgba(0,0,0,0.12) !important;
            word-break: break-word !important;
        }
        /* SENT MESSAGE - RIGHT ALIGNED (GREEN) */
        .message-wrapper.sent .message-bubble {
            background-color: #d9fdd3 !important;
            color: #0f172a !important;
            border-top-right-radius: 2px !important;
            border-bottom-right-radius: 14px !important;
            border-left: 3.5px solid #22c55e !important;
            margin-left: auto !important;
            margin-right: 0 !important;
        }
        /* RECEIVED MESSAGE - LEFT ALIGNED (WHITE WITH ORANGE ACCENT) */
        .message-wrapper.received .message-bubble {
            background-color: #ffffff !important;
            color: #0f172a !important;
            border-top-left-radius: 2px !important;
            border-bottom-left-radius: 14px !important;
            border: 1px solid #cbd5e1 !important;
            border-left: 4.5px solid #f15412 !important;
            margin-right: auto !important;
            margin-left: 0 !important;
        }
        .message-sender-tag {
            font-size: 11px !important;
            font-weight: 800 !important;
            margin-bottom: 4px !important;
            display: block !important;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .message-wrapper.sent .message-sender-tag {
            color: #15803d !important;
            text-align: right !important;
        }
        .message-wrapper.received .message-sender-tag {
            color: #f15412 !important;
            text-align: left !important;
        }
        .message-time {
            font-size: 9px !important;
            margin-top: 5px !important;
            text-align: right !important;
            opacity: 0.75 !important;
        }
        .chat-footer {
            padding: 20px;
            background: #fff;
            border-top: 1px solid #f0f0f0;
        }
        .chat-form {
            display: flex;
            gap: 12px;
            align-items: center;
        }
        .chat-input {
            flex: 1;
            border: 1px solid #e0e0e0;
            border-radius: 30px;
            padding: 12px 20px;
            font-size: 13px;
            outline: none;
            transition: border-color 0.2s;
            height: 45px;
        }
        .chat-input:focus {
            border-color: #f15412;
        }
        .chat-send-btn {
            background: #f15412;
            border: none;
            color: #fff;
            width: 45px;
            height: 45px;
            border-radius: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: opacity 0.2s;
        }
        .chat-send-btn:hover {
            opacity: 0.9;
        }
        .chat-empty-state {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #a0aec0;
            text-align: center;
            padding: 30px;
        }
        .chat-empty-state i {
            font-size: 64px;
            margin-bottom: 20px;
            color: #cbd5e0;
        }
        
        .chat-product-preview {
            background: rgba(0,0,0,0.03);
            border-radius: 4px;
            padding: 8px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
            border: 1px solid rgba(0,0,0,0.05);
        }

        @media (max-width: 768px) {
            .chat-container {
                height: auto;
                min-height: 500px;
                flex-direction: column;
            }
            .chat-sidebar {
                width: 100%;
                max-height: 220px;
                border-right: none;
                border-bottom: 1px solid #f0f0f0;
            }
            .message-bubble {
                max-width: 88% !important;
            }
            .chat-header {
                padding: 12px 15px;
            }
            .chat-body {
                padding: 15px;
            }
            .chat-footer {
                padding: 12px;
            }
        }
    </style>
</head>

<body>
    @include('user.header')
    @include('user.mobile_header')    
    
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ url('/') }}" rel="nofollow">Home</a>
                    <span></span> Messages
                </div>
            </div>
        </div>
        
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="chat-container">
                            <!-- Sidebar containing conversation list -->
                            <div class="chat-sidebar">
                                <div class="chat-sidebar-header">
                                    <h4>Conversations</h4>
                                </div>
                                <div class="chat-list">
                                    @forelse($chats as $chat)
                                        <a href="{{ route('messages.inbox', ['user_id' => $chat->id]) }}" class="chat-item {{ ($activeChatUser && $activeChatUser->id == $chat->id) ? 'active' : '' }}" data-user-id="{{ $chat->id }}" data-user-name="{{ $chat->name }}">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($chat->name) }}&color=7F9CF5&background=EBF4FF" alt="{{ $chat->name }}" class="chat-item-avatar">
                                            <div class="chat-item-info">
                                                <div class="chat-item-name">{{ $chat->name }}</div>
                                                <div class="chat-item-last">
                                                    @if($chat->last_message)
                                                        {{ $chat->last_message->message }}
                                                    @else
                                                        No messages yet
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="chat-item-meta">
                                                <div class="chat-item-time">
                                                    @if($chat->last_message)
                                                        {{ $chat->last_message->created_at->format('H:i') }}
                                                    @endif
                                                </div>
                                                @if($chat->unread_count > 0)
                                                    <span class="badge bg-danger text-white rounded-pill px-2" style="font-size: 10px;">{{ $chat->unread_count }}</span>
                                                @endif
                                            </div>
                                        </a>
                                    @empty
                                        <div class="text-center text-muted p-4 mt-5">
                                            <i class="far fa-comments fa-2x mb-2 text-muted"></i>
                                            <p style="font-size: 13px;">No conversations yet. Visit a product page and click "Chat with Seller" to start a chat.</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            
                            <!-- Main chat area -->
                            <div class="chat-content">
                                <!-- Chat Active Pane (shown dynamically if activeChatUser is set) -->
                                <div class="chat-active-pane d-flex flex-column h-100" id="chat-active-pane" style="display: {{ $activeChatUser ? 'flex' : 'none' }} !important; flex-direction: column; flex: 1; min-width: 0;">
                                    <!-- Header showing active partner and potential product reference -->
                                    <div class="chat-header">
                                        <div class="chat-header-user">
                                            <img src="https://ui-avatars.com/api/?name={{ $activeChatUser ? urlencode($activeChatUser->name) : '' }}&color=7F9CF5&background=EBF4FF" alt="" class="chat-header-avatar" id="active-user-avatar">
                                            <div class="chat-header-name" id="active-user-name">{{ $activeChatUser ? $activeChatUser->name : '' }}</div>
                                        </div>
                                        
                                        <a href="{{ $activeProduct ? url('product_details', $activeProduct->id) : '#' }}" class="chat-header-product" id="active-product-box" style="display: {{ $activeProduct ? 'flex' : 'none' }} !important;">
                                            <div id="active-product-media-container" style="display: inline-flex;">
                                                @if($activeProduct)
                                                    @php
                                                        $ext = strtolower(pathinfo($activeProduct->image, PATHINFO_EXTENSION));
                                                        $isVideo = in_array($ext, ['mp4', 'webm', 'ogg', 'mov', 'avi']);
                                                    @endphp
                                                    @if($isVideo)
                                                        <video src="/products_images/{{ $activeProduct->image }}" class="active-product-media" id="active-product-video" muted autoplay loop style="width: 32px; height: 32px; border-radius: 4px; object-fit: cover;"></video>
                                                    @else
                                                        <img src="/products_images/{{ $activeProduct->image }}" class="active-product-media" id="active-product-img" style="width: 32px; height: 32px; border-radius: 4px; object-fit: cover;" alt="">
                                                    @endif
                                                @endif
                                            </div>
                                            <div style="min-width: 0;">
                                                <div id="active-product-title" style="font-weight: 700; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $activeProduct ? $activeProduct->title : '' }}</div>
                                                <div id="active-product-price" class="text-brand">Rs. {{ $activeProduct ? ltrim($activeProduct->discount_price, '$') : '' }}</div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                    <!-- Message bubbles box -->
                                    <div class="chat-body" id="chat-body">
                                        @if($activeChatUser)
                                            <!-- Message bubbles populated by Blade statically on first load -->
                                            @forelse($activeChatMessages as $msg)
                                                <div class="message-wrapper {{ $msg->sender_id == Auth::id() ? 'sent' : 'received' }}">
                                                    <div class="message-bubble">
                                                        @if($msg->product)
                                                            @php
                                                                $pExt = strtolower(pathinfo($msg->product->image, PATHINFO_EXTENSION));
                                                                $pIsVideo = in_array($pExt, ['mp4', 'webm', 'ogg', 'mov', 'avi']);
                                                            @endphp
                                                            <div class="chat-product-preview">
                                                                @if($pIsVideo)
                                                                    <video src="/products_images/{{ $msg->product->image }}" muted autoplay loop style="width: 50px; height: 50px; border-radius: 4px; object-fit: cover;"></video>
                                                                @else
                                                                    <img src="/products_images/{{ $msg->product->image }}" style="width: 50px; height: 50px; border-radius: 4px; object-fit: cover;" alt="">
                                                                @endif
                                                                <div style="font-size: 11px;">
                                                                    <div class="fw-bold" style="font-weight: 700;">{{ $msg->product->title }}</div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="message-text">{{ $msg->message }}</div>
                                                        <div class="message-time">
                                                            {{ $msg->created_at->format('M d, H:i') }}
                                                            @if($msg->sender_id == Auth::id())
                                                                @if($msg->is_read)
                                                                    <i class="fas fa-check-double ms-1" title="Read" style="color: #34b7f1 !important; font-size: 11px;"></i>
                                                                @else
                                                                    <i class="fas fa-check ms-1" title="Sent" style="color: #8696a0 !important; font-size: 10px;"></i>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="text-center text-muted my-5">No messages yet. Send a message to start the conversation!</div>
                                            @endforelse
                                        @endif
                                    </div>
                                    
                                    <!-- Input typing section -->
                                    <div class="chat-footer">
                                        <form id="chat-form" class="chat-form">
                                            <input type="text" id="chat-message-input" autocomplete="off" class="chat-input" placeholder="Type your message here...">
                                            <button type="submit" class="chat-send-btn">
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Chat Empty State Pane -->
                                <div class="chat-empty-pane h-100" id="chat-empty-pane" style="display: {{ $activeChatUser ? 'none' : 'flex' }} !important; flex-direction: column; align-items: center; justify-content: center; flex: 1;">
                                    <div class="chat-empty-state">
                                        <i class="far fa-comments"></i>
                                        <h3>Your Inbox</h3>
                                        <p class="text-muted mt-2">Select a conversation from the sidebar or visit a product listing to chat directly with buyers and sellers.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('user.footer')
    
    <script src="/user/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="/user/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="/user/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="/user/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="/user/assets/js/plugins/slick.js"></script>
    <script src="/user/assets/js/plugins/jquery.syotimer.min.js"></script>
    <script src="/user/assets/js/plugins/wow.js"></script>
    <script src="/user/assets/js/plugins/jquery-ui.js"></script>
    <script src="/user/assets/js/plugins/perfect-scrollbar.js"></script>
    <script src="/user/assets/js/plugins/magnific-popup.js"></script>
    <script src="/user/assets/js/plugins/select2.min.js"></script>
    <script src="/user/assets/js/plugins/waypoints.js"></script>
    <script src="/user/assets/js/plugins/counterup.js"></script>
    <script src="/user/assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="/user/assets/js/plugins/images-loaded.js"></script>
    <script src="/user/assets/js/plugins/isotope.js"></script>
    <script src="/user/assets/js/plugins/scrollup.js"></script>
    <script src="/user/assets/js/plugins/jquery.vticker-min.js"></script>
    <script src="/user/assets/js/plugins/jquery.theia.sticky.js"></script>
    <script src="/user/assets/js/plugins/jquery.elevatezoom.js"></script>
    <script src="/user/assets/js/main.js?v=3.3"></script>
    
    <script type="text/javascript">
        let activeChatUserId = "{{ $activeChatUser ? $activeChatUser->id : '' }}";
        let activeProductId = "{{ $activeProduct ? $activeProduct->id : '' }}";
        let pollingInterval = null;

        function scrollToBottom() {
            var chatBody = document.getElementById('chat-body');
            if (chatBody) {
                chatBody.scrollTop = chatBody.scrollHeight;
            }
        }

        function syncMessagesAndSidebar() {
            var url = "/messages/sync";
            var data = {};
            if (activeChatUserId) {
                data.active_user_id = activeChatUserId;
            }

            $.ajax({
                url: url,
                type: "GET",
                data: data,
                dataType: "json",
                success: function(response) {
                    var currentUserId = response.current_user_id;

                    // 1. Update active chat bubbles if active chat is open
                    if (activeChatUserId) {
                        var messages = response.messages;
                        var chatBody = $('#chat-body');
                        var originalScrollHeight = chatBody[0].scrollHeight;
                        var originalScrollTop = chatBody[0].scrollTop;
                        var originalClientHeight = chatBody[0].clientHeight;
                        
                        chatBody.empty();
                        
                        if (messages.length === 0) {
                            chatBody.append('<div class="text-center text-muted my-5">No messages yet. Send a message to start the conversation!</div>');
                        } else {
                            var partnerName = $('#active-user-name').text().trim() || 'User';
                            messages.forEach(function(msg) {
                                var isSent = (parseInt(msg.sender_id) === parseInt(currentUserId));
                                var bubbleClass = isSent ? 'sent' : 'received';
                                var senderTagHtml = isSent 
                                    ? '<span class="message-sender-tag">You</span>' 
                                    : '<span class="message-sender-tag">' + escapeHtml(partnerName) + '</span>';

                                var productPreview = '';
                                if (msg.product) {
                                    var mediaTag = msg.product.is_video 
                                        ? '<video src="/products_images/' + msg.product.image + '" muted autoplay loop style="width: 50px; height: 50px; border-radius: 4px; object-fit: cover;"></video>'
                                        : '<img src="/products_images/' + msg.product.image + '" style="width: 50px; height: 50px; border-radius: 4px; object-fit: cover;">';
                                    
                                    productPreview = '<div class="chat-product-preview">' +
                                        mediaTag +
                                        '<div style="font-size: 11px;">' +
                                        '<div style="font-weight: 700;">' + msg.product.title + '</div>' +
                                        '</div>' +
                                        '</div>';
                                }

                                var tickHtml = '';
                                if (isSent) {
                                    tickHtml = msg.is_read 
                                        ? ' <i class="fas fa-check-double ms-1" title="Read" style="color: #34b7f1 !important; font-size: 11px;"></i>'
                                        : ' <i class="fas fa-check ms-1" title="Sent" style="color: #8696a0 !important; font-size: 10px;"></i>';
                                }

                                var bubbleHtml = '<div class="message-wrapper ' + bubbleClass + '">' +
                                    '<div class="message-bubble">' +
                                    senderTagHtml +
                                    productPreview +
                                    '<div class="message-text">' + escapeHtml(msg.message) + '</div>' +
                                    '<div class="message-time">' + msg.created_at_formatted + tickHtml + '</div>' +
                                    '</div>' +
                                    '</div>';
                                chatBody.append(bubbleHtml);
                            });
                        }

                        // Scroll to bottom on initial load or if user is near the bottom
                        if (originalScrollHeight - originalScrollTop - originalClientHeight < 150 || originalScrollTop === 0) {
                            scrollToBottom();
                        }
                    }

                    // 2. Update Sidebar Chat List
                    var chats = response.chats;
                    var chatList = $('.chat-list');
                    var sidebarScrollTop = chatList.scrollTop();
                    
                    chatList.empty();

                    if (chats.length === 0) {
                        chatList.append('<div class="text-center text-muted p-4 mt-5"><i class="far fa-comments fa-2x mb-2 text-muted"></i><p style="font-size: 13px;">No conversations yet. Visit a product page and click "Chat with Seller" to start a chat.</p></div>');
                    } else {
                        chats.forEach(function(chat) {
                            var isActive = chat.id == activeChatUserId ? 'active' : '';
                            var avatarUrl = 'https://ui-avatars.com/api/?name=' + encodeURIComponent(chat.name) + '&color=7F9CF5&background=EBF4FF';
                            
                            var lastMsgText = chat.last_message ? chat.last_message.message : 'No messages yet';
                            var lastMsgTime = chat.last_message ? chat.last_message.time : '';
                            
                            var unreadBadgeHtml = chat.unread_count > 0 
                                ? '<span class="badge bg-danger text-white rounded-pill px-2" style="font-size: 10px;">' + chat.unread_count + '</span>'
                                : '';

                            var chatItemHtml = '<a href="/messages?user_id=' + chat.id + '" class="chat-item ' + isActive + '" data-user-id="' + chat.id + '" data-user-name="' + chat.name + '">' +
                                '<img src="' + avatarUrl + '" alt="' + chat.name + '" class="chat-item-avatar">' +
                                '<div class="chat-item-info">' +
                                '<div class="chat-item-name">' + chat.name + '</div>' +
                                '<div class="chat-item-last">' + escapeHtml(lastMsgText) + '</div>' +
                                '</div>' +
                                '<div class="chat-item-meta">' +
                                '<div class="chat-item-time">' + lastMsgTime + '</div>' +
                                unreadBadgeHtml +
                                '</div>' +
                                '</a>';
                            
                            chatList.append(chatItemHtml);
                        });
                    }
                    
                    chatList.scrollTop(sidebarScrollTop);

                    // 3. Update Header Badges with pulsing animation
                    var totalUnread = response.total_unread_count;
                    var badgeHtml = totalUnread > 0 
                        ? '<span class="nav-unread-badge">' + totalUnread + '</span>'
                        : '';
                    
                    var desktopMsgLink = $('a[href*="/messages"]');
                    if (desktopMsgLink.length) {
                        desktopMsgLink.each(function() {
                            $(this).find('.badge, .nav-unread-badge').remove();
                            if (totalUnread > 0) {
                                $(this).append(badgeHtml);
                            }
                        });
                    }
                }
            });
        }

        function escapeHtml(text) {
            return text
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }

        $(document).ready(function() {
            // Setup ajax csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            scrollToBottom();

            // Run initial sync and spin off the poll timer
            syncMessagesAndSidebar();
            pollingInterval = setInterval(syncMessagesAndSidebar, 3000);

            // Handle switching conversation dynamically (without reload)
            $(document).on('click', '.chat-item', function(e) {
                e.preventDefault();
                var targetUserId = $(this).attr('data-user-id');
                var targetUserName = $(this).attr('data-user-name');
                
                activeChatUserId = targetUserId;
                activeProductId = ''; // Reset product on manual sidebar click

                // Update active state class immediately
                $('.chat-item').removeClass('active');
                $(this).addClass('active');

                // Shift pane viewports
                $('#chat-empty-pane').attr('style', 'display: none !important;');
                $('#chat-active-pane').attr('style', 'display: flex !important;');

                // Update Header info
                $('#active-user-name').text(targetUserName);
                $('#active-user-avatar').attr('src', 'https://ui-avatars.com/api/?name=' + encodeURIComponent(targetUserName) + '&color=7F9CF5&background=EBF4FF');
                $('#active-product-box').attr('style', 'display: none !important;');

                // Set loading status
                $('#chat-body').html('<div class="text-center text-muted my-5"><i class="fas fa-spinner fa-spin mr-5"></i> Loading messages...</div>');

                // Change URL dynamically without reload
                history.pushState(null, '', '/messages?user_id=' + activeChatUserId);

                // Run sync immediately
                syncMessagesAndSidebar();
            });

            // Handle messaging form submission
            $(document).on('submit', '#chat-form', function(e) {
                e.preventDefault();
                var messageText = $('#chat-message-input').val().trim();
                if (messageText === '' || !activeChatUserId) return;

                $('#chat-message-input').val('');

                $.ajax({
                    url: "{{ route('messages.send') }}",
                    type: "POST",
                    data: {
                        receiver_id: activeChatUserId,
                        message: messageText,
                        product_id: activeProductId
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            syncMessagesAndSidebar();
                            scrollToBottom();
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>
