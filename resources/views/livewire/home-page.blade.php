<div>
    {{-- Banner --}}

    <section class="product-list-banner">
        <div class="product-list-inner">
            <div class="swiper banner-swiper">
                <div class="swiper-wrapper">

                    @foreach($seller_banner as $banner)

                        <div class="swiper-slide" wire:key="{{ $banner->id }}">
                            <div class="product-list-bnr-single" style="background-image: url('{{ $banner->image }}');">
                                <div class="container">
                                    <h4 class="fs-24 fw-500 color-white">T-shirt / Tops</h4>
                                    <h3 class="fs-60 fw-700 color-white">Mad Summer Sale</h3>
                                    <p class="color-white fs-24 fw-600">cool / colorful / comfy</p>
                                    <div class="shop-now-btn d-flex">
                                        <a href="{{ $banner->url }}" wire:navigate.hover>Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    {{-- Product Categories --}}

    @if($categories->isEmpty())

        <h5 class="text-center mt-5">No categories found for this seller.</h5>
        
    @else

        @php
            $seller_id = '1';
        @endphp

        <section class="trending-catg-sec pt-3 mt-5 mb-5">
            <div class="container">
                <h3 class="fs-30 f2-600 mb-5 text-center">Trending Categories</h3>
                <div class="trending-catg-inner d-flex justify-content-between flex-wrap">
                    @foreach ($categories as $category)

                        <div class="trending-catg-sngl" wire:key="{{ $category->CategoryName }}">
                            <a href="{{ route('list-products-by-category', ['seller_id' => $seller_id, 'category_id' => $category->id]) }}" wire:navigate.hover>
                                <img src="{{ $category->Image }}" alt="{{ $category->CategoryName }}">
                                <p class="mb-0 mt-2">{{ $category->CategoryName }}</p>
                            </a>
                        </div>

                    @endforeach
                </div>
            </div>
        </section>

    @endif
        
    {{-- New Arrival --}}
    
    <section class="new-arrival-sec pt-3">
        <div class="container">
            <h3 class="fs-30 fw-600 text-center mb-2">New Arrival</h3>
            <div class="new-arrival-inner d-flex justify-content-between flex-wrap">
                <div class="swiper new-arrival-swiper">
                    <div class="swiper-wrapper">

                        @foreach ($new_arrival_products as $new_arrival_product)

                            <div class="swiper-slide" wire:key="{{ $new_arrival_product->productName }}">
                                <div class="bestseller-single-card">
                                    <div class="bestseller-img position-relative overflow-hidden">
                                        <img src="{{ $new_arrival_product->Image }}" alt="{{ $new_arrival_product->productName }}">
                                        <div class="prd-icn-wrap">
                                            <a href="javascript:void(0)" class="wishlist-icn position-relative" wire:click="toggleWishlist({{ $new_arrival_product->id }})">
                                                <img src="{{ asset('shop/images/heart.png') }}" class="heart-grey {{ in_array($new_arrival_product->id, $wishlist) ? 'd-none' : '' }}" alt="heart grey">
                                                <img src="{{ asset('shop/images/heart-fill.png') }}" class="heart-fill {{ in_array($new_arrival_product->id, $wishlist) ? '' : 'd-none' }}" alt="heart fill">
                                            </a>
                                            <a href="javascript:void(0)" class="share-icn mt-2">
                                                <img src="{{ asset('shop/images/share.png') }}" alt="share icon" class="share-icn">
                                            </a>
                                        </div>
                                        <div class="add-cart-btn" data-bs-toggle="modal" data-bs-target="#exampleModal-1" data-bs-toggle="modal" data-bs-target="#exampleModal-1">
                                            <a href="javascript:void(0)" class="d-flex justify-content-center">
                                                <p class="mb-0 pe-2 fs-14">Add To Cart</p>
                                                <img src="{{ asset('shop/images/cart-blue.png') }}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="bestseller-content">
                                        <a href="{{ route('product-details', ['productId' => $new_arrival_product->id]) }}">
                                            <h3>{{ $new_arrival_product->productName }}</h3>
                                        </a>
                                        <p>{{ $new_arrival_product->category->CategoryName }}</p>
                                        <div class="rating-container fs-12 fw-600 d-flex align-items-center">
                                            <span>4.3</span>
                                            <img src="{{ asset('shop/images/star.png') }}">
                                        </div>
                                        <div class="price-discount-wrap d-flex align-items-center">
                                            <h4 class="fs-14 fw-500 mb-0">₹{{ $new_arrival_product->product_stock->price }}</h4>
                                            <h5 class="mb-0">₹{{ $new_arrival_product->product_stock->mrp }}</h5>
                                            <span class="mb-0">({{ $this->calculateDiscount($new_arrival_product->product_stock->price, $new_arrival_product->product_stock->mrp) }}% OFF)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        @endforeach

                    </div>
                    <div class="swiper-button-next prdt-arw-btn">
                        <img src="{{ asset('shop/images/arrow-right.svg') }}">
                    </div>
                    <div class="swiper-button-prev prdt-arw-btn">
                        <img src="{{ asset('shop/images/arrow-left.svg') }}">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Big Saving Zone --}}

    <section class="big-save-zone pb-4 mt-5">
        <div class="container">
            <h3 class="fs-30 fw-600 text-center mb-5">Big Saving Zone</h3>
            <div class="big-save-zone-inner">
                <div class="row">
                    <div class="col-md-4">
                        <div class="save-zone-sngl" style="background-image: url(./shop/images/save-zone-1.png);">
                            <div class="save-zone-sngl-content text-left">
                                <h3 class="fs-28 fw-600 color-white">Hawaiian Shirts</h3>
                                <h4 class="fs-14 fw-500 color-white">Dress up in summer vibe</h4>
                                <p class="fs-18 fw-600 color-white">UPTO 50% OFF</p>
                                <div class="arrow-img left-img"><img src="{{ asset('shop/images/arrow.png') }}"></div>
                                <div class="shops-now-btn d-flex pt-4 mt-4">
                                    <a href="#">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="save-zone-sngl" style="background-image: url(./shop/images/save-zone-2.png);">
                            <div class="save-zone-sngl-content text-right pe-3">
                                <h3 class="fs-28 fw-600 color-white">Printed T-Shirt</h3>
                                <h4 class="fs-14 fw-500 color-white">New Designs Every Week</h4>
                                <p class="fs-18 fw-600 color-white">UPTO 40% OFF</p>
                                <div class="arrow-img"><img src="{{ asset('shop/images/arrow.png') }}"></div>
                                <div class="shops-now-btn d-flex pt-4 mt-4 justify-content-end">
                                    <a href="#">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="save-zone-sngl" style="background-image: url(./shop/images/save-zone-3.png);">
                            <div class="save-zone-sngl-content text-right pe-3">
                                <h3 class="fs-28 fw-600 color-white">Cargo Joggers</h3>
                                <h4 class="fs-14 fw-500 color-white">Move with style & comfort</h4>
                                <p class="fs-18 fw-600 color-white">UPTO 50% OFF</p>
                                <div class="arrow-img"><img src="{{ asset('shop/images/arrow.png') }}"></div>
                                <div class="shops-now-btn d-flex pt-4 mt-4 justify-content-end">
                                    <a href="#">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4 mb-4">

                    <div class="col-md-6">
                        <div class="save-zone-sngl" style="background-image: url(./shop/images/save-zone-4.png);">
                            <div class="save-zone-sngl-content text-right pe-3">
                                <h3 class="fs-28 fw-600 color-white">Urban Shirts</h3>
                                <h4 class="fs-14 fw-500 color-white">Live In Confort</h4>
                                <p class="fs-18 fw-600 color-white">FLAT 60% OFF</p>
                                <div class="arrow-img"><img src="{{ asset('shop/images/arrow.png') }}"></div>
                                <div class="shops-now-btn d-flex pt-4 mt-4 justify-content-end">
                                    <a href="#">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="save-zone-sngl" style="background-image: url(./shop/images/save-zone-5.png);">
                            <div class="save-zone-sngl-content text-right pe-3">
                                <h3 class="fs-28 fw-600 color-white">Oversized T-Shirts</h3>
                                <h4 class="fs-14 fw-500 color-white">Street Style Icon</h4>
                                <p class="fs-18 fw-600 color-white">FLAT 60% OFF</p>
                                <div class="arrow-img"><img src="{{ asset('shop/images/arrow.png') }}"></div>
                                <div class="shops-now-btn d-flex pt-4 mt-4 justify-content-end">
                                    <a href="#">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Mens Best Seller --}}

    <section class="mens-bestseller mb-5 mt-5">
        <div class="container">
            <h3 class="text-center mb-2">Men’s Best Seller</h3>
            <div class="mens-bestseller-inner">
                <div class="swiper mens-swiper">
                    <div class="swiper-wrapper">

                        @foreach ($men_best_selling_products as $product)
                            <div class="swiper-slide">
                                <div class="bestseller-single-card">
                                    <div class="bestseller-img position-relative overflow-hidden">
                                        <img src="{{ $product->Image }}" alt="{{ $product->productName }}">
                                        <div class="prd-icn-wrap">
                                            <a href="javascript:void(0)" class="wishlist-icn position-relative" wire:click="toggleWishlist({{ $product->id }})">
                                                <img src="{{ asset('shop/images/heart.png') }}" class="heart-grey {{ in_array($product->id, $wishlist) ? 'd-none' : '' }}" alt="heart grey">
                                                <img src="{{ asset('shop/images/heart-fill.png') }}" class="heart-fill {{ in_array($product->id, $wishlist) ? '' : 'd-none' }}" alt="heart fill">
                                            </a>
                                            <a href="javascript:void(0)" class="share-icn mt-2">
                                                <img src="{{ asset('shop/images/share.png') }}" alt="" class="share-icn">
                                            </a>
                                        </div>
                                        <div class="add-cart-btn" data-bs-toggle="modal" data-bs-target="#exampleModal-1">
                                            <a href="javascript:void(0)" class="d-flex justify-content-center">
                                                <p class="mb-0 pe-2 fs-14">Add To Cart</p>
                                                <img src="{{ asset('shop/images/cart-blue.png') }}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="bestseller-content">
                                        <a href="{{ route('product-details', ['productId' => $product->id]) }}">
                                            <h3>{{ $product->productName }}</h3>
                                        </a>
                                        <p>{{ $product->category->CategoryName }}</p>
                                        <div class="rating-container fs-12 fw-600 d-flex align-items-center">
                                            <span>4.3</span>
                                            <img src="{{ asset('shop/images/star.png') }}">
                                        </div>
                                        <div class="price-discount-wrap d-flex align-items-center">
                                            <h4 class="fs-14 fw-500 mb-0">₹{{ $product->product_stock->price }}</h4>
                                            <h5 class="mb-0">₹{{ $product->product_stock->mrp }}</h5>
                                            <span class="mb-0">({{ $this->calculateDiscount($product->product_stock->price, $product->product_stock->mrp) }}% OFF)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="swiper-button-next prdt-arw-btn">
                        <img src="{{ asset('shop/images/arrow-right.svg') }}">
                    </div>
                    <div class="swiper-button-prev prdt-arw-btn">
                        <img src="{{ asset('shop/images/arrow-left.svg') }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Kids Best Seller --}}

    <section class="kids-bestseller mb-5 pt-4">
        <div class="container">
            <h3 class="text-center mb-2">Kid’s  Best Seller</h3>
            <div class="kids-bestseller-inner">
                <div class="swiper kids-swiper">
                    <div class="swiper-wrapper">

                        @foreach ($kids_best_selling_products as $product)
                            <div class="swiper-slide">
                                <div class="bestseller-single-card">
                                    <div class="bestseller-img position-relative overflow-hidden">
                                        <img src="{{ $product->Image }}" alt="{{ $product->productName }}">
                                        <div class="prd-icn-wrap">
                                            <a href="javascript:void(0)" class="wishlist-icn position-relative" wire:click="toggleWishlist({{ $product->id }})">
                                                <img src="{{ asset('shop/images/heart.png') }}" class="heart-grey {{ in_array($product->id, $wishlist) ? 'd-none' : '' }}" alt="heart grey">
                                                <img src="{{ asset('shop/images/heart-fill.png') }}" class="heart-fill {{ in_array($product->id, $wishlist) ? '' : 'd-none' }}" alt="heart fill">
                                            </a>
                                            <a href="javascript:void(0)" class="share-icn mt-2">
                                                <img src="{{ asset('shop/images/share.png') }}" alt="" class="share-icn">
                                            </a>
                                        </div>
                                        <div class="add-cart-btn" data-bs-toggle="modal" data-bs-target="#exampleModal-1">
                                            <a href="javascript:void(0)" class="d-flex justify-content-center">
                                                <p class="mb-0 pe-2 fs-14">Add To Cart</p>
                                                <img src="{{ asset('shop/images/cart-blue.png') }}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="bestseller-content">
                                        <a href="{{ route('product-details', ['productId' => $product->id]) }}">
                                            <h3>{{ $product->productName }}</h3>
                                        </a>
                                        <p>{{ $product->category->CategoryName }}</p>
                                        <div class="rating-container fs-12 fw-600 d-flex align-items-center">
                                            <span>4.3</span>
                                            <img src="{{ asset('shop/images/star.png') }}">
                                        </div>
                                        <div class="price-discount-wrap d-flex align-items-center">
                                            <h4 class="fs-14 fw-500 mb-0">₹{{ $product->product_stock->price }}</h4>
                                            <h5 class="mb-0">₹{{ $product->product_stock->mrp }}</h5>
                                            <span class="mb-0">({{ $this->calculateDiscount($product->product_stock->price, $product->product_stock->mrp) }}% OFF)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="swiper-button-next prdt-arw-btn">
                        <img src="{{ asset('shop/images/arrow-right.svg') }}">
                    </div>
                    <div class="swiper-button-prev prdt-arw-btn">
                        <img src="{{ asset('shop/images/arrow-left.svg') }}">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Women Best Seller --}}

    <section class="women-bestseller mb-4 pt-4">
        <div class="container">
            <h3 class="text-center mb-2">Women’s  Best Seller</h3>
            <div class="women-bestseller-inner">
                <div class="swiper women-swiper">
                    <div class="swiper-wrapper">
                        
                        @foreach ($womens_best_selling_products as $product)

                            <div class="swiper-slide">
                                <div class="bestseller-single-card">
                                    <div class="bestseller-img position-relative overflow-hidden">
                                        <img src="{{ $product->Image }}" alt="{{ $product->productName }}">
                                        <div class="prd-icn-wrap">
                                            <a href="javascript:void(0)" class="wishlist-icn position-relative" wire:click="toggleWishlist({{ $product->id }})">
                                                <img src="{{ asset('shop/images/heart.png') }}" class="heart-grey {{ in_array($product->id, $wishlist) ? 'd-none' : '' }}" alt="heart grey">
                                                <img src="{{ asset('shop/images/heart-fill.png') }}" class="heart-fill {{ in_array($product->id, $wishlist) ? '' : 'd-none' }}" alt="heart fill">
                                            </a>
                                            <a href="javascript:void(0)" class="share-icn mt-2">
                                                <img src="{{ asset('shop/images/share.png') }}" alt="" class="share-icn">
                                            </a>
                                        </div>
                                        <div class="add-cart-btn" data-bs-toggle="modal" data-bs-target="#exampleModal-1">
                                            <a href="javascript:void(0)" class="d-flex justify-content-center">
                                                <p class="mb-0 pe-2 fs-14">Add To Cart</p>
                                                <img src="{{ asset('shop/images/cart-blue.png') }}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="bestseller-content">
                                        <a href="{{ route('product-details', ['productId' => $product->id]) }}" wire:navigate>
                                            <h3>{{ $product->productName }}</h3>
                                        </a>
                                        <p>{{ $product->category->CategoryName }}</p>
                                        <div class="rating-container fs-12 fw-600 d-flex align-items-center">
                                            <span>4.3</span>
                                            <img src="{{ asset('shop/images/star.png') }}">
                                        </div>
                                        <div class="price-discount-wrap d-flex align-items-center">
                                            <h4 class="fs-14 fw-500 mb-0">₹{{ $product->product_stock->price }}</h4>
                                            <h5 class="mb-0">₹{{ $product->product_stock->mrp }}</h5>
                                            <span class="mb-0">({{ $this->calculateDiscount($product->product_stock->price, $product->product_stock->mrp) }}% OFF)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                    <div class="swiper-button-next prdt-arw-btn">
                        <img src="{{ asset('shop/images/arrow-right.svg') }}">
                    </div>
                    <div class="swiper-button-prev prdt-arw-btn">
                        <img src="{{ asset('shop/images/arrow-left.svg') }}">
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
