<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>CYCLONE TECHNOLOGIES | My Orders</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="/user/assets/imgs/theme/favicon.ico">
    <link rel="stylesheet" href="/user/assets/css/main.css">
    <link rel="stylesheet" href="/user/assets/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/812fd4bca0.js" crossorigin="anonymous"></script>
</head>

<body>
    @include('sweetalert::alert');
    @include('user.header')
    @include('user.mobile_header')    
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Your Orders
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    @if ($orderData->isEmpty())
                    {{-- this part will be updated --}}
                    <div class="text-center">
                        <h1>No Order Yet!</h1>
                        <img style="width: 25%" src="/user/assets/imgs/empty-cart-img.jpg" alt="">
                    </div>
                    @else
                    <div class="col-12 mb-100">
                        <div class="table-responsive">
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                    <tr class="main-heading">
                                        <th scope="col">Product</th>
                                        <th scope="col">Order Tracking ID</th>
                                        <th scope="col">Delivery Status</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">View</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <div class="divider center_icon mt-10 mb-30"><b>Active Orders</b></div>
                                <tbody>
                                    @foreach ($orderData as $order)
                                    <tr>
                                        <td class="image product-thumbnail">
                                            @if(in_array(strtolower(pathinfo($order->image, PATHINFO_EXTENSION)), ['mp4', 'webm', 'ogg', 'mov', 'avi']))
                                                <video src="products_images/{{$order->image}}" style="width: 80px; height: 80px; border-radius: 5px; object-fit: cover;" muted loop autoplay></video>
                                            @else
                                                <img src="products_images/{{$order->image}}" alt="product_image">
                                            @endif
                                        </td>
                                        <td>
                                            <span style="color: #2C3333; font-weight: 400;">{{$order->tracking_id}}</span>
                                        </td>
                                        <td class="product-des product-name px-5">
                                            @if($order->delivery_status == 'pending')
                                                <i style="color: #54B435; font-size: 17px;" class="fas fa-check"></i>
                                                <span class="product-name px-1">Pending</span>
                                            @elseif($order->delivery_status == 'processing')
                                                <i style="color: #54B435; font-size: 17px;" class="far fa-check-circle"></i>
                                                <span class="product-name px-1">Your Product is Processing</span>
                                            @elseif($order->delivery_status == 'packaging')
                                                <i style="color: #FF577F; font-size: 17px;" class="fas fa-box"></i>
                                                <span class="product-name px-1">Your Product is Being Packaged</span>
                                            @elseif($order->delivery_status == 'shipped')
                                                <i style="color: #AA77FF; font-size: 17px;" class="fas fa-truck-loading"></i>
                                                <span class="product-name px-1">Your Product is Being Shipped</span>
                                            @elseif($order->delivery_status == 'on_the_way')
                                                <i style="color: #FF6000; font-size: 17px;" class="fas fa-truck"></i>
                                                <span class="product-name px-1">Your Product is On the Way</span>
                                            @elseif($order->delivery_status == 'delivered')
                                                <i style="color: #3EC70B; font-size: 17px;" class="fas fa-check-circle"></i>
                                                <span class="product-name px-1">Your Product is Delivered</span>
                                            @endif
                                        </td>
                                        <td class="text-center" data-title="Stock">
                                            <div class="detail-qty border radius  m-auto">
                                                <span class="qty-val">{{$order->quantity}}</span>
                                            </div>
                                        </td>
                                        <td class="text-right" data-title="Cart">
                                            <span>Rs. {{ ltrim($order->price, '$') }}</span>
                                        </td>
                                        <td class="action" data-title="View"><a href="{{url('/product_details', $order->product_id)}}" class="text-muted"><i class="fas fa-eye"></i></a></td>
                                        <td>
                                            <div style="display: flex; flex-direction: column; gap: 5px; align-items: center;">
                                                <a href="{{ route('messages.start', $order->product_id) }}" class="btn btn-sm btn-secondary" style="padding: 5px 10px; line-height: 1.2; font-size: 11px;"><i class="fi-rs-paper-plane mr-5"></i> Chat with Seller</a>
                                                @if($order->delivery_status == 'pending')
                                                    <a class="btn btn-sm btn-danger" href="{{url('/cancel-order',$order->id)}}" style="padding: 5px 10px; line-height: 1.2; font-size: 11px;"><i class="fas fa-trash mr-5"></i> Cancel</a>
                                                @elseif($order->delivery_status == 'delivered')
                                                    <a class="btn btn-sm btn-success" href="{{url('/order-received',$order->id)}}" style="padding: 5px 10px; line-height: 1.2; font-size: 11px;"> I Received Product</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @include('user.banner')
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                    <tr class="main-heading">
                                        <th scope="col">Product</th>
                                        <th scope="col">Order Tracking ID</th>
                                        <th scope="col">Delivery Status</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">View</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <div class="divider center_icon mt-100 mb-30"><b>Past Orders</b></div>
                                <tbody>
                                    @foreach ($past_orders as $order)
                                    <tr>
                                        <td class="image product-thumbnail">
                                            @if(in_array(strtolower(pathinfo($order->image, PATHINFO_EXTENSION)), ['mp4', 'webm', 'ogg', 'mov', 'avi']))
                                                <video src="products_images/{{$order->image}}" style="width: 80px; height: 80px; border-radius: 5px; object-fit: cover;" muted loop autoplay></video>
                                            @else
                                                <img src="products_images/{{$order->image}}" alt="product_image">
                                            @endif
                                        </td>
                                        <td>
                                            <span style="color: #2C3333; font-weight: 400;">{{$order->tracking_id}}</span>
                                        </td>
                                        <td class="product-des product-name px-5">
                                            <i style="color: #3EC70B; font-size: 17px;" class="fas fa-check-circle"></i>
                                            <span class="product-name px-1">Product is received by user</span>
                                        </td>
                                        <td class="text-center" data-title="Stock">
                                            <div class="detail-qty border radius  m-auto">
                                                <span class="qty-val">{{$order->quantity}}</span>
                                            </div>
                                        </td>
                                        <td class="text-right" data-title="Cart">
                                            <span>Rs. {{ ltrim($order->price, '$') }}</span>
                                        </td>
                                        <td class="action" data-title="View"><a href="{{url('/product_details', $order->product_id)}}" class="text-muted"><i class="fas fa-eye"></i></a></td>
                                        <td>
                                            @php
                                                $prod = \App\Models\Product::find($order->product_id);
                                                $sellerId = $prod ? ($prod->user_id ?? 1) : 1;
                                            @endphp
                                            <div style="display: flex; flex-direction: column; gap: 5px; align-items: center;">
                                                <a href="{{ route('messages.start', $order->product_id) }}" class="btn btn-sm btn-secondary" style="padding: 5px 10px; line-height: 1.2; font-size: 11px;"><i class="fi-rs-paper-plane mr-5"></i> Chat with Seller</a>
                                                
                                                <button type="button" class="btn btn-sm btn-fill-out rate-seller-btn" data-seller-id="{{ $sellerId }}" data-bs-toggle="modal" data-bs-target="#rateSellerModal" style="padding: 5px 10px; line-height: 1.2; font-size: 11px; border-radius: 4px;">
                                                    <i class="fi-rs-comment mr-5"></i> Rate Seller
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </section>
    </main>

    <!-- Rate Seller Modal -->
    <div class="modal fade" id="rateSellerModal" tabindex="-1" aria-labelledby="rateSellerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 12px; overflow: hidden;">
                <form action="{{ route('seller.review') }}" method="POST">
                    @csrf
                    <input type="hidden" name="seller_id" id="modal_seller_id">
                    
                    <div class="modal-header" style="background: #fdf6f0; border-bottom: 1px solid #fde6d8;">
                        <h5 class="modal-title" id="rateSellerModalLabel" style="color: #f15412; font-weight: 700;">Rate & Review Seller</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body" style="padding: 25px;">
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 700;">Rating (1 to 5 Stars)</label>
                            <select name="rating" class="form-control" required style="border-radius: 6px;">
                                <option value="5">⭐⭐⭐⭐⭐ (5 - Excellent)</option>
                                <option value="4">⭐⭐⭐⭐ (4 - Very Good)</option>
                                <option value="3">⭐⭐⭐ (3 - Good)</option>
                                <option value="2">⭐⭐ (2 - Fair)</option>
                                <option value="1">⭐ (1 - Poor)</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 700;">Your Comment / Review</label>
                            <textarea name="comment" class="form-control" rows="4" placeholder="Write your feedback about this seller..." required style="border-radius: 6px; padding: 10px;"></textarea>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" style="padding: 8px 15px;">Cancel</button>
                        <button type="submit" class="btn btn-fill-out btn-sm" style="padding: 8px 15px; border-radius: 4px;">Submit Review</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var rateButtons = document.querySelectorAll('.rate-seller-btn');
            rateButtons.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var sellerId = this.getAttribute('data-seller-id');
                    document.getElementById('modal_seller_id').value = sellerId;
                });
            });
        });
    </script>

    @include('user.footer')    
    <!-- Vendor JS-->
    <script src="user/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="user/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="user/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="user/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="user/assets/js/plugins/slick.js"></script>
    <script src="user/assets/js/plugins/jquery.syotimer.min.js"></script>
    <script src="user/assets/js/plugins/wow.js"></script>
    <script src="user/assets/js/plugins/jquery-ui.js"></script>
    <script src="user/assets/js/plugins/perfect-scrollbar.js"></script>
    <script src="user/assets/js/plugins/magnific-popup.js"></script>
    <script src="user/assets/js/plugins/select2.min.js"></script>
    <script src="user/assets/js/plugins/waypoints.js"></script>
    <script src="user/assets/js/plugins/counterup.js"></script>
    <script src="user/assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="user/assets/js/plugins/images-loaded.js"></script>
    <script src="user/assets/js/plugins/isotope.js"></script>
    <script src="user/assets/js/plugins/scrollup.js"></script>
    <script src="user/assets/js/plugins/jquery.vticker-min.js"></script>
    <script src="user/assets/js/plugins/jquery.theia.sticky.js"></script>
    <script src="user/assets/js/plugins/jquery.elevatezoom.js"></script>
    <!-- Template  JS -->
    <script src="user/assets/js/main.js?v=3.3"></script>
    <script src="user/assets/js/shop.js?v=3.3"></script></body>

</html>