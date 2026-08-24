<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>CYCLONE TECHNOLOGIES | My Account</title>
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
</head>

<body>
    @include('user.header')
    @include('user.mobile_header')    
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{url('/home')}}" rel="nofollow">Home</a>                    
                    <span></span> My Account
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="dashboard-menu">
                                    <ul class="nav flex-column" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="my-orders-tab" data-bs-toggle="tab" href="#my-orders" role="tab" aria-controls="my-orders" aria-selected="true"><i class="fi-rs-shopping-bag mr-10"></i>My Orders (Purchases)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>My Address</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="add-product-tab" data-bs-toggle="tab" href="#add-product" role="tab" aria-controls="add-product" aria-selected="true"><i class="fi-rs-plus mr-10"></i>Add Product to Sell</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="my-products-tab" data-bs-toggle="tab" href="#my-products" role="tab" aria-controls="my-products" aria-selected="true"><i class="fi-rs-box mr-10"></i>My Products</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="my-categories-tab" data-bs-toggle="tab" href="#my-categories" role="tab" aria-controls="my-categories" aria-selected="true"><i class="fi-rs-list mr-10"></i>My Categories</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="sales-orders-tab" data-bs-toggle="tab" href="#sales-orders" role="tab" aria-controls="sales-orders" aria-selected="true"><i class="fi-rs-shopping-cart mr-10"></i>Sales Orders (Seller)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="true"><i class="fi-rs-comment mr-10"></i>My Reviews</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('user.logout')}}"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content dashboard-content">
                                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Hello {{$user->name}}! </h5>
                                            </div>
                                            <div class="card-body">
                                                <p>From your account dashboard, you can easily check &amp; view your <a href="javascript:void(0)" onclick="openDashboardTab('my-orders'); return false;" style="color: #2563eb; font-weight: 700; text-decoration: underline;">recent orders (purchases)</a>, manage your <a href="javascript:void(0)" onclick="openDashboardTab('address'); return false;">shipping addresses</a> and <a href="javascript:void(0)" onclick="openDashboardTab('account-detail'); return false;">edit your profile details.</a></p>
                                                
                                                <div class="row mt-4 mb-2">
                                                    <div class="col-md-6 mb-3">
                                                        <a href="javascript:void(0)" onclick="openDashboardTab('my-orders'); return false;" style="text-decoration: none;">
                                                            <div class="p-3 rounded text-white" style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); border-radius: 12px; box-shadow: 0 4px 15px rgba(37,99,235,0.25); cursor: pointer;">
                                                                <h6 class="text-white font-weight-bold mb-1"><i class="fi-rs-shopping-bag mr-5"></i> My Purchased Orders</h6>
                                                                <small style="opacity: 0.9;">View live order status, tracking &amp; seller chat</small>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <a href="javascript:void(0)" onclick="openDashboardTab('sales-orders'); return false;" style="text-decoration: none;">
                                                            <div class="p-3 rounded text-white" style="background: linear-gradient(135deg, #059669 0%, #047857 100%); border-radius: 12px; box-shadow: 0 4px 15px rgba(5,150,105,0.25); cursor: pointer;">
                                                                <h6 class="text-white font-weight-bold mb-1"><i class="fi-rs-shopping-cart mr-5"></i> Sales Orders (Seller)</h6>
                                                                <small style="opacity: 0.9;">Update delivery status &amp; chat with buyers</small>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="mt-3 p-3 rounded" style="background: #fdf6f0; border: 1px solid #fde6d8; border-radius: 12px;">
                                                    <h6 style="color: #f15412; font-weight: 700;"><i class="fi-rs-gem mr-5"></i> My Rewards</h6>
                                                    <p class="mt-2 mb-0" style="font-size: 15px;">You have accumulated <strong>{{ Auth::user()->reward_points ?? 0 }}</strong> reward points from your completed purchases!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card mb-3 mb-lg-0">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">Billing Address</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <address>{{$user->address}}</address>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">Shipping Address</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="card-body">
                                                            <address>{{$user->address}}</address>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                        <div class="card mb-4">
                                            <div class="card-header bg-light">
                                                <h5 class="mb-0 font-weight-bold"><i class="fi-rs-user mr-10 text-primary"></i> Edit Profile Details</h5>
                                            </div>
                                            <div class="card-body">
                                                <form action="{{ route('user.update_profile') }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label class="font-weight-bold">Full Name <span class="required text-danger">*</span></label>
                                                            <input required class="form-control square" value="{{$user->name}}" name="name" type="text" placeholder="Enter your full name">
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label class="font-weight-bold">Email Address <span class="required text-danger">*</span></label>
                                                            <input required class="form-control square" value="{{$user->email}}" name="email" type="email" placeholder="Enter your email">
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label class="font-weight-bold">Mobile Phone Number <span class="required text-danger">*</span></label>
                                                            <input required class="form-control square" value="{{$user->phone}}" name="phone" type="text" placeholder="e.g. +94715356253">
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label class="font-weight-bold">Shipping Address</label>
                                                            <input class="form-control square" value="{{$user->address}}" name="address" type="text" placeholder="Enter your shipping address">
                                                        </div>

                                                        <h6 class="mt-3 mb-3 text-muted">Change Password (leave blank to keep current)</h6>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label>New Password</label>
                                                            <input class="form-control square" name="password" type="password" placeholder="Min 8 characters">
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label>Confirm New Password</label>
                                                            <input class="form-control square" name="password_confirmation" type="password" placeholder="Confirm new password">
                                                        </div>

                                                        <div class="col-md-12 mt-3">
                                                            <button type="submit" class="btn btn-fill-out hover-up" style="background: linear-gradient(135deg, #2563eb, #1d4ed8); color: white; font-weight: 700; border: none; border-radius: 50px; padding: 12px 30px;">
                                                                Save Profile Changes
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>

                                                <!-- DANGER ZONE: DELETE ACCOUNT -->
                                                <div class="mt-4 pt-3 border-top">
                                                    <div style="background: #fef2f2; border: 1.5px solid #fca5a5; border-radius: 12px; padding: 16px;">
                                                        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px;">
                                                            <div>
                                                                <h6 style="color: #991b1b; font-weight: 800; margin: 0;">⚠️ Danger Zone — Delete Account</h6>
                                                                <small style="color: #b91c1c; font-weight: 600;">Permanently remove your profile, listed products, categories, and account data.</small>
                                                            </div>
                                                            <form action="{{ route('user.delete_account') }}" method="POST" onsubmit="return confirm('⚠️ Are you absolutely sure you want to PERMANENTLY DELETE your account? All your products, categories, and data will be permanently erased. This action CANNOT be undone!');">
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger hover-up" style="background: linear-gradient(135deg, #dc2626, #991b1b); color: #ffffff; font-weight: 800; border: none; border-radius: 50px; padding: 10px 24px; box-shadow: 0 4px 12px rgba(220,38,38,0.3);">
                                                                    🗑️ Delete My Account
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="add-product" role="tabpanel" aria-labelledby="add-product-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>List a Product for Sale</h5>
                                            </div>
                                            <div class="card-body">
                                                <form action="{{ route('user.add_product') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label>Product Title <span class="required">*</span></label>
                                                            <input required class="form-control square" name="title" type="text" placeholder="e.g. Asus ROG Gaming Laptop">
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label>Category <span class="required">*</span></label>
                                                            <select required class="form-control square" name="category">
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4 mb-3">
                                                            <label>Price ($) <span class="required">*</span></label>
                                                            <input required class="form-control square" name="price" type="number" step="0.01" min="0" placeholder="e.g. 1200">
                                                        </div>
                                                        <div class="form-group col-md-4 mb-3">
                                                            <label>Discount Price ($) <span class="required">*</span></label>
                                                            <input required class="form-control square" name="discount_price" type="number" step="0.01" min="0" placeholder="e.g. 1000">
                                                        </div>
                                                        <div class="form-group col-md-4 mb-3">
                                                            <label>Quantity <span class="required">*</span></label>
                                                            <input required class="form-control square" name="quantity" type="number" min="1" placeholder="e.g. 5">
                                                        </div>
                                                        
                                                        <h6 class="mb-3 mt-4 text-brand">Specifications</h6>
                                                        <div class="form-group col-md-4 mb-3">
                                                            <label>RAM</label>
                                                            <input class="form-control square" name="ram" type="text" placeholder="e.g. 16GB">
                                                        </div>
                                                        <div class="form-group col-md-4 mb-3">
                                                            <label>SSD Capacity</label>
                                                            <input class="form-control square" name="ssd_capacity" type="text" placeholder="e.g. 512GB">
                                                        </div>
                                                        <div class="form-group col-md-4 mb-3">
                                                            <label>Processor</label>
                                                            <input class="form-control square" name="processor" type="text" placeholder="e.g. Intel i7">
                                                        </div>
                                                        <div class="form-group col-md-3 mb-3">
                                                            <label>Processor Gen</label>
                                                            <input class="form-control square" name="processor_generation" type="text" placeholder="e.g. 12th Gen">
                                                        </div>
                                                        <div class="form-group col-md-3 mb-3">
                                                            <label>Processor Type</label>
                                                            <input class="form-control square" name="processor_type" type="text" placeholder="e.g. 12700H">
                                                        </div>
                                                        <div class="form-group col-md-3 mb-3">
                                                            <label>Processor Speed</label>
                                                            <input class="form-control square" name="processor_speed" type="text" placeholder="e.g. 2.7 GHz">
                                                        </div>
                                                        <div class="form-group col-md-3 mb-3">
                                                            <label>OS</label>
                                                            <input class="form-control square" name="operating_system" type="text" placeholder="e.g. Windows 11">
                                                        </div>
                                                        <div class="form-group col-md-4 mb-3">
                                                            <label>Screen Size</label>
                                                            <input class="form-control square" name="screen_size" type="text" placeholder="e.g. 15.6 inch">
                                                        </div>
                                                        <div class="form-group col-md-4 mb-3">
                                                            <label>Resolution</label>
                                                            <input class="form-control square" name="screen_resolution" type="text" placeholder="e.g. 1920x1080">
                                                        </div>
                                                        <div class="form-group col-md-4 mb-3">
                                                            <label>Refresh Rate</label>
                                                            <input class="form-control square" name="screen_refresh_rate" type="text" placeholder="e.g. 144Hz">
                                                        </div>
                                                        <div class="form-group col-md-3 mb-3">
                                                            <label>Graphics Type</label>
                                                            <input class="form-control square" name="graphics_type" type="text" placeholder="e.g. RTX 3060">
                                                        </div>
                                                        <div class="form-group col-md-3 mb-3">
                                                            <label>GPU Memory</label>
                                                            <input class="form-control square" name="graphics_card_memory" type="text" placeholder="e.g. 6GB">
                                                        </div>
                                                        <div class="form-group col-md-3 mb-3">
                                                            <label>Weight</label>
                                                            <input class="form-control square" name="device_weight" type="text" placeholder="e.g. 2.1kg">
                                                        </div>
                                                        <div class="form-group col-md-3 mb-3">
                                                            <label>Color</label>
                                                            <input class="form-control square" name="color" type="text" placeholder="e.g. Eclipse Gray">
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label>Keyboard</label>
                                                            <input class="form-control square" name="keyboard" type="text" placeholder="e.g. RGB Backlit">
                                                        </div>
                                                        
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label>Product Image <span class="required">*</span></label>
                                                            <input required class="form-control square" id="image" name="image" type="file">
                                                            <img id="showImage" style="width: 100px; margin-top: 10px; border-radius: 5px;" src="/admin/assets/images/no_image.jpg" alt="preview">
                                                        </div>
                                                        
                                                        <div class="col-md-12 mt-4">
                                                            <button type="submit" class="btn btn-fill-out submit">List Product</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="my-products" role="tabpanel" aria-labelledby="my-products-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>My Products for Sale</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Image</th>
                                                                <th>Title</th>
                                                                <th>Category</th>
                                                                <th>Price</th>
                                                                <th>Stock</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($user_products as $p)
                                                                <tr>
                                                                    <td>
                                                                        @if(in_array(strtolower(pathinfo($p->image, PATHINFO_EXTENSION)), ['mp4', 'webm', 'ogg', 'mov', 'avi']))
                                                                            <video src="products_images/{{ $p->image }}" style="max-width: 60px; max-height: 60px; border-radius: 5px; object-fit: cover;" muted loop autoplay></video>
                                                                        @else
                                                                            <img src="products_images/{{ $p->image }}" style="max-width: 60px; border-radius: 5px;" alt="">
                                                                        @endif
                                                                    </td>
                                                                    <td>{{ $p->title }}</td>
                                                                    <td>{{ $p->category }}</td>
                                                                    <td>Rs. {{ ltrim($p->discount_price, '$') }} <del class="text-muted">Rs. {{ ltrim($p->price, '$') }}</del></td>
                                                                    <td>
                                                                        @if($p->quantity <= 0)
                                                                            <span class="badge bg-danger text-white" style="font-size: 11px; padding: 4px 8px;">Out of Stock (0)</span>
                                                                        @else
                                                                            <span class="badge bg-success text-white" style="font-size: 11px; padding: 4px 8px;">{{ $p->quantity }} In Stock</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <form action="{{ route('user.refill_stock', $p->id) }}" method="POST" style="display: inline-block; margin-right: 4px; margin-bottom: 2px;">
                                                                            @csrf
                                                                            <div class="input-group input-group-sm" style="display: inline-flex; width: 110px;">
                                                                                <input type="number" name="quantity" class="form-control" value="10" min="1" style="height: 26px; padding: 2px 6px; font-size: 11px;" title="Enter quantity to add">
                                                                                <button type="submit" class="btn btn-sm btn-success" style="padding: 2px 8px; font-size: 11px; line-height: 1;" title="Refill Stock">+ Refill</button>
                                                                            </div>
                                                                        </form>
                                                                        <a href="{{ route('user.edit_product', $p->id) }}" class="btn btn-sm" style="padding: 2px 10px; line-height: 1; margin-bottom: 2px;">Edit</a>
                                                                        <a href="{{ route('user.delete_product', $p->id) }}" class="btn btn-sm bg-danger text-white" style="padding: 2px 10px; line-height: 1;" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="sales-orders" role="tabpanel" aria-labelledby="sales-orders-tab">
                                        <div class="card" style="border: none; box-shadow: none;">
                                            <div class="card-header d-flex align-items-center justify-content-between" style="background: #f8fafc; border-bottom: 2px solid #e2e8f0; padding: 16px 20px;">
                                                <h5 class="mb-0 font-weight-bold" style="color: #0f172a;">📦 Sales Orders &amp; Delivery Progress Manager</h5>
                                                <span class="badge bg-primary text-white" style="border-radius: 50px; padding: 6px 14px; font-size: 12px;">{{ count($sold_orders) }} Orders Received</span>
                                            </div>
                                            <div class="card-body" style="padding: 20px 0;">
                                                @if(count($sold_orders) == 0)
                                                    <div class="text-center py-5">
                                                        <img src="/user/assets/imgs/empty-cart-img.jpg" style="width: 120px; opacity: 0.6; mb-3" alt="">
                                                        <h6 class="text-muted">No sales orders received yet.</h6>
                                                    </div>
                                                @else
                                                    @foreach ($sold_orders as $order)
                                                        <div class="card mb-4" style="border-radius: 16px; border: 1.5px solid #cbd5e1; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                                                            <!-- Order Card Header -->
                                                            <div class="card-header" style="background: #f8fafc; padding: 14px 20px; border-bottom: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px;">
                                                                <div>
                                                                    <span class="badge bg-dark text-white" style="font-size: 12px; font-weight: 700; padding: 5px 10px; border-radius: 6px;">
                                                                        Tracking ID: {{ $order->tracking_id }}
                                                                    </span>
                                                                    <small class="text-muted" style="margin-left: 10px;">Date: {{ $order->created_at->format('Y-m-d H:i') }}</small>
                                                                </div>
                                                                <div style="display: flex; align-items: center; gap: 8px;">
                                                                    <span class="badge bg-success text-white" style="padding: 5px 10px; font-size: 11px;">Payment: {{ str_replace('_', ' ', strtoupper($order->payment_status)) }}</span>
                                                                    <span class="font-weight-bold" style="font-size: 15px; color: #f15412;">Rs. {{ ltrim($order->price, '$') }}</span>
                                                                </div>
                                                            </div>

                                                            <!-- Order Card Body -->
                                                            <div class="card-body" style="padding: 20px;">
                                                                <div class="row align-items-center mb-3">
                                                                    <!-- Product Details -->
                                                                    <div class="col-md-5 mb-2 mb-md-0">
                                                                        <h6 class="font-weight-bold mb-1" style="color: #0f172a;">{{ $order->product_title }}</h6>
                                                                        <small class="text-muted">Quantity Ordered: <strong>{{ $order->quantity }} Units</strong></small>
                                                                    </div>
                                                                    <!-- Buyer Details -->
                                                                    <div class="col-md-4 mb-2 mb-md-0" style="font-size: 13px;">
                                                                        <div style="color: #334155;"><strong>👤 Buyer:</strong> {{ $order->name }}</div>
                                                                        <div style="color: #64748b;"><i class="fi-rs-phone"></i> {{ $order->phone }}</div>
                                                                        <div style="color: #64748b;"><i class="fi-rs-marker"></i> {{ $order->address }}</div>
                                                                    </div>
                                                                    <!-- Chat Action Button -->
                                                                    <div class="col-md-3 text-md-end">
                                                                        <a href="{{ route('messages.inbox', ['user_id' => $order->user_id, 'product_id' => $order->product_id]) }}" class="btn btn-sm btn-fill-out" style="padding: 6px 14px; border-radius: 8px; font-size: 12px; display: inline-flex; align-items: center; gap: 6px;">
                                                                            <i class="fi-rs-paper-plane"></i> Chat with Buyer
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                 <!-- 5-STEP VISUAL PROGRESS TRACKER -->
                                                                <div style="background: #f1f5f9; padding: 14px 18px; border-radius: 12px; border: 1px solid #cbd5e1; margin-bottom: 16px;">
                                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                                        <span style="font-size: 12px; font-weight: 800; color: #1e293b; text-transform: uppercase;">
                                                                            📊 Current Delivery Progress: 
                                                                            @if($order->delivery_status == 'pending')
                                                                                <span class="text-warning">🟡 Pending Order</span>
                                                                            @elseif($order->delivery_status == 'packaging')
                                                                                <span class="text-info">📦 Product Packaging</span>
                                                                            @elseif($order->delivery_status == 'shipped')
                                                                                <span class="text-primary">🚚 Shipped to Courier</span>
                                                                            @elseif($order->delivery_status == 'on_the_way')
                                                                                <span style="color: #ff6000;">🛵 Out for Delivery</span>
                                                                            @elseif(in_array($order->delivery_status, ['delivered', 'passive_order']))
                                                                                <span class="text-success font-weight-bold">✅ DELIVERED &amp; COMPLETED</span>
                                                                            @else
                                                                                <span class="text-secondary">{{ strtoupper($order->delivery_status) }}</span>
                                                                            @endif
                                                                        </span>
                                                                    </div>

                                                                    <!-- Step Progress Bar Icons -->
                                                                    <div class="d-flex justify-content-between text-center" style="position: relative; padding: 10px 0;">
                                                                        @php
                                                                            $isDelivered = in_array($order->delivery_status, ['delivered', 'passive_order']);
                                                                            $statuses = ['pending', 'packaging', 'shipped', 'on_the_way', 'delivered', 'passive_order'];
                                                                            $currentIndex = array_search($order->delivery_status, $statuses);
                                                                            if ($currentIndex === false) $currentIndex = 0;
                                                                            if ($currentIndex > 4) $currentIndex = 4;
                                                                        @endphp
                                                                        
                                                                        <div style="flex: 1;">
                                                                            <div style="width: 32px; height: 32px; border-radius: 50%; margin: 0 auto 6px; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 13px; {{ $currentIndex >= 0 ? 'background: #22c55e; color: #fff;' : 'background: #cbd5e1; color: #64748b;' }}">{{ $currentIndex >= 0 ? '✓' : '1' }}</div>
                                                                            <small style="font-weight: 700; font-size: 11px; {{ $currentIndex >= 0 ? 'color: #15803d;' : 'color: #94a3b8;' }}">Pending</small>
                                                                        </div>
                                                                        <div style="flex: 1;">
                                                                            <div style="width: 32px; height: 32px; border-radius: 50%; margin: 0 auto 6px; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 13px; {{ $currentIndex >= 1 ? 'background: #22c55e; color: #fff;' : 'background: #cbd5e1; color: #64748b;' }}">{{ $currentIndex >= 1 ? '✓' : '2' }}</div>
                                                                            <small style="font-weight: 700; font-size: 11px; {{ $currentIndex >= 1 ? 'color: #15803d;' : 'color: #94a3b8;' }}">Packaging</small>
                                                                        </div>
                                                                        <div style="flex: 1;">
                                                                            <div style="width: 32px; height: 32px; border-radius: 50%; margin: 0 auto 6px; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 13px; {{ $currentIndex >= 2 ? 'background: #22c55e; color: #fff;' : 'background: #cbd5e1; color: #64748b;' }}">{{ $currentIndex >= 2 ? '✓' : '3' }}</div>
                                                                            <small style="font-weight: 700; font-size: 11px; {{ $currentIndex >= 2 ? 'color: #15803d;' : 'color: #94a3b8;' }}">Shipped</small>
                                                                        </div>
                                                                        <div style="flex: 1;">
                                                                            <div style="width: 32px; height: 32px; border-radius: 50%; margin: 0 auto 6px; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 13px; {{ $currentIndex >= 3 ? 'background: #22c55e; color: #fff;' : 'background: #cbd5e1; color: #64748b;' }}">{{ $currentIndex >= 3 ? '✓' : '4' }}</div>
                                                                            <small style="font-weight: 700; font-size: 11px; {{ $currentIndex >= 3 ? 'color: #15803d;' : 'color: #94a3b8;' }}">On the Way</small>
                                                                        </div>
                                                                        <div style="flex: 1;">
                                                                            <div style="width: 32px; height: 32px; border-radius: 50%; margin: 0 auto 6px; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 13px; {{ $currentIndex >= 4 ? 'background: #22c55e; color: #fff;' : 'background: #cbd5e1; color: #64748b;' }}">{{ $currentIndex >= 4 ? '✓' : '5' }}</div>
                                                                            <small style="font-weight: 700; font-size: 11px; {{ $currentIndex >= 4 ? 'color: #15803d;' : 'color: #94a3b8;' }}">Delivered</small>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                @if($isDelivered)
                                                                    <div style="background: #f0fdf4; border: 1.5px solid #22c55e; color: #15803d; padding: 12px 18px; border-radius: 12px; font-weight: 700; font-size: 13px; display: flex; align-items: center; justify-content: space-between;">
                                                                        <div style="display: flex; align-items: center; gap: 10px;">
                                                                            <div style="width: 28px; height: 28px; background: #22c55e; color: #ffffff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 900; font-size: 16px;">✓</div>
                                                                            <div>
                                                                                <div style="font-size: 14px; font-weight: 800; color: #15803d;">✅ Order Completed &amp; Green Ticked!</div>
                                                                                <small style="color: #166534; font-weight: 600;">Product has been delivered to customer.</small>
                                                                            </div>
                                                                        </div>
                                                                        <span class="badge bg-success text-white" style="font-size: 12px; padding: 6px 14px; border-radius: 50px;">✅ Green Ticked</span>
                                                                    </div>
                                                                @else
                                                                    <!-- 1-CLICK QUICK STATUS UPDATE BUTTONS -->
                                                                    <div style="background: #ffffff; padding: 12px 16px; border-radius: 10px; border: 1px dashed #cbd5e1;">
                                                                        <div class="d-flex align-items-center justify-content-between flex-wrap" style="gap: 10px;">
                                                                            <span style="font-size: 12px; font-weight: 800; color: #334155;">⚡ Update Progress (Sends Instant Customer SMS):</span>
                                                                            <form action="{{ route('user.update_order_status', $order->id) }}" method="POST" class="d-flex flex-wrap m-0" style="gap: 6px;">
                                                                                @csrf
                                                                                <button type="submit" name="delivery_status" value="pending" class="btn btn-sm {{ $order->delivery_status == 'pending' ? 'btn-warning text-white' : 'btn-outline-secondary' }}" style="padding: 4px 10px; font-size: 11px; border-radius: 6px;">🟡 Pending</button>
                                                                                <button type="submit" name="delivery_status" value="packaging" class="btn btn-sm {{ $order->delivery_status == 'packaging' ? 'btn-info text-white' : 'btn-outline-secondary' }}" style="padding: 4px 10px; font-size: 11px; border-radius: 6px;">📦 Packaging</button>
                                                                                <button type="submit" name="delivery_status" value="shipped" class="btn btn-sm {{ $order->delivery_status == 'shipped' ? 'btn-primary' : 'btn-outline-secondary' }}" style="padding: 4px 10px; font-size: 11px; border-radius: 6px;">🚚 Shipped</button>
                                                                                <button type="submit" name="delivery_status" value="on_the_way" class="btn btn-sm {{ $order->delivery_status == 'on_the_way' ? 'btn-dark' : 'btn-outline-secondary' }}" style="padding: 4px 10px; font-size: 11px; border-radius: 6px;">🛵 On the Way</button>
                                                                                <button type="submit" name="delivery_status" value="delivered" class="btn btn-sm {{ $order->delivery_status == 'delivered' ? 'btn-success' : 'btn-outline-secondary' }}" style="padding: 4px 10px; font-size: 11px; border-radius: 6px;">✅ Delivered</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="my-orders" role="tabpanel" aria-labelledby="my-orders-tab">
                                        <div class="card" style="border: none; box-shadow: none;">
                                            <div class="card-header d-flex align-items-center justify-content-between" style="background: #f8fafc; border-bottom: 2px solid #e2e8f0; padding: 16px 20px;">
                                                <h5 class="mb-0 font-weight-bold" style="color: #0f172a;">🛍️ My Orders &amp; Delivery Tracking</h5>
                                                <span class="badge bg-primary text-white" style="border-radius: 50px; padding: 6px 14px; font-size: 12px;">{{ count($bought_orders ?? []) }} Purchases</span>
                                            </div>
                                            <div class="card-body" style="padding: 20px 0;">
                                                @if(count($bought_orders ?? []) == 0)
                                                    <div class="text-center py-5">
                                                        <img src="/user/assets/imgs/empty-cart-img.jpg" style="width: 120px; opacity: 0.6; margin-bottom: 12px;" alt="">
                                                        <h6 class="text-muted">You have not placed any orders yet.</h6>
                                                        <a href="/shop" class="btn btn-sm btn-fill-out mt-3" style="padding: 8px 20px; border-radius: 8px;">Explore Products</a>
                                                    </div>
                                                @else
                                                    @foreach ($bought_orders as $order)
                                                        <div class="card mb-4" style="border-radius: 16px; border: 1.5px solid #cbd5e1; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                                                            <!-- Order Header -->
                                                            <div class="card-header" style="background: #f8fafc; padding: 14px 20px; border-bottom: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px;">
                                                                <div>
                                                                    <span class="badge bg-dark text-white" style="font-size: 12px; font-weight: 700; padding: 5px 10px; border-radius: 6px;">
                                                                        Tracking ID: {{ $order->tracking_id }}
                                                                    </span>
                                                                    <small class="text-muted" style="margin-left: 10px;">Date: {{ $order->created_at->format('Y-m-d H:i') }}</small>
                                                                </div>
                                                                <div style="display: flex; align-items: center; gap: 8px;">
                                                                    <span class="badge bg-success text-white" style="padding: 5px 10px; font-size: 11px;">Payment: {{ str_replace('_', ' ', strtoupper($order->payment_status)) }}</span>
                                                                    <span class="font-weight-bold" style="font-size: 15px; color: #f15412;">Rs. {{ ltrim($order->price, '$') }}</span>
                                                                </div>
                                                            </div>

                                                            <!-- Order Content -->
                                                            <div class="card-body" style="padding: 20px;">
                                                                <div class="row align-items-center mb-3">
                                                                    <div class="col-md-2 text-center mb-2 mb-md-0">
                                                                        @if(in_array(strtolower(pathinfo($order->image, PATHINFO_EXTENSION)), ['mp4', 'webm', 'ogg', 'mov', 'avi']))
                                                                            <video src="products_images/{{$order->image}}" style="width: 70px; height: 70px; border-radius: 8px; object-fit: cover;" muted loop autoplay></video>
                                                                        @else
                                                                            <img src="products_images/{{$order->image}}" style="width: 70px; height: 70px; border-radius: 8px; object-fit: cover;" alt="">
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-md-7 mb-2 mb-md-0">
                                                                        <h6 class="font-weight-bold mb-1" style="color: #0f172a;">{{ $order->product_title }}</h6>
                                                                        <small class="text-muted">Quantity: <strong>{{ $order->quantity }} Units</strong> | Price: <strong>Rs. {{ ltrim($order->price, '$') }}</strong></small>
                                                                    </div>
                                                                    <div class="col-md-3 text-md-end">
                                                                        <a href="{{ route('messages.start', $order->product_id) }}" class="btn btn-sm btn-secondary" style="padding: 6px 12px; font-size: 11.5px; border-radius: 6px; display: inline-flex; align-items: center; gap: 5px;">
                                                                            <i class="fi-rs-paper-plane"></i> Chat with Seller
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <!-- 5-STEP VISUAL PROGRESS TRACKER -->
                                                                <div style="background: #f1f5f9; padding: 14px 18px; border-radius: 12px; border: 1px solid #cbd5e1;">
                                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                                        <span style="font-size: 12px; font-weight: 800; color: #1e293b; text-transform: uppercase;">
                                                                            📦 Live Delivery Status: 
                                                                            @if($order->delivery_status == 'pending')
                                                                                <span class="text-warning">🟡 Pending Order</span>
                                                                            @elseif($order->delivery_status == 'packaging')
                                                                                <span class="text-info">📦 Product is Being Packaged</span>
                                                                            @elseif($order->delivery_status == 'shipped')
                                                                                <span class="text-primary">🚚 Product is Being Shipped</span>
                                                                            @elseif($order->delivery_status == 'on_the_way')
                                                                                <span style="color: #ff6000;">🛵 Product is On the Way</span>
                                                                            @elseif(in_array($order->delivery_status, ['delivered', 'passive_order']))
                                                                                <span class="text-success font-weight-bold">✅ PRODUCT DELIVERED &amp; COMPLETED</span>
                                                                            @else
                                                                                <span class="text-secondary">{{ strtoupper($order->delivery_status) }}</span>
                                                                            @endif
                                                                        </span>
                                                                        
                                                                        @if($order->delivery_status == 'pending')
                                                                            <a href="{{ url('/cancel-order', $order->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Cancel this order?')" style="padding: 3px 10px; font-size: 11px;">Cancel Order</a>
                                                                        @endif
                                                                    </div>

                                                                    <div class="d-flex justify-content-between text-center" style="position: relative; padding: 10px 0;">
                                                                        @php
                                                                            $bIsDelivered = in_array($order->delivery_status, ['delivered', 'passive_order']);
                                                                            $bStatuses = ['pending', 'packaging', 'shipped', 'on_the_way', 'delivered', 'passive_order'];
                                                                            $bIndex = array_search($order->delivery_status, $bStatuses);
                                                                            if ($bIndex === false) $bIndex = 0;
                                                                            if ($bIndex > 4) $bIndex = 4;
                                                                        @endphp
                                                                        
                                                                        <div style="flex: 1;">
                                                                            <div style="width: 30px; height: 30px; border-radius: 50%; margin: 0 auto 5px; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 12px; {{ $bIndex >= 0 ? 'background: #22c55e; color: #fff;' : 'background: #cbd5e1; color: #64748b;' }}">{{ $bIndex >= 0 ? '✓' : '1' }}</div>
                                                                            <small style="font-weight: 700; font-size: 11px; {{ $bIndex >= 0 ? 'color: #15803d;' : 'color: #94a3b8;' }}">Pending</small>
                                                                        </div>
                                                                        <div style="flex: 1;">
                                                                            <div style="width: 30px; height: 30px; border-radius: 50%; margin: 0 auto 5px; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 12px; {{ $bIndex >= 1 ? 'background: #22c55e; color: #fff;' : 'background: #cbd5e1; color: #64748b;' }}">{{ $bIndex >= 1 ? '✓' : '2' }}</div>
                                                                            <small style="font-weight: 700; font-size: 11px; {{ $bIndex >= 1 ? 'color: #15803d;' : 'color: #94a3b8;' }}">Packaging</small>
                                                                        </div>
                                                                        <div style="flex: 1;">
                                                                            <div style="width: 30px; height: 30px; border-radius: 50%; margin: 0 auto 5px; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 12px; {{ $bIndex >= 2 ? 'background: #22c55e; color: #fff;' : 'background: #cbd5e1; color: #64748b;' }}">{{ $bIndex >= 2 ? '✓' : '3' }}</div>
                                                                            <small style="font-weight: 700; font-size: 11px; {{ $bIndex >= 2 ? 'color: #15803d;' : 'color: #94a3b8;' }}">Shipped</small>
                                                                        </div>
                                                                        <div style="flex: 1;">
                                                                            <div style="width: 30px; height: 30px; border-radius: 50%; margin: 0 auto 5px; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 12px; {{ $bIndex >= 3 ? 'background: #22c55e; color: #fff;' : 'background: #cbd5e1; color: #64748b;' }}">{{ $bIndex >= 3 ? '✓' : '4' }}</div>
                                                                            <small style="font-weight: 700; font-size: 11px; {{ $bIndex >= 3 ? 'color: #15803d;' : 'color: #94a3b8;' }}">On the Way</small>
                                                                        </div>
                                                                        <div style="flex: 1;">
                                                                            <div style="width: 30px; height: 30px; border-radius: 50%; margin: 0 auto 5px; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 12px; {{ $bIndex >= 4 ? 'background: #22c55e; color: #fff;' : 'background: #cbd5e1; color: #64748b;' }}">{{ $bIndex >= 4 ? '✓' : '5' }}</div>
                                                                            <small style="font-weight: 700; font-size: 11px; {{ $bIndex >= 4 ? 'color: #15803d;' : 'color: #94a3b8;' }}">Delivered</small>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                @if($order->delivery_status == 'delivered')
                                                                    <div style="background: #f0fdf4; border: 1.5px solid #22c55e; color: #15803d; padding: 12px 18px; border-radius: 12px; font-weight: 700; font-size: 13px; display: flex; align-items: center; justify-content: space-between; margin-top: 12px;">
                                                                        <div style="display: flex; align-items: center; gap: 10px;">
                                                                            <div style="width: 28px; height: 28px; background: #22c55e; color: #ffffff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 900; font-size: 16px;">✓</div>
                                                                            <div>
                                                                                <div style="font-size: 14px; font-weight: 800; color: #15803d;">Product Delivered! Confirm Receipt:</div>
                                                                                <small style="color: #166534; font-weight: 600;">Click button once you've received package.</small>
                                                                            </div>
                                                                        </div>
                                                                        <a href="{{ url('/order-received', $order->id) }}" class="btn btn-sm btn-success" style="padding: 6px 16px; font-size: 12px; font-weight: 800; border-radius: 8px; background: #22c55e; border: none; box-shadow: 0 4px 12px rgba(34,197,94,0.3);">✅ I Received Product</a>
                                                                    </div>
                                                                @elseif($order->delivery_status == 'passive_order')
                                                                    <div style="background: #f0fdf4; border: 1.5px solid #22c55e; color: #15803d; padding: 12px 18px; border-radius: 12px; font-weight: 700; font-size: 13px; display: flex; align-items: center; justify-content: space-between; margin-top: 12px;">
                                                                        <div style="display: flex; align-items: center; gap: 10px;">
                                                                            <div style="width: 28px; height: 28px; background: #22c55e; color: #ffffff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 900; font-size: 16px;">✓</div>
                                                                            <div>
                                                                                <div style="font-size: 14px; font-weight: 800; color: #15803d;">✅ Product Received &amp; Order Complete!</div>
                                                                                <small style="color: #166534; font-weight: 600;">Thank you for confirming receipt of your purchase.</small>
                                                                            </div>
                                                                        </div>
                                                                        <span class="badge bg-success text-white" style="font-size: 12px; padding: 6px 14px; border-radius: 50px;">✅ Green Ticked</span>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="my-categories" role="tabpanel" aria-labelledby="my-categories-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Product Categories</h5>
                                            </div>
                                            <div class="card-body">
                                                <form action="{{ route('user.add_category') }}" method="POST" class="mb-4">
                                                    @csrf
                                                    <div class="row align-items-end">
                                                        <div class="form-group col-md-8 mb-3">
                                                            <label>New Category Name <span class="required">*</span></label>
                                                            <input required class="form-control square" name="category" type="text" placeholder="e.g. Mechanical Keyboards">
                                                        </div>
                                                        <div class="form-group col-md-4 mb-3">
                                                            <button type="submit" class="btn btn-fill-out" style="padding: 12px 25px;">Add Category</button>
                                                        </div>
                                                    </div>
                                                </form>

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Category Name</th>
                                                                <th>Type</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($categories as $cat)
                                                                @php
                                                                    $is_custom = ($cat->user_id == Auth::id());
                                                                    $cat_products = $user_products->where('category', $cat->category_name);
                                                                @endphp
                                                                <tr>
                                                                    <td>
                                                                        @if($is_custom)
                                                                            <form action="{{ route('user.update_category', $cat->id) }}" method="POST" id="edit-cat-{{ $cat->id }}" style="display: none;">
                                                                                @csrf
                                                                                <div class="input-group">
                                                                                    <input type="text" name="category_name" class="form-control form-control-sm" value="{{ $cat->category_name }}" required>
                                                                                    <button type="submit" class="btn btn-sm btn-secondary" style="padding: 2px 10px; line-height: 1;">Save</button>
                                                                                    <button type="button" class="btn btn-sm btn-light" style="padding: 2px 10px; line-height: 1;" onclick="toggleEdit({{ $cat->id }})">Cancel</button>
                                                                                </div>
                                                                            </form>
                                                                            <span id="text-cat-{{ $cat->id }}">{{ $cat->category_name }}</span>
                                                                        @else
                                                                            <span>{{ $cat->category_name }}</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($is_custom)
                                                                            <span class="badge bg-info">Custom</span>
                                                                        @else
                                                                            <span class="badge bg-secondary">System</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($is_custom)
                                                                            <button type="button" class="btn btn-sm shadow-none" style="padding: 2px 10px; line-height: 1;" onclick="toggleEdit({{ $cat->id }})">Edit</button>
                                                                            <a href="{{ route('user.delete_category', $cat->id) }}" class="btn btn-sm bg-danger text-white" style="padding: 2px 10px; line-height: 1;" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                                                                        @endif
                                                                        <button type="button" class="btn btn-sm btn-info text-white" style="padding: 2px 10px; line-height: 1;" onclick="toggleProducts({{ $cat->id }})">
                                                                            Manage Products ({{ $cat_products->count() }})
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <!-- Collapsible row for managing products in this category -->
                                                                <tr id="products-cat-{{ $cat->id }}" style="display: none; background-color: #fcfcfc;">
                                                                    <td colspan="3">
                                                                        <div style="padding: 15px; border: 1px solid #e2e2e2; border-radius: 5px; margin: 10px 0;">
                                                                            <h6 class="mb-3">Products in "{{ $cat->category_name }}"</h6>
                                                                            @if($cat_products->count() > 0)
                                                                                <table class="table mb-0 table-sm">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Image</th>
                                                                                            <th>Title</th>
                                                                                            <th>Price</th>
                                                                                            <th>Qty</th>
                                                                                            <th>Actions</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach($cat_products as $prod)
                                                                                            <tr>
                                                                                                <td>
                                                                                                    @if(in_array(strtolower(pathinfo($prod->image, PATHINFO_EXTENSION)), ['mp4', 'webm', 'ogg', 'mov', 'avi']))
                                                                                                        <video src="/products_images/{{ $prod->image }}" style="width: 40px; height: 40px; border-radius: 5px; object-fit: cover;" muted loop autoplay></video>
                                                                                                    @else
                                                                                                        <img src="/products_images/{{ $prod->image }}" style="width: 40px; border-radius: 5px;">
                                                                                                    @endif
                                                                                                </td>
                                                                                                <td>{{ $prod->title }}</td>
                                                                                                <td>Rs. {{ ltrim($prod->price, '$') }}</td>
                                                                                                <td>{{ $prod->quantity }}</td>
                                                                                                <td>
                                                                                                    <a href="{{ route('user.edit_product', $prod->id) }}" class="btn btn-xs" style="padding: 1px 6px; font-size: 11px;">Edit</a>
                                                                                                    <a href="{{ route('user.delete_product', $prod->id) }}" class="btn btn-xs bg-danger text-white" style="padding: 1px 6px; font-size: 11px;" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                            @else
                                                                                <p class="text-muted mb-0" style="font-size: 13px;">No products listed by you in this category.</p>
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Customer Reviews & Comments</h5>
                                            </div>
                                            <div class="card-body">
                                                @php
                                                    $sellerComments = \App\Models\SellerComment::where('seller_id', Auth::id())->with('buyer')->latest()->get();
                                                    $avgRating = \App\Models\SellerComment::where('seller_id', Auth::id())->avg('rating') ?: 0;
                                                @endphp
                                                <div class="mb-4 d-flex align-items-center gap-3">
                                                    <h3 class="text-brand">{{ number_format($avgRating, 1) }}</h3>
                                                    <div>
                                                        <div style="color: #f15412; font-size: 16px; margin-bottom: 5px;">
                                                            @for($i = 1; $i <= 5; $i++)
                                                                @if($i <= round($avgRating))
                                                                    ★
                                                                @else
                                                                    ☆
                                                                @endif
                                                            @endfor
                                                        </div>
                                                        <p class="text-muted mb-0">Average rating based on {{ $sellerComments->count() }} reviews</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                @forelse($sellerComments as $c)
                                                    <div class="mb-4 p-3 border rounded" style="background: #fafafa; position: relative;">
                                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                                            <div class="d-flex align-items-center gap-2">
                                                                <strong>{{ $c->buyer->name }}</strong>
                                                                <div style="color: #f15412; font-size: 11px;">
                                                                    @for($i = 1; $i <= 5; $i++)
                                                                        @if($i <= $c->rating)
                                                                            ★
                                                                        @else
                                                                            ☆
                                                                        @endif
                                                                    @endfor
                                                                </div>
                                                            </div>
                                                            <small class="text-muted">{{ $c->created_at->format('Y-m-d') }}</small>
                                                        </div>
                                                        <p class="mb-0 text-muted" style="font-size: 13px;">{{ $c->comment }}</p>
                                                    </div>
                                                @empty
                                                    <p class="text-muted">You haven't received any reviews yet.</p>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
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
    <script src="user/assets/js/shop.js?v=3.3"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var file = e.target.files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    var fileType = file.type;
                    var container = $('#showImage').parent();
                    $('#showImage').remove();
                    if (fileType.startsWith('video/')) {
                        container.append('<video id="showImage" style="width: 100px; margin-top: 10px; border-radius: 5px;" src="' + e.target.result + '" muted controls></video>');
                    } else {
                        container.append('<img id="showImage" style="width: 100px; margin-top: 10px; border-radius: 5px;" src="' + e.target.result + '" alt="preview">');
                    }
                };
                reader.readAsDataURL(file);
            });
        });

        function toggleEdit(id) {
            var form = $('#edit-cat-' + id);
            var text = $('#text-cat-' + id);
            if (form.is(':visible')) {
                form.hide();
                text.show();
            } else {
                form.show();
                text.hide();
            }
        }

        function toggleProducts(id) {
            var row = $('#products-cat-' + id);
            if (row.is(':visible')) {
                row.hide();
            } else {
                row.show();
            }
        }

        function openDashboardTab(tabId) {
            tabId = tabId.replace('#', '');
            $('.dashboard-menu .nav-link').removeClass('active');
            $('.tab-pane').removeClass('active show');
            
            var $navLink = $('#' + tabId + '-tab');
            if ($navLink.length === 0) {
                $navLink = $('a[href="#' + tabId + '"]');
            }
            var $pane = $('#' + tabId);
            
            if ($navLink.length > 0) {
                $navLink.addClass('active');
            }
            if ($pane.length > 0) {
                $pane.addClass('active show');
            }
            
            history.replaceState(null, null, '#' + tabId);
        }

        $(document).ready(function() {
            var hash = window.location.hash;
            if (hash) {
                openDashboardTab(hash);
            }

            $('.dashboard-menu .nav-link').on('click', function(e) {
                var href = $(this).attr('href');
                if (href && href.startsWith('#')) {
                    openDashboardTab(href);
                }
            });
        });
    </script>
</body>

</html>