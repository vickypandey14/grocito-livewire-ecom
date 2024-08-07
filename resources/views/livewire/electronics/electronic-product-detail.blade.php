<div>
    <section class="shop-catg-sec mt-3">
        <div class="shop-catg-sec-inner">
            <div class="row">
                
                <div class="col-md-5">
                    <div class="shop-catg-left d-none d-md-block">
                        <div class="shop-left-slider">
                            <div thumbsSlider="" class="swiper product-swiper">
                                <div class="swiper-wrapper">
                                    @foreach ($images as $image)
                                        <div class="swiper-slide">
                                            <img src="{{ $image }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="swiper product-swiper-right">
                                <div class="swiper-wrapper">
                                    @foreach ($images as $image)
                                        <div class="swiper-slide">
                                            <img src="{{ $image }}">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next prdt-arw-btn">
                                    <img src="{{ asset('electronics-shop/images/arrow-right.svg') }}">
                                </div>
                                <div class="swiper-button-prev prdt-arw-btn">
                                    <img src="{{ asset('electronics-shop/images/arrow-left.svg') }}">
                                </div>
                                <div class="swiper-pagination shop-catg-pagi"></div>
                            </div>    
                        </div>
                    </div>
                    <div class="mobile-product-slider-wrap d-md-none">
                        <div class="mobile-prdt-slick">
                            @foreach ($images as $image)
                                <a href="{{ $image }}" class="prdt-slick-img-wrap" data-toggle="lightbox">
                                    <img src="{{ $image }}">
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                               
                <div class="col-md-7">
                    <div class="shop-catg-right">
                        <div class="shop-catg-right-inner">
                            <div class="shop-right-nav d-flex">
                                <div class="nav-sngl">
                                    <a href="#">Shop</a>
                                    <svg width="16" height="27" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg" class="_39X-Og"><path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#878787" class="DpXnhQ"></path></svg>
                                </div>
                                <div class="nav-sngl">
                                    <a href="{{url()->current()}}" wire:navigate>{{ $product->productName }}</a>
                                </div>
                            </div>

                            <div class="shop-catg-heading-content mt-3">
                                <h4 class="fs-22 fw-500 mb-2">{{ $product->productName }} </h4>
                                <h3 class="fs-20 fw-400">{!! $product->description !!}</h3>
                                <div class="price-wrap mt-2">
                                    <div class="price-wrap-top d-flex align-items-baseline">
                                        <h3 class="fs-22 fw-500 mb-0">₹{{ $product->product_stock->price }}</h3>
                                        <h4 class="mb-0">₹{{ $product->product_stock->mrp }}</h4>
                                        <span class="fs-16 fw-400">{{ $this->calculateDiscount($product->product_stock->price, $product->product_stock->mrp) }}% OFF</span>
                                    </div>
                                    <p class="mb-0">inclusive of all taxes</p>
                                </div>
                            </div>

                            <form>
                                <div class="cart-color-select seclect-color">
                                    <h3 class="fs-20 fw-500 mb-3">Select Color</h3>
                                    <div class="cart-color-select-inner d-flex">
                                        @forelse ($colors as $color)

                                            <a href="#">
                                                <img src="images/list-mobile4.webp">
                                                <br>
                                                <span class="text-center">{{ $color }}</span>
                                            </a>

                                        @empty

                                            <p>No colors available</p>

                                        @endforelse
                                    </div>
                                </div>
                            </form>

                            <div class="add-wishlist-btn d-flex align-items-center">
                                <div class="wishlist-btn d-flex">
                                    <a href="javascript:void(0)">
                                        <i class="fa-solid fa-heart" style="color: #ff0000;"></i>
                                        Wishlist
                                    </a>
                                </div>
                                <div class="add-to-cart-btn d-flex">
                                    <a href="javascript:void(0)" class="d-flex align-items-center">
                                        <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                        Add to cart
                                    </a>
                                </div>
                            </div>
                           
                            <div class="check-pincode">
                                <h3 class="fs-20 fw-500 mb-3">Delivery Options</h3>
                                <div class="pincode-box">
                                    <input type="text" placeholder="Enter pincode" class="pincode-code" value="" name="pincode">
                                    <input type="submit" class="pincode-check pincode-button" value="Check">
                                </div>
                                <div class="pincode-services">
                                    <ul class="pincode-serviceability-list mt-2">
                                        @if ($product->seller->is_cod == 1)
                                            <li class="pincode-serviceabilityItem">
                                                <svg id="prefix__Layer_1" data-name="Layer 1" viewBox="0 0 24 24" class="pincode-serviceabilityIcon">
                                                <defs>
                                                    <mask id="prefix__mask" x="0" y="0" width="24" height="24" maskUnits="userSpaceOnUse">
                                                    <g id="prefix__b">
                                                        <path id="prefix__a" class="prefix__cls-1" d="M0 0h24v24H0z"></path>
                                                    </g>
                                                    </mask>
                                                    <mask id="prefix__mask-2" x="5.17" y="2" width="13.59" height="20" maskUnits="userSpaceOnUse">
                                                    <g id="prefix__d">
                                                        <path id="prefix__c" class="prefix__cls-1" d="M5.17 2h13.59v20H5.17z"></path>
                                                    </g>
                                                    </mask>
                                                    <style>
                                                    .prefix__cls-1,
                                                    .prefix__cls-4 {
                                                        fill: #fff;
                                                        fill-rule: evenodd
                                                    }
        
                                                    .prefix__cls-4 {
                                                        fill: #535766
                                                    }
                                                    </style>
                                                </defs>
                                                <g mask="url(#prefix__mask)">
                                                    <g mask="url(#prefix__mask-2)">
                                                    <path class="prefix__cls-4" d="M17.59 18v2.47a1.17 1.17 0 010 .32 1.13 1.13 0 01-.32 0h-2.76a4.18 4.18 0 01-4-3.48h1.14a.57.57 0 00.57-.57.58.58 0 00-.57-.58H6.84a1.17 1.17 0 01-.45-.05 1.27 1.27 0 010-.44v-3.63-8.5a.51.51 0 01.09-.35.44.44 0 01.33-.08h6.08a1.1 1.1 0 01.31 0 1.31 1.31 0 010 .33v7.15a.59.59 0 00.58.58.58.58 0 00.57-.59V8.91l2.23 2.74.31.42a2.5 2.5 0 01.74 1.57v4.38m1.17-4.36a3.55 3.55 0 00-1-2.3l-.3-.39-3.17-3.89V3.52c0-1-.48-1.5-1.5-1.5H11C9.64 2 8.19 2 6.78 2a1.54 1.54 0 00-1.17.42 1.59 1.59 0 00-.44 1.18V15.72c0 1.18.46 1.64 1.65 1.64h2.47A5.31 5.31 0 0014.51 22h2.74a1.32 1.32 0 001.5-1.5V18v-4.36"></path>
                                                    </g>
                                                    <path class="prefix__cls-4" d="M14.54 12.57c-.71-.76-1.43-1.51-2.17-2.25a1.72 1.72 0 00-1.78-.46 1.54 1.54 0 00-1 1.3 2 2 0 00.64 1.6l2.08 2.15.53.55a3.93 3.93 0 001.08 4 .58.58 0 00.82.05.57.57 0 000-.81c-1-1.15-1.22-2.06-.75-3.14a.55.55 0 00-.11-.63l-.79-.82c-.7-.71-1.39-1.42-2.07-2.14-.27-.28-.36-.46-.33-.66A.36.36 0 0111 11a.6.6 0 01.6.18c.72.73 1.45 1.49 2.14 2.23l.92 1a.58.58 0 00.82 0 .57.57 0 000-.82l-.91-1m-3.94-3.78a.29.29 0 00.29-.28.27.27 0 00-.09-.21L9.35 6.83a1.17 1.17 0 00.52-.36 1.53 1.53 0 00.32-.62h1a.29.29 0 00.27-.31.28.28 0 00-.27-.27h-.86a2.49 2.49 0 000-.48h.87a.29.29 0 100-.58H8.37a.29.29 0 100 .58H9.7a2.56 2.56 0 010 .48H8.37a.29.29 0 000 .58h1.21a.72.72 0 01-.14.24.8.8 0 01-.7.24.3.3 0 00-.28.17.33.33 0 00.06.33l1.9 1.9a.32.32 0 00.21.08"></path>
                                                </g>
                                                </svg>
                                                <h4 class="pincode-serviceabilityTitle">Cash on delivery available</h4>
                                            </li>
                                        @endif
                                        
                                        @if ($product->return_days)
                                            <li class="pincode-serviceabilityItem">
                                                <svg viewBox="0 0 24 24" class="pincode-serviceabilityIcon">
                                                <g fill="#535766">
                                                    <path d="M15.19 8.606V4.3a.625.625 0 00-.622-.625H6.384V.672a.624.624 0 00-.407-.588.62.62 0 00-.687.178L.367 6.048a.628.628 0 000 .812l4.923 5.778a.626.626 0 00.687.182.624.624 0 00.407-.588V9.228h8.184a.62.62 0 00.621-.622zm-1.244-.625H5.762a.625.625 0 00-.621.625v1.938l-3.484-4.09L5.14 2.362V4.3c0 .344.28.625.621.625h8.184v3.056z"></path>
                                                    <path d="M22.708 13.028L17.785 7.25a.616.616 0 00-.687-.178.624.624 0 00-.407.587v3.003H8.507a.625.625 0 00-.622.625v4.304c0 .343.28.625.622.625h8.184v3.003a.624.624 0 00.621.625.626.626 0 00.473-.219l4.923-5.781a.632.632 0 000-.816zm-4.774 4.497v-1.937a.625.625 0 00-.622-.625H9.13v-3.054h8.183a.625.625 0 00.622-.625V9.347l3.484 4.09-3.484 4.088z"></path>
                                                </g>
                                                </svg>
                                                <h4 class="pincode-serviceabilityTitle">Easy {{ $product->return_days }} days return @if ($product->is_replaceable == 1) &amp; exchange available @endif </h4>
                                            </li>
                                        @endif                                    
                                    </ul>
                                </div>
                            </div>

                            <div class="offers-wrap" data-bs-toggle="modal" data-bs-target="#exampleModal-1">
                                <div class="coupans-wrap d-flex align-items-center">
                                    <a href="#" class="d-flex align-items-center">
                                    <div class="coupan-img">
                                        <img src="{{ asset('electronics-shop/images/coupans.png') }}">
                                    </div>
                                    <div class="coupan-content d-flex align-items-center ps-3">
                                        <div class="coupan-content-inner">
                                            <h3 class="fs-18 fw-400 mb-0">All Offers and Coupons</h3>
                                        </div>
                                        <div class="coupan-content-img ps-3">
                                            <img src="{{ asset('electronics-shop/images/rgt-arrow.png') }}">
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>

                            <div class="d-none d-md-block key-feature-dektop mt-4">
                                <div class="key-feat-inner">
                                    <h3 class="fs-20 fw-500 mb-3">Highlights</h3>
                                    <ul>
                                        <li>Brand | {{ $product->brand }}</li>
                                        <li>Weight | {{ $product->product_stock->s_w }}</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="shop-rgt-descrip accordion" id="accordionExample">
                                <h3 class="accordion-header" id="headingOne">
                                    <button class="accordion-button show fs-26 fw-500" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Product Details
                                    </button>
                                </h3>
                                <div class="shop-rgt-descrip-inner accordion-collapse collapse show"aria-labelledby="headingOne" data-bs-parent="#accordionExample" id="collapseOne">
                                    <div class="row pb-3">
                                        <div class="col-md-4 shop-left-descrip">
                                            <p class="mb-0">Brand</p>
                                        </div>
                                        <div class="col-md-8 shop-rgt-descrip">
                                            <p class="mb-0">{{ $product->brand }}</p>
                                        </div>
                                    </div>

                                    <div class="row pb-3">
                                        <div class="col-md-4 shop-left-descrip">
                                            <p class="mb-0">Product Type</p>
                                        </div>
                                        <div class="col-md-8 shop-rgt-descrip">
                                            <p class="mb-0">{{ $product->product_type }}</p>
                                        </div>
                                    </div>

                                    <div class="row pb-3">
                                        <div class="col-md-4 shop-left-descrip">
                                            <p class="mb-0">Category</p>
                                        </div>
                                        <div class="col-md-8 shop-rgt-descrip">
                                            <p class="mb-0">{{ $product->category->CategoryName }}</p>
                                        </div>
                                    </div>

                                    <div class="row pb-3">
                                        <div class="col-md-4 shop-left-descrip">
                                            <p class="mb-0">Weight</p>
                                        </div>
                                        <div class="col-md-8 shop-rgt-descrip">
                                            <p class="mb-0">{{ $product->product_stock->s_w }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="desktop-tab-dtl mt-4 d-none d-md-block">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                  <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">DESCRIPTION</button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">SPECIFICATION</button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">MORE INFO</button>
                                  </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                      <div class="description-tab-wrap">
                                          <p>{!! $product->description !!}</p>
                                      </div>
                                  </div>
                                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                      <div class="specification-tab-wrap">
                                          <h3 class="fs-18 fw-400 mb-3">Specifations</h3>
                                          <div class="key-feat-inner">
                                              <div class="shop-rgt-descrip-inner">
                                                
                                                
                                            </div>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                      <div class="more-info-tab-wrap">
                                          <div class="more-info-btm mt-2">
                                              <div class="more-info-btm-sngl">
                                                  
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                            </div>

                            {{-- Product Details --}}

                            <div class="all-details-wrap d-flex align-items-center justify-content-between  d-md-none"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="all-details-head">
                                    <h3 class="fs-16 fw-400 mb-0">All Details</h3>
                                </div>
                                <div class="all-details-arrow">
                                    <i class="fa-solid fa-angle-right"></i>
                                </div>
                            </div>


                            {{-- Ratings --}}

                            <div class="rating-review-sec">
                                <div class="rating-review-head d-flex justify-content-between align-items-center">
                                    <h3 class="fs-24 fw-500 mb-0">Ratings & Reviews</h3>
                                    <div class="rate-product-btn d-flex"data-bs-toggle="modal" data-bs-target="#exampleModal-3">
                                        <a href="#">Rate Product</a>
                                    </div>
                                </div>     
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="prdt-dtl-sec mt-5">
        <div class="prdt-rgt-dtls-wrap d-flex w-100 align-items-center justify-content-between">
            <div class="prdt-rgt-dtls-sngl d-flex align-items-center">
                <div class="prdt-rgt-dtls-img me-3">
                    <img src="{{ asset('electronics-shop/images/credit-card.svg') }}">
                </div>
                <div class="prdt-rgt-dtls-txt">
                    <p class="mb-0 fs-18">Secure payment</p>
                </div>
            </div>
            <div class="prdt-rgt-dtls-sngl d-flex align-items-center">
                <div class="prdt-rgt-dtls-img me-3">
                    <img src="{{ asset('electronics-shop/images/truck.svg') }}">
                </div>
                <div class="prdt-rgt-dtls-txt">
                    <p class="mb-0 fs-18">Free shipping</p>
                </div>
            </div>

            @if ($product->return_charge == 0 || $product->return_charge === null)
                <div class="prdt-rgt-dtls-sngl d-flex align-items-center">
                    <div class="prdt-rgt-dtls-img me-3">
                        <img src="{{ asset('electronics-shop/images/return.svg')}}">
                    </div>
                    <div class="prdt-rgt-dtls-txt">
                        <p class="mb-0 fs-18">Free Returns</p>
                    </div>
                </div>
            @endif

        </div>
    </section>

    <section class="best-selling mt-4 mb-4">
        <div class="best-selling-inner">
            <h2>Best Selling</h2>
            <div class="swiper best-selling-swiper">
                <div class="swiper-wrapper">
                    @foreach ($bestSellingProducts as $bestProduct)
                        <div class="swiper-slide">
                            <div class="best-selling-single">
                                <div class="best-selling-img">
                                    @php
                                        $bestProductImages = json_decode($bestProduct->Image, true);
                                        $bestProductFirstImage = $bestProductImages[0] ?? $bestProduct->Image;
                                    @endphp
                                    <img src="{{ $bestProductFirstImage }}">
                                    <div class="discout-text">
                                        <span>₹{{ $this->calculateDiscountAmount($bestProduct->product_stock->price, $bestProduct->product_stock->mrp) }} OFF</span>
                                    </div>
                                    <div class="discout-text d-flex align-items-center rating-text">
                                        <span>4.5</span>
                                        <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                    </div>
                                </div>
                                <div class="device-name">
                                    <h3 class="mb-0">{{ $bestProduct->productName }}</h3>
                                    <p>{!! $bestProduct->description !!}</p>
                                </div>
                                <div class="product-price-wrap d-flex align-items-center">
                                    <span>-{{ $this->calculateDiscount($bestProduct->product_stock->price, $bestProduct->product_stock->mrp) }}%</span>
                                    <h3 class="mb-0">₹{{ $bestProduct->product_stock->price }}</h3>
                                    <h4 class="mb-0">₹{{ $bestProduct->product_stock->mrp }}</h4>
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