<div>

    {{-- Home Tab --}}

    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

        <section class="home-banner">
            <div class="container">
                <div class="swiper home-banner-swiper">
                    <div class="swiper-wrapper">

                        @foreach ($seller_banner as $banner)

                            <div class="swiper-slide" wire:key="{{ $banner->id }}">
                                <div class="home-bnr-img">
                                    <img src="{{ $banner->image }}">
                                </div>
                            </div>

                        @endforeach

                    </div>
                    <div class="swiper-button-next home-arrow"></div>
                    <div class="swiper-button-prev home-arrow"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>


        @if ($categories->isEmpty())

            <h5 class="text-center mt-5">No Menu found for this seller.</h5>
            
        @else
            @php
                $seller_id = '17';
            @endphp

            <section class="our-menu pb-4">
                <div class="container">
                    <h3 class="fs-24 fw-600 mt-3 mb-4">Our Menu</h3>
                    <div class="our-menu-inner">
                        <div class="swiper our-menu-swiper">
                            <div class="swiper-wrapper">

                                @foreach ($categories as $category)
                                    <div class="swiper-slide" wire:key="{{ $category->CategoryName }}">
                                        <div class="our-menu-sngl">
                                            <img src="{{ $category->Image }}" alt="{{ $category->CategoryName }}">
                                            <h4 class="mb-0">{{ $category->CategoryName }}</h4>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </section>

        @endif


        @if (count($featured_products) > 0)
        
            <section class="featured-item pb-4">
                <div class="container">
                    <h3 class="fs-24 fw-600 mt-3 mb-4">Featured Items</h3>
                    <div class="featured-item-inner d-flex justify-content-between">

                        @foreach ($featured_products as $product)
                            <div class="featured-item-sngl" data-bs-toggle="modal" data-bs-target="#exampleModalCenter1"
                                wire:key="{{ $product->id }}">
                                <div class="featured-item-img">
                                    <img src="{{ $product->Image }}" alt="{{ $product->productName }}">
                                </div>
                                <div class="featured-item-content">
                                    <div class="feature-content-heading d-flex align-items-center">
                                        <h4 class="mb-0">{{ $product->productName }}</h4>
                                    </div>
                                    <div class="feature-content-para">
                                        <p class="fs-12">{!! $product->description !!}</p>
                                    </div>
                                    <div class="price-add-wrap d-flex align-items-center justify-content-between">
                                        <div class="price">
                                            <p class="mb-0">₹{{ $product->product_stock->price }}</p>
                                        </div>
                                        <div class="add-bag d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addProductModal" wire:click="addToCart({{ $product->id }})">
                                            <img src="{{ asset('restaurant-shop/images/shopping-bag.png') }}">
                                            <p class="mb-0">Add</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </section>

        @endif

        {{-- Displaying the Center Seller Banners Here --}}

        <section class="order-now pb-4">
            <div class="container">
                <div class="order-now-inner d-flex justify-content-between">
                    
                    @foreach ($seller_center_banners as $banner)
                        
                        <div class="order-now-sngl">
                            <img src="{{ $banner->image }}">
                        </div>

                    @endforeach                    

                </div>
            </div>
        </section>
        

        @if (count($popular_products) > 0)
            <section class="popular-items pb-4">
                <div class="container">
                    <h3 class="fs-24 fw-600 mt-3 mb-4">Most Popular Items</h3>

                    <div class="popular-items-inner">
                        @foreach ($popular_products as $product)
                            <div class="popular-items-card d-flex mb-3" data-bs-toggle="modal" data-bs-target="#productDetailModal" wire:click="selectProduct({{ $product->id }})" wire:key="{{ $product->id }}">
                                <div class="popular-items-left">
                                    <img src="{{ $product->Image }}" alt="{{ $product->productName }}">
                                </div>

                                <div class="popular-items-rgt">
                                    <div class="popular-items-heading d-flex align-items-center">
                                        <h4 class="mb-0 fs-14 pe-2">{{ $product->productName }}</h4>
                                        <div class="feature-content-i">
                                            <img src="{{ asset('restaurant-shop/images/info.png') }}">
                                        </div>
                                    </div>
                                    <p class="fs-12 mb-0">{!! $product->description !!}</p>
                                    <div class="price-add-wrap d-flex align-items-center justify-content-between">
                                        <div class="price">
                                            <p class="mb-0">₹{{ $product->product_stock->price }}</p>
                                        </div>
                                        <div class="add-bag d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addProductModal" wire:click="addToCart({{ $product->id }})">
                                            <img src="{{ asset('restaurant-shop/images/shopping-bag.png') }}">
                                            <p class="mb-0">Add</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>
        @endif


    </div>

    <!-- Add to Cart Modal -->
    
    <div class="modal fade add-popup" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalTitle" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="add-cart-wrap">
                        @if ($cartProduct)
                            <div class="add-cart-top d-flex">
                                <div class="cart-top-img">
                                    <img src="{{ $cartProduct->Image }}" alt="{{ $cartProduct->productName }}">
                                </div>
                                <div class="cart-top-text">
                                    <h3>{{ $cartProduct->productName }}</h3>
                                    <p>{!! $cartProduct->description !!}</p>
                                    <div class="cart-item-price">
                                        ₹{{ $totalPrice }}
                                    </div>
                                </div>
                            </div>
                        @endif
    
                        <div class="plus-minus-btn d-flex align-items-center">
                            <div class="quantity-txt">
                                <p class="mb-0">Quantity:</p>
                            </div>
                            <div class="qty">
                                <span class="minus" wire:click="decrementQuantity">-</span>
                                <input type="number" class="count" name="qty" value="{{ $quantity }}" wire:model="quantity">
                                <span class="plus" wire:click="incrementQuantity">+</span>
                            </div>
                        </div>
    
                        @if ($addons)
                            <div class="add-ons-sec">
                                <h3>Addons</h3>
                                <div class="add-ons-wrap d-flex">
    
                                    @foreach ($addons as $addon)
                                        <div class="add-ons d-flex" wire:click="toggleAddon('{{ $addon['name'] }}', {{ $addon['price'] }})">
                                            <div class="add-on-image">
                                                <img src="https://cdn-icons-png.flaticon.com/512/288/288851.png">
                                            </div>
                                            <div class="add-ons-txt">
                                                <p>{{ $addon['name'] }}</p>
                                                <div class="add-on-price">
                                                    ₹{{ $addon['price'] }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        @endif
    
                        <div class="customize-taste">
                            <h3>Customise as per your taste</h3>
                            <div class="customise-inner-wrap">
                                <h2>Quantity</h2>
    
                                {{-- repeat --}}
    
                                @foreach ($sizes as $id => $size)

                                    <div class="quantity-options-wrap">
                                        <div class="quantity-opt-left">
                                            <div class="d-flex">
                                                <div class="quantity-opt-left-img">
                                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Veg_symbol.svg/1200px-Veg_symbol.svg.png">
                                                </div>
                                                <div class="quantity-opt-left-txt">
                                                    <p class="mb-0">{{ $size }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="quantity-opt-rgt">
                                            <input type="radio" id="size-{{ $id }}" name="radio-group" value="{{ $id }}" wire:model="selectedSize">
                                        </div>                                        
                                    </div>

                                @endforeach   
                                
                                
    
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <a href="#">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
 
    <!-- product click detail popup -->

    <div class="modal fade prdt-detail" id="productDetailModal" tabindex="-1" role="dialog" aria-labelledby="productDetailModalTitle" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    @if ($selectedProduct)
                        <h5 class="modal-title" id="productDetailModalTitle">{{ $selectedProduct->productName }}</h5>
                    @endif
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($selectedProduct)
                        <div class="prdt-detail-txt">
                            <p>{!! $selectedProduct->description !!}</p>
                            <p>Price: ₹{{ $selectedProduct->product_stock->price }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    

</div>
