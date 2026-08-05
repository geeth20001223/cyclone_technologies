<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>CYCLONE TECHNOLOGIES | Edit Product</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/user/assets/imgs/theme/favicon.ico">
    <link rel="stylesheet" href="/user/assets/css/main.css">
    <link rel="stylesheet" href="/user/assets/css/custom.css">
</head>

<body>
    @include('user.header')
    @include('user.mobile_header')    
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{url('/home')}}" rel="nofollow">Home</a>                    
                    <span></span> <a href="{{route('user.account')}}">My Account</a>
                    <span></span> Edit Product
                </div>
            </div>
        </div>
        <section class="pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-auto">
                        <div class="card">
                            <div class="card-header">
                                <h5>Edit Listed Product</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.update_product', $product->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-3">
                                            <label>Product Title <span class="required">*</span></label>
                                            <input required class="form-control square" name="title" type="text" value="{{ $product->title }}">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label>Category <span class="required">*</span></label>
                                            <select required class="form-control square" name="category">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->category_name }}" {{ $product->category == $category->category_name ? 'selected' : '' }}>
                                                        {{ $category->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 mb-3">
                                            <label>Price ($) <span class="required">*</span></label>
                                            <input required class="form-control square" name="price" type="number" step="0.01" min="0" value="{{ $product->price }}">
                                        </div>
                                        <div class="form-group col-md-4 mb-3">
                                            <label>Discount Price ($) <span class="required">*</span></label>
                                            <input required class="form-control square" name="discount_price" type="number" step="0.01" min="0" value="{{ $product->discount_price }}">
                                        </div>
                                        <div class="form-group col-md-4 mb-3">
                                            <label>Quantity <span class="required">*</span></label>
                                            <input required class="form-control square" name="quantity" type="number" min="1" value="{{ $product->quantity }}">
                                        </div>
                                        
                                        <h6 class="mb-3 mt-4 text-brand">Specifications</h6>
                                        <div class="form-group col-md-4 mb-3">
                                            <label>RAM</label>
                                            <input class="form-control square" name="ram" type="text" value="{{ $product->ram }}">
                                        </div>
                                        <div class="form-group col-md-4 mb-3">
                                            <label>SSD Capacity</label>
                                            <input class="form-control square" name="ssd_capacity" type="text" value="{{ $product->ssd_capacity }}">
                                        </div>
                                        <div class="form-group col-md-4 mb-3">
                                            <label>Processor</label>
                                            <input class="form-control square" name="processor" type="text" value="{{ $product->processor }}">
                                        </div>
                                        <div class="form-group col-md-3 mb-3">
                                            <label>Processor Gen</label>
                                            <input class="form-control square" name="processor_generation" type="text" value="{{ $product->processor_generation }}">
                                        </div>
                                        <div class="form-group col-md-3 mb-3">
                                            <label>Processor Type</label>
                                            <input class="form-control square" name="processor_type" type="text" value="{{ $product->processor_type }}">
                                        </div>
                                        <div class="form-group col-md-3 mb-3">
                                            <label>Processor Speed</label>
                                            <input class="form-control square" name="processor_speed" type="text" value="{{ $product->processor_speed }}">
                                        </div>
                                        <div class="form-group col-md-3 mb-3">
                                            <label>OS</label>
                                            <input class="form-control square" name="operating_system" type="text" value="{{ $product->operating_system }}">
                                        </div>
                                        <div class="form-group col-md-4 mb-3">
                                            <label>Screen Size</label>
                                            <input class="form-control square" name="screen_size" type="text" value="{{ $product->screen_size }}">
                                        </div>
                                        <div class="form-group col-md-4 mb-3">
                                            <label>Resolution</label>
                                            <input class="form-control square" name="screen_resolution" type="text" value="{{ $product->screen_resolution }}">
                                        </div>
                                        <div class="form-group col-md-4 mb-3">
                                            <label>Refresh Rate</label>
                                            <input class="form-control square" name="screen_refresh_rate" type="text" value="{{ $product->screen_refresh_rate }}">
                                        </div>
                                        <div class="form-group col-md-3 mb-3">
                                            <label>Graphics Type</label>
                                            <input class="form-control square" name="graphics_type" type="text" value="{{ $product->graphics_type }}">
                                        </div>
                                        <div class="form-group col-md-3 mb-3">
                                            <label>GPU Memory</label>
                                            <input class="form-control square" name="graphics_card_memory" type="text" value="{{ $product->graphics_card_memory }}">
                                        </div>
                                        <div class="form-group col-md-3 mb-3">
                                            <label>Weight</label>
                                            <input class="form-control square" name="device_weight" type="text" value="{{ $product->device_weight }}">
                                        </div>
                                        <div class="form-group col-md-3 mb-3">
                                            <label>Color</label>
                                            <input class="form-control square" name="color" type="text" value="{{ $product->color }}">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label>Keyboard</label>
                                            <input class="form-control square" name="keyboard" type="text" value="{{ $product->keyboard }}">
                                        </div>
                                        
                                        <div class="form-group col-md-6 mb-3">
                                            <label>Product Image</label>
                                            <input class="form-control square" id="image" name="image" type="file">
                                            @if(in_array(strtolower(pathinfo($product->image, PATHINFO_EXTENSION)), ['mp4', 'webm', 'ogg', 'mov', 'avi']))
                                                <video id="showImage" style="width: 100px; margin-top: 10px; border-radius: 5px;" src="/products_images/{{ $product->image }}" muted controls></video>
                                            @else
                                                <img id="showImage" style="width: 100px; margin-top: 10px; border-radius: 5px;" src="/products_images/{{ $product->image }}" alt="preview">
                                            @endif
                                        </div>
                                        
                                        <div class="col-md-12 mt-4">
                                            <button type="submit" class="btn btn-fill-out submit">Update Product</button>
                                            <a href="{{ route('user.account') }}" class="btn btn-fill-out btn-secondary ml-2">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('user.footer')    
    <!-- Vendor JS-->
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
    <!-- Template  JS -->
    <script src="/user/assets/js/main.js?v=3.3"></script>
    <script src="/user/assets/js/shop.js?v=3.3"></script>
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
    </script>
</body>

</html>
