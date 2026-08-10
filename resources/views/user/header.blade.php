@php $cartData = $cartData ?? collect(); @endphp
<header class="header-area header-style-1 header-height-2">
    <div class="header-ambient-glow">
        <div class="header-ambient-glow-extra"></div>
        <div class="floating-particles-container">
            <div class="particle particle-1"></div>
            <div class="particle particle-2"></div>
            <div class="particle particle-3"></div>
            <div class="particle particle-4"></div>
            <div class="particle particle-5"></div>
            <div class="particle particle-6"></div>
            <div class="particle particle-7"></div>
            <div class="particle particle-8"></div>
            <div class="particle particle-9"></div>
            <div class="particle particle-10"></div>
            <div class="particle particle-11"></div>
            <div class="particle particle-12"></div>
            <div class="tech-shape shape-star1">★</div>
            <div class="tech-shape shape-star2">✦</div>
            <div class="tech-shape shape-diamond1">◆</div>
            <div class="tech-shape shape-ring1"></div>
            <div class="tech-shape shape-ring2"></div>
        </div>
    </div>
    <div class="header-top header-top-ptb-1 d-none d-lg-block" style="padding: 6px 0; font-size: 12.5px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-8 col-lg-7">
                    <div>
                        <style>
                            #news-flash { 
                                width: 100% !important;
                                height: 26px !important; 
                                overflow: hidden !important; 
                            }
                            #news-flash div { 
                                height: 26px !important; 
                            }
                            #news-flash li { 
                                height: 26px !important; 
                                min-height: 26px !important; 
                                display: flex !important;
                                align-items: center !important;
                                justify-content: flex-start !important;
                                white-space: nowrap !important;
                                padding: 0 !important; 
                                margin: 0 !important;
                            }
                        </style>
                        <div id="news-flash" class="d-inline-block" style="margin-top: 2px;">
                            <ul>
                                <li><span class="badge-hot-deal" style="background: linear-gradient(135deg, #f59e0b, #f97316); color: #0a0a0f; padding: 3px 10px; border-radius: 20px; font-size: 11px; font-weight: 700; margin-right: 8px; box-shadow: 0 0 10px rgba(245,158,11,0.55);">🔥 HOT DEAL</span> Get premium gaming peripherals up to 50% off <a href="{{route('user.shop')}}" style="color: #f59e0b; font-weight: 600; margin-left: 8px;">View details →</a></li>
                                <li><span class="badge-hot-deal" style="background: linear-gradient(135deg, #e879f9, #a855f7); color: #0a0a0f; padding: 3px 10px; border-radius: 20px; font-size: 11px; font-weight: 700; margin-right: 8px; box-shadow: 0 0 10px rgba(232,121,249,0.5);">⚡ BUNDLES</span> Build your dream PC - Save more with custom bundle deals</li>
                                <li><span class="badge-hot-deal" style="background: linear-gradient(135deg, #f97316, #ef4444); color: #fff; padding: 3px 10px; border-radius: 20px; font-size: 11px; font-weight: 700; margin-right: 8px; box-shadow: 0 0 10px rgba(249,115,22,0.5);">NEW ARRIVALS</span> Latest GPUs & CPUs in stock, save up to 35% today <a href="{{route('user.shop')}}" style="color: #f59e0b; font-weight: 600; margin-left: 8px;">Shop now →</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="header-info header-info-right">
                        <ul>  
                            @if (Route::has('login'))
                                @auth
                                    <li>
                                        <i class="fi-rs-user" style="margin-right: 5px; color: #f59e0b;"></i><a href="{{ route('user.account') }}" style="max-width: 180px; display: inline-block; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; vertical-align: middle; font-weight: 600; color: #1e293b;">{{ Auth::user()->name }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.logout') }}" style="color: #f87171; font-weight: 600;">Logout</a>
                                    </li>
                                @else
                                    <li>
                                        <i class="fi-rs-key" style="color: #f59e0b; margin-right: 4px;"></i><a href="{{route('login')}}" style="font-weight: 600; color: #f59e0b;">Log In</a> <span style="color: #5a5a72; margin: 0 4px;">/</span> <a href="{{route('register')}}" style="font-weight: 600; color: #e879f9;">Sign Up</a>
                                    </li>
                                @endauth
                            @endif                              
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="/"><img src="user/assets/imgs/logo/app_logo.png" alt="logo"></a>
                </div>
                <div class="header-right">
                    <div class="search-style-1">
                        <form action="{{url('/search-a-product')}}" method="GET">
                            @csrf                                
                            <input type="text" name="search" placeholder="Search for high performance PCs, GPUs, components...">
                            <button type="submit" aria-label="Search"><i class="fi-rs-search"></i></button>
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                @if (Route::has('login'))
                                    @auth
                                        @if ($cartData->isEmpty())
                                        {{-- this part will be updated --}}
                                        <a class="mini-cart-icon" href="{{route('user.cart')}}">
                                            <img alt="Surfside Media" src="user/assets/imgs/theme/icons/icon-cart.svg">
                                            <span class="pro-count blue">0</span>
                                        </a>
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                            <p>Cart is empty</p>
                                        </div>
                                        @else
                                        <?php 
                                            $product_in_cart = 0; 
                                            $totalPrice = 0;
                                        ?>
                                        @foreach($cartData as $data)
                                            <?php $product_in_cart +=1; ?>
                                        @endforeach
                                        <a class="mini-cart-icon" href="{{route('user.cart')}}">
                                            <img alt="Surfside Media" src="user/assets/imgs/theme/icons/icon-cart.svg">
                                            <span class="pro-count blue">{{$product_in_cart}}</span>
                                        </a>
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                            <ul>
                                                @foreach ($cartData as $cart)
                                                <li>
                                                    <div class="shopping-cart-img">
                                                        <a href="{{url('product_details',$cart->product_id)}}"><img alt="Product Image" src="products_images/{{$cart->image}}"></a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h4><a href="{{url('product_details',$cart->product_id)}}">See Details</a></h4>
                                                        <h4><span>{{$cart->quantity}} × </span>Rs. {{ ltrim($cart->price/$cart->quantity, '$') }}</h4>
                                                    </div>
                                                    <div class="shopping-cart-delete">
                                                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                    </div>
                                                </li>
                                                <?php $totalPrice += $cart->price ?>
                                                @endforeach
                                            </ul>
                                            <div class="shopping-cart-footer">
                                                <div class="shopping-cart-total">
                                                    <h4>Total <span>Rs. {{ ltrim($totalPrice, '$') }}</span></h4>
                                                </div>
                                                <div class="shopping-cart-button">
                                                    <a href="{{route('user.cart')}}" class="outline">View cart</a>
                                                    <a href="{{route('user.checkout')}}">Checkout</a>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    
                                    @else
                                        <a class="mini-cart-icon" href="#">
                                            <img alt="Surfside Media" src="user/assets/imgs/theme/icons/icon-cart.svg">
                                            <span class="pro-count blue">0</span>
                                        </a>
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                            <div class="shopping-cart-footer">
                                                <div class="shopping-cart-total">
                                                    <center>
                                                        <img style="width: 50%" src="/user/assets/imgs/empty-cart-img.jpg" alt="">
                                                        <h4>You need to login first!</h4>
                                                        <div class="shopping-cart-button">
                                                            <a href="{{route('login')}}" class="outline">Login</a>
                                                        </div>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    @endauth
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="{{url('/')}}"><img src="user/assets/imgs/logo/app_logo.png" alt="logo"></a>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="{{route('user.cart')}}">
                                <img alt="Cyclone" src="user/assets/imgs/theme/icons/icon-cart.svg">
                                @if(isset($product_in_cart) && $product_in_cart > 0)
                                    <span class="pro-count blue">{{$product_in_cart}}</span>
                                @endif
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <div class="burger-icon burger-icon-white">
                                <span class="burger-icon-top"></span>
                                <span class="burger-icon-mid"></span>
                                <span class="burger-icon-bottom"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <nav>
                            <ul>
                                <li><a class="{{ request()->is('/') ? 'active' : '' }}" href="{{url('/')}}">Home </a></li>
                                <li><a class="{{ request()->routeIs('user.shop') ? 'active' : '' }}" href="{{route('user.shop')}}">Shop</a></li>                             
                                <li><a class="{{ request()->routeIs('user.contact') ? 'active' : '' }}" href="{{route('user.contact')}}">Contact</a></li>
                                @if (Route::has('login'))
                                    @auth
                                        @php
                                            $unreadMessagesCount = \App\Models\Message::where('receiver_id', Auth::id())->where('is_read', false)->count();
                                        @endphp
                                        <li><a class="{{ request()->routeIs('messages.inbox') ? 'active' : '' }}" href="{{route('messages.inbox')}}">Messages @if($unreadMessagesCount > 0) <span class="nav-unread-badge">{{ $unreadMessagesCount }}</span> @endif</a></li>
                                        <li><a href="{{route('user.account')}}">My Account<i class="fi-rs-angle-down"></i></a>
                                            <ul class="sub-menu">
                                                <li><a href="{{route('user.account')}}">Dashboard</a></li>
                                                <li><a href="{{url('/orders')}}">Orders</a></li>
                                                <li><a href="{{ route('user.logout') }}">Logout</a></li>                                            
                                            </ul>
                                        </li>
                                    @endauth
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-block">
                    <p><i class="fi-rs-smartphone"></i><span>Call</span> +94715356253 </p>
                </div>
            </div>
        </div>
    </div>
</header>