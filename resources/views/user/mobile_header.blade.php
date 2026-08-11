<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="{{url('/')}}"><img src="user/assets/imgs/logo/app_logo.png" alt="logo"></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="{{url('/search-a-product')}}" method="GET">
                    @csrf
                    <input type="text" name="search" placeholder="Search for items…">
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{route('user.shop')}}">Shop</a></li>
                        <li><a href="{{route('user.contact')}}">Contact</a></li>
                        @auth
                            @php
                                $unreadMessagesCount = \App\Models\Message::where('receiver_id', Auth::id())->where('is_read', false)->count();
                            @endphp
                            <li><a href="{{route('messages.inbox')}}">Messages @if($unreadMessagesCount > 0) <span class="nav-unread-badge">{{ $unreadMessagesCount }}</span> @endif</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{route('user.account')}}">My Account</a>
                                <ul class="dropdown">
                                    <li><a href="{{route('user.account')}}">Dashboard</a></li>
                                    <li><a href="{{url('/orders')}}">Orders</a></li>
                                    <li><a href="{{route('user.cart')}}">Cart</a></li>
                                </ul>
                            </li>
                        @endauth
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap mobile-header-border">
                @if (Route::has('login'))
                    @auth
                        <div class="single-mobile-header-info mt-10">
                            <a href="{{ route('user.account') }}" style="color: #2563eb; font-weight: 700;"><i class="fi-rs-user" style="color: #f97316;"></i> {{ Auth::user()->name }}</a>
                        </div>
                        <div class="single-mobile-header-info">
                            <a href="{{ route('user.logout') }}" style="color: #f97316; font-weight: 700;">Logout</a>
                        </div>
                    @else
                        <div class="single-mobile-header-info mt-10">
                            <a href="{{route('login')}}" style="color: #f97316; font-weight: 700;"><i class="fi-rs-key" style="color: #f97316;"></i> Log In</a>
                        </div>
                        <div class="single-mobile-header-info">
                            <a href="{{route('register')}}" style="color: #2563eb; font-weight: 700;"><i class="fi-rs-user-add" style="color: #2563eb;"></i> Sign Up</a>
                        </div>
                    @endauth
                @endif
                <div class="single-mobile-header-info">
                    <a href="tel:+94715356253" style="color: #2563eb; font-weight: 700;"><i class="fi-rs-smartphone" style="color: #f97316;"></i> +94 71 535 6253</a>
                </div>
            </div>
            <div class="mobile-social-icon">
                <h5 class="mb-15 text-grey-4">Follow Us</h5>
                <a href="#"><img src="user/assets/imgs/theme/icons/icon-facebook.svg" alt="Facebook"></a>
                <a href="#"><img src="user/assets/imgs/theme/icons/icon-twitter.svg" alt="Twitter"></a>
                <a href="#"><img src="user/assets/imgs/theme/icons/icon-instagram.svg" alt="Instagram"></a>
                <a href="#"><img src="user/assets/imgs/theme/icons/icon-youtube.svg" alt="YouTube"></a>
            </div>
        </div>
    </div>
</div>