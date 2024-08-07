<div>
    {{-- Banner --}}

    <section class="home-page-banner mt-4">
        <div class="home-bnr-inner">
            <div class="swiper home-banner-swiper">
                <div class="swiper-wrapper">

                    @foreach($seller_banner as $banner)

                        <div class="swiper-slide">
                            <div class="home-bnr-img">
                                <img src="{{ $banner->image }}">
                            </div>
                        </div>

                    @endforeach

                </div>
                <div class="swiper-button-next home-arrow">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="swiper-button-prev home-arrow">
                    <i class="fa-solid fa-angle-left"></i>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    {{-- Categories --}}

    @if($categories->isEmpty())

        <h5 class="text-center mt-5">No categories found for this seller.</h5>
        
    @else

        @php
            $seller_id = '16';
        @endphp

        <section class="our-category mt-5">
            <div class="our-category-inner">

                @foreach ($categories as $category)
                    
                    <a href="{{ route('electronics-products-by-category', ['seller_id' => $seller_id, 'category_id' => $category->id]) }}" class="our-ctg-sngl-wrap" wire:navigate>
                        <div class="our-category-sngl">
                            <div class="our-category-img">
                                <img src="{{ $category->Image }}">
                            </div>
                            <div class="our-category-txt">
                                <p>{{ $category->CategoryName }}</p>
                            </div>
                        </div>
                    </a>

                @endforeach

            </div>
        </section>

    @endif

    {{-- Best Selling --}}

    <section class="best-selling mt-5">
        <div class="best-selling-inner">
            <h2>Best Selling</h2>
            <div class="swiper best-selling-swiper mt-3">
                <div class="swiper-wrapper">

                    @foreach ($best_selling_products as $product)
                    
                        <div class="swiper-slide">
                            <div class="best-selling-single">
                                <div class="best-selling-img">
                                    @php
                                        $images = json_decode($product->Image, true);
                                        $firstImage = $images[0] ?? $product->Image;
                                    @endphp
                                        
                                    <img src="{{ $firstImage }}" alt="{{ $product->productName }}">
                                    <div class="discout-text">
                                        <span>₹{{ $this->calculateDiscountAmount($product->product_stock->price, $product->product_stock->mrp) }} OFF</span>
                                    </div>
                                    <div class="discout-text d-flex align-items-center rating-text">
                                        <span>4.5</span>
                                        <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                    </div>
                                </div>
                                <div class="device-name mt-3">
                                    <a href="{{ route('electronic-product-details', ['seller_id' => $seller_id, 'productId' => $product->id]) }}" wire:navigate>
                                        <h3 class="mb-0">{{ $product->productName }}</h3>
                                    </a>
                                    <p>{!! $product->description !!}</p>
                                </div>
                                <div class="product-price-wrap d-flex align-items-center">
                                    <span>-{{ $this->calculateDiscount($product->product_stock->price, $product->product_stock->mrp) }}% OFF</span>
                                    <h3 class="mb-0">₹{{ $product->product_stock->price }}</h3>
                                    <h4 class="mb-0">₹{{ $product->product_stock->mrp }}</h4>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
                <div class="swiper-button-next prdt-arw-btn">
                    <img src="{{ asset('electronics-shop/images/arrow-right.svg') }}">
                </div>
                <div class="swiper-button-prev prdt-arw-btn">
                    <img src="{{ asset('electronics-shop/images/arrow-left.svg') }}">
                </div>
            </div>
        </div>
    </section>

    {{-- Trending Products --}}

    <section class="best-selling mt-5 mb-4">
        <div class="best-selling-inner">
            <h2>Trending Products</h2>
            <div class="swiper best-selling-swiper mt-3">
                <div class="swiper-wrapper">

                    @foreach ($trending_products as $product)
                    
                        <div class="swiper-slide">
                            <div class="best-selling-single">
                                <div class="best-selling-img">
                                    @php
                                        $images = json_decode($product->Image, true);
                                        $firstImage = $images[0] ?? $product->Image;
                                    @endphp
                                        
                                    <img src="{{ $firstImage }}" alt="{{ $product->productName }}">
                                    <div class="discout-text">
                                        <span>₹{{ $this->calculateDiscountAmount($product->product_stock->price, $product->product_stock->mrp) }} OFF</span>
                                    </div>
                                    <div class="discout-text d-flex align-items-center rating-text">
                                        <span>4.5</span>
                                        <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                    </div>
                                </div>
                                <div class="device-name mt-3">
                                    <a href="{{ route('electronic-product-details', ['seller_id' => $seller_id, 'productId' => $product->id]) }}" wire:navigate>
                                        <h3 class="mb-0">{{ $product->productName }}</h3>
                                    </a>
                                    <p>{!! $product->description !!}</p>
                                </div>
                                <div class="product-price-wrap d-flex align-items-center">
                                    <span>-{{ $this->calculateDiscount($product->product_stock->price, $product->product_stock->mrp) }}% OFF</span>
                                    <h3 class="mb-0">₹{{ $product->product_stock->price }}</h3>
                                    <h4 class="mb-0">₹{{ $product->product_stock->mrp }}</h4>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
                <div class="swiper-button-next prdt-arw-btn">
                    <img src="{{ asset('electronics-shop/images/arrow-right.svg') }}">
                </div>
                <div class="swiper-button-prev prdt-arw-btn">
                    <img src="{{ asset('electronics-shop/images/arrow-left.svg') }}">
                </div>
            </div>
        </div>
    </section>

</div>
