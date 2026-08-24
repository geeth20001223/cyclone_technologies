<style>
    /* Equal Height Product Grid & Alignment Fix */
    .product-grid-4 .col-lg-3,
    .product-grid-4 .col-md-4,
    .product-grid-4 .col-sm-6,
    .product-grid-4 .col-6 {
        display: flex !important;
        margin-bottom: 24px !important;
    }

    .product-cart-wrap {
        display: flex !important;
        flex-direction: column !important;
        width: 100% !important;
        height: 100% !important;
        border-radius: 16px !important;
        overflow: hidden !important;
        border: 1px solid #e2e8f0 !important;
        background: #ffffff !important;
        transition: all 0.25s ease-in-out !important;
        position: relative !important;
    }

    .product-cart-wrap:hover {
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08) !important;
        transform: translateY(-4px) !important;
    }

    .product-img-action-wrap {
        position: relative !important;
        width: 100% !important;
        height: 200px !important;
        background-color: #f8fafc !important;
        overflow: hidden !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        padding: 12px !important;
        box-sizing: border-box !important;
    }

    .product-img-zoom, 
    .product-img-zoom a {
        width: 100% !important;
        height: 100% !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }

    .product-img-zoom img {
        max-width: 100% !important;
        max-height: 100% !important;
        width: auto !important;
        height: auto !important;
        object-fit: contain !important;
    }

    .product-img-zoom video {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
    }

    .product-content-wrap {
        display: flex !important;
        flex-direction: column !important;
        flex-grow: 1 !important;
        padding: 16px !important;
        justify-content: space-between !important;
    }

    .product-category {
        font-size: 11px !important;
        font-weight: 700 !important;
        text-transform: uppercase !important;
        color: #94a3b8 !important;
        margin-bottom: 6px !important;
    }

    .product-content-wrap h2 {
        font-size: 13.5px !important;
        font-weight: 700 !important;
        line-height: 1.4 !important;
        height: 38px !important;
        max-height: 38px !important;
        overflow: hidden !important;
        display: -webkit-box !important;
        -webkit-line-clamp: 2 !important;
        -webkit-box-orient: vertical !important;
        margin-bottom: 8px !important;
    }

    .product-content-wrap h2 a {
        color: #1e293b !important;
    }

    .product-content-wrap h2 a:hover {
        color: #2563eb !important;
    }

    .rating-result {
        margin-bottom: 12px !important;
    }

    .product-price-action-row {
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        margin-top: auto !important;
        padding-top: 10px !important;
        border-top: 1px solid #f1f5f9 !important;
    }

    .product-price span {
        font-size: 15px !important;
        font-weight: 800 !important;
        color: #ff6000 !important;
    }

    .product-price span.old-price {
        font-size: 12px !important;
        font-weight: 600 !important;
        color: #94a3b8 !important;
        text-decoration: line-through !important;
        margin-left: 6px !important;
    }
</style>

<section class="product-tabs section-padding position-relative wow fadeIn animated">
    <div class="container">
        <div class="tab-header">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">All</button>
                </li>
                @foreach($categories as $category)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-{{$category->id}}" data-bs-toggle="tab" data-bs-target="#tab-{{$category->id}}" type="button" role="tab" aria-controls="tab-{{$category->id}}" aria-selected="false">{{$category->category_name}}</button>
                    </li>
                @endforeach
            </ul>
            <a href="#" class="view-more d-none d-md-flex">View More<i class="fi-rs-angle-double-small-right"></i></a>
        </div>
        <!--End nav-tabs-->
        <div class="tab-content wow fadeIn animated" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">
                    @foreach ($products as $product)
                        @php
                            $imgFilename = basename($product->image);
                            $imgSrc = asset('products_images/' . $imgFilename);
                        @endphp
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{url('product_details', $product->id)}}">
                                            @if(in_array(strtolower(pathinfo($imgFilename, PATHINFO_EXTENSION)), ['mp4', 'webm', 'ogg', 'mov', 'avi']))
                                                <video class="default-img" src="{{ $imgSrc }}" muted loop autoplay playsinline></video>
                                            @else
                                                <img class="default-img" src="{{ $imgSrc }}" alt="{{ $product->title }}" onerror="this.onerror=null;this.src='/user/assets/imgs/shop/product-1-1.jpg';">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="View Details" href="{{url('product_details', $product->id)}}" class="action-btn hover-up"><i class="fi-rs-eye"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">New</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div>
                                        <div class="product-category">
                                            <a href="#">{{$product->category}}</a>
                                        </div>
                                        <h2><a href="{{url('product_details', $product->id)}}">{{$product->title}}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-price-action-row">
                                        <div class="product-price">
                                            <span>Rs. {{ ltrim($product->discount_price, '$') }}</span>
                                            @if($product->price && $product->price != $product->discount_price)
                                                <span class="old-price">Rs. {{ ltrim($product->price, '$') }}</span>
                                            @endif
                                        </div>
                                        <div class="product-action-1 show" style="position: relative; top: auto; right: auto; transform: none;">
                                            <a href="{{url('product_details', $product->id)}}" aria-label="Add To Cart" class="action-btn hover-up"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!--End product-grid-4-->
            </div>
            @foreach($categories as $category)
                <div class="tab-pane fade" id="tab-{{$category->id}}" role="tabpanel" aria-labelledby="tab-{{$category->id}}">
                    <div class="row product-grid-4">
                        @foreach ($products as $product)
                            @if($product->category == $category->category_name)
                                @php
                                    $imgFilenameCat = basename($product->image);
                                    $imgSrcCategory = asset('products_images/' . $imgFilenameCat);
                                @endphp
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{url('product_details', $product->id)}}">
                                                    @if(in_array(strtolower(pathinfo($imgFilenameCat, PATHINFO_EXTENSION)), ['mp4', 'webm', 'ogg', 'mov', 'avi']))
                                                        <video class="default-img" src="{{ $imgSrcCategory }}" muted loop autoplay playsinline></video>
                                                    @else
                                                        <img class="default-img" src="{{ $imgSrcCategory }}" alt="{{ $product->title }}" onerror="this.onerror=null;this.src='/user/assets/imgs/shop/product-1-1.jpg';">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="View Details" href="{{url('product_details', $product->id)}}" class="action-btn hover-up"><i class="fi-rs-eye"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">New</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div>
                                                <div class="product-category">
                                                    <a href="#">{{$product->category}}</a>
                                                </div>
                                                <h2><a href="{{url('product_details', $product->id)}}">{{$product->title}}</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span>
                                                        <span>90%</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-price-action-row">
                                                <div class="product-price">
                                                    <span>Rs. {{ ltrim($product->discount_price, '$') }}</span>
                                                    @if($product->price && $product->price != $product->discount_price)
                                                        <span class="old-price">Rs. {{ ltrim($product->price, '$') }}</span>
                                                    @endif
                                                </div>
                                                <div class="product-action-1 show" style="position: relative; top: auto; right: auto; transform: none;">
                                                    <a href="{{url('product_details', $product->id)}}" aria-label="Add To Cart" class="action-btn hover-up"><i class="fi-rs-shopping-bag-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <!--End tab-content-->
    </div>
</section>