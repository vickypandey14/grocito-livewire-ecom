<div>
    
<section class="shop-catg-sec mt-3">
    <div class="shop-catg-sec-inner">
        <div class="row">

            <div class="col-md-5">
                <div class="shop-catg-left d-none d-md-block">
                    <div class="shop-left-slider">
                        <div thumbsSlider="" class="swiper product-swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ $product->Image }}" alt="{{ $product->productName }}">
                                </div>
                            </div>
                        </div>
                        <div class="swiper product-swiper-right">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ $product->Image }}" alt="{{ $product->productName }}">
                                </div>
                            </div>
                            <div class="swiper-button-next prdt-arw-btn">
                                <img src="{{ asset('shop/images/arrow-right.svg') }}">
                            </div>
                            <div class="swiper-button-prev prdt-arw-btn">
                                <img src="{{ asset('shop/images/arrow-left.svg') }}">
                            </div>
                            <div class="swiper-pagination shop-catg-pagi"></div>
                        </div>
                    </div>
                </div>
            
                <div class="mobile-product-slider-wrap d-md-none">
                    <div class="mobile-prdt-slick">
                        <a href="{{ $product->Image }}" class="prdt-slick-img-wrap" data-toggle="lightbox">
                            <img src="{{ $product->Image }}" alt="{{ $product->productName }}">
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-7">
                <div class="shop-catg-right">
                    <div class="shop-catg-right-inner">
                        <div class="shop-right-nav d-flex">
                            <div class="nav-sngl">
                                <a href="{{ route('index', 1) }}" wire:navigate>Shop</a>
                                <svg width="16" height="27" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg" class="_39X-Og"><path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#878787" class="DpXnhQ"></path></svg>
                            </div>
                            <div class="nav-sngl">
                                @php
                                    $seller_id = '1';
                                @endphp

                                <a href="{{ route('list-products-by-category', ['seller_id' => $seller_id, 'category_id' => $product->category->id]) }}" wire:navigate>{{ $product->category->CategoryName ?? 'Category' }}</a>
                                <svg width="16" height="27" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg" class="_39X-Og"><path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#878787" class="DpXnhQ"></path></svg>
                            </div>
                            <div class="nav-sngl">
                                <a href="{{url()->current()}}" wire:navigate>{{ $product->productName }}</a>
                            </div>
                        </div>
                        <div class="shop-catg-heading-content mt-2">
                            <h4 class="fs-22 fw-500 mb-2">{{ $product->brand }} </h4>
                            <h3 class="fs-20 fw-400">{{ $product->productName }}</h3>

                            <div class="price-wrap mt-2">
                                <div class="price-wrap-top d-flex align-items-baseline">
                                    <h3 class="fs-22 fw-500 mb-0">₹{{ $product->product_stock->price }}</h3>
                                    <h4 class="mb-0">₹{{ $product->product_stock->mrp }}</h4>
                                    <span class="fs-16 fw-400">({{ $this->calculateDiscount($product->product_stock->price, $product->product_stock->mrp) }}% OFF)</span>
                                </div>
                                <p class="mb-0">inclusive of all taxes</p>
                            </div>
                        </div>
                        
                        <form>
                            <div class="product-size-wrap">
                                <h3 class="fs-20 fw-500 mb-3">Select Size</h3>
                                <div class="custom-radios d-flex">

                                    <div>
                                        <input type="radio" id="size-{{ $product->product_stock->s_w }}" name="size" value="{{ $product->product_stock->s_w }}" checked>
                                        <label for="size-{{ $product->product_stock->s_w }}">
                                          <span class="prdt-size-crcl" style="text-transform: uppercase;">{{ $product->product_stock->s_w }}</span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </form>
                        <div class="add-wishlist-btn d-flex align-items-center">
                            <div class="wishlist-btn d-flex">
                                <a href="javascript:void(0)">
                                    Wishlist
                                </a>
                            </div>
                            <div class="add-to-cart-btn d-flex">
                                <a href="javascript:void(0)" class="d-flex align-items-center">
                                    <img src="{{ asset('shop/images/cart-white.svg') }}" class="me-2">
                                    Add to cart
                                </a>
                            </div>
                        </div>

                        <div class="check-pincode">
                            <h3 class="fs-20 fw-500 mb-3">Delivery Options</h3>
                            
                            <div class="pincode-box">
                                <input type="number" placeholder="Enter pincode" class="pincode-code" name="pincode">
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
                                    <img src="{{ asset('shop/images/coupans.png')}}">
                                </div>
                                <div class="coupan-content d-flex align-items-center ps-3">
                                    <div class="coupan-content-inner">
                                        <h3 class="fs-18 fw-400 mb-0">All Offers and Coupons</h3>
                                    </div>
                                    <div class="coupan-content-img ps-3">
                                        <img src="{{ asset('shop/images/rgt-arrow.png') }}">
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>

                        <div class="d-none d-md-block key-feature-dektop mt-4">
                            <div class="key-feat-inner">
                                <h3 class="fs-20 fw-500 mb-3">Highlights</h3>
                              <ul>
                                  <li>Stock Left: {{ $product->product_stock->quantity }}</li>
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
                                        <p class="mb-0">Type</p>
                                    </div>
                                    <div class="col-md-8 shop-rgt-descrip">
                                        <p class="mb-0">{{ $product->product_type }}</p>
                                    </div>
                                </div>

                                <div class="row pb-3">
                                    <div class="col-md-4 shop-left-descrip">
                                        <p class="mb-0">Sizes</p>
                                    </div>
                                    <div class="col-md-8 shop-rgt-descrip">
                                        <p class="mb-0" style="text-transform: uppercase;">{{ $product->product_stock->s_w }}</p>
                                    </div>
                                </div>

                                <div class="row pb-3">
                                    <div class="col-md-4 shop-left-descrip">
                                        <p class="mb-0">Ideal For</p>
                                    </div>
                                    <div class="col-md-8 shop-rgt-descrip">
                                        <p class="mb-0" style="text-transform: uppercase;">{{ $product->product_type }}</p>
                                    </div>
                                </div>

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
                                        <p class="mb-0">Category</p>
                                    </div>
                                    <div class="col-md-8 shop-rgt-descrip">
                                        <p class="mb-0">{{ $product->category->CategoryName }}</p>
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

                                          <div class="more-info-btm-sngl mb-3">
                                              <h3 class="fs-16 fw-500">Seller Details</h3>
                                              <ul>
                                                  <li>Location: {{ $product->seller->location }}</li>
                                                  <li>Store Name: {{ $product->seller->storeName }}</li>
                                              </ul>
                                          </div>

                                      </div>
                                  </div>
                              </div>
                            </div>
                        </div>

                        <div class="all-details-wrap d-flex align-items-center justify-content-between  d-md-none"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <div class="all-details-head">
                                <h3 class="fs-16 fw-400 mb-0">All Details</h3>
                            </div>
                            <div class="all-details-arrow">
                                <img src="{{ asset('shop/images/right-arrow.png')}}">
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
                <img src="{{ asset('shop/images/credit-card.svg')}}">
            </div>
            <div class="prdt-rgt-dtls-txt">
                <p class="mb-0 fs-18">Secure payment</p>
            </div>
        </div>

        <div class="prdt-rgt-dtls-sngl d-flex align-items-center">
            <div class="prdt-rgt-dtls-img me-3">
                <img src="{{ asset('shop/images/cloth.svg')}}">
            </div>
            <div class="prdt-rgt-dtls-txt">
                <p class="mb-0 fs-18">Size & Fit</p>
            </div>
        </div>

        @if ($product->return_charge == 0 || $product->return_charge === null)
            <div class="prdt-rgt-dtls-sngl d-flex align-items-center">
                <div class="prdt-rgt-dtls-img me-3">
                    <img src="{{ asset('shop/images/return.svg')}}">
                </div>
                <div class="prdt-rgt-dtls-txt">
                    <p class="mb-0 fs-18">Free Returns</p>
                </div>
            </div>
        @endif

    </div>
</section>


<section class="mens-bestseller trending-products mt-5 mb-5 pt-3">
    <div class="container">
        <h3 class="text-center mb-2">Trending Products</h3>
        <div class="trending-products-inner">
            <div class="swiper trending-products-swiper">
                <div class="swiper-wrapper">

                    @foreach($trendingProducts as $product)

                        <div class="swiper-slide">
                            <div class="bestseller-single-card">
                                <div class="bestseller-img position-relative overflow-hidden">
                                    <img src="{{ $product->Image }}" alt="{{ $product->productName }}">
                                    <div class="prd-icn-wrap">
                                        <a href="javascript:void(0)" class="wishlist-icn position-relative">
                                            <img src="{{ asset('shop/images/heart.png') }}" class="heart-grey" alt="heart grey">
                                            <img src="{{ asset('shop/images/heart-fill.png') }}" class="heart-fill" alt="heart fill">
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
                    <img src="{{ asset('shop/images/arrow-right.svg')}}">
                </div>
                <div class="swiper-button-prev prdt-arw-btn">
                    <img src="{{ asset('shop/images/arrow-left.svg')}}">
                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal fade all-dtl-modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <div class="modal-header-left d-flex">
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title" id="exampleModalLabel">Product Detail</h5>
        </div>
      </div>
      <div class="modal-body all-dtl-modal-inner">
        <div class="dtl-mdl-inr-top d-flex align-items-center">
               <div class="dtl-mdl-inr-top-img">
                   <img src="images/mens-bestseller.png">
               </div>
               <div class="dtl-mdl-inr-top-content ps-3">
                   <h3>VeBNoR Men Printed Casual Black Shirt</h3>
                   <div class="price-discount-wrap d-flex align-items-center">
                    <h4 class="fs-14 fw-500 mb-0">₹40</h4>
                    <h5 class="mb-0">₹60</h5>
                    <span class="mb-0">(62% OFF)</span>
                </div>
                <div class="rating-container fs-12 fw-600 d-flex align-items-center">
                    <span class="fs-14">4.3</span>
                    <img src="images/star.png">
                </div>
               </div>
        </div>
        <div class="dtl-mdl-inr-btm pt-2">
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
                      <p>This shirts is one of the top selling product from premium quality casual shirts collection exclusively manufactured by VeBNoR brand.</p>
                  </div>
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="specification-tab-wrap">
                      <h3 class="fs-18 fw-500">Specifations</h3>
                      <div class="key-feat-inner">
                          <div class="shop-rgt-descrip-inner">
                            <div class="row pb-3">
                                <div class="col-md-4 shop-left-descrip">
                                    <p class="mb-0">Style Code</p>
                                </div>
                                <div class="col-md-8 shop-rgt-descrip">
                                    <p class="mb-0">AV104SL-COMBO</p>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col-md-4 shop-left-descrip">
                                    <p class="mb-0">Closure</p>
                                </div>
                                <div class="col-md-8 shop-rgt-descrip">
                                    <p class="mb-0">Elastic</p>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
              </div>
              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="more-info-tab-wrap">
                      <div class="more-info-top">
                          <div class="row pb-3">
                            <div class="col-md-4 more-info-left">
                                <p class="mb-0">Generic Name</p>
                            </div>
                            <div class="col-md-8 more-info-rgt">
                                <p class="mb-0">Shirt</p>
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col-md-4 more-info-left">
                                <p class="mb-0">Country of Origin</p>
                            </div>
                            <div class="col-md-8 more-info-rgt">
                                <p class="mb-0">India</p>
                            </div>
                        </div>
                      </div>
                      <div class="more-info-btm">
                          <div class="more-info-btm-sngl mb-3">
                              <h3 class="fs-16 fw-500">Manufacturer's Details</h3>
                              <ul>
                                  <li>
                                      Shop No. 7119, 7th Floor, Avadh Rituraj Textile Hub, Godadara Road, Parvat Gaam, Surat - 395 012
                                  </li>
                              </ul>
                          </div>
                          <div class="more-info-btm-sngl">
                              <h3 class="fs-16 fw-500">Packer's Details</h3>
                              <ul>
                                  <li>
                                      Shop No. 7119, 7th Floor, Avadh Rituraj Textile Hub, Godadara Road, Parvat Gaam, Surat - 395 012
                                  </li>
                              </ul>
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

<div class="modal fade offers-coupan-modal" id="exampleModal-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <div class="modal-header-left d-flex">
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">All Offers and Coupans</h5>
            </div>
          </div>
          <div class="modal-body">
            <div class="offers-coupan-modal-inner">
                <h3 class="fw-400 fs-18">Bank Offer</h3>
                <div class="coupan-modal-sngl d-flex mb-2">
                    <img src="images/offers-label.webp">
                    <p class="mb-0">Get ₹25* instant discount for the 1st Flipkart Order using Flipkart UPI</p>
                </div>                
                <div class="coupan-modal-sngl d-flex mb-2">
                    <img src="images/offers-label.webp">
                    <p class="mb-0">Get ₹25* instant discount for the 1st Flipkart Order using Flipkart UPI</p>
                </div>
            </div>
          </div>
        </div>
      </div>
</div>	

<div class="modal fade review-images-modal" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <div class="modal-header-left d-flex">
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">ALL CUSTOMER PHOTOS</h5>
            </div>
          </div>
          <div class="modal-body">
               <div class="customer-inner-imgs d-flex flex-wrap justify-content-between">
                   <div class="customer-sngl-img mb-2">
                       <img src="images/catg-1.png">
                   </div>                   
                   <div class="customer-sngl-img mb-2">
                       <img src="images/catg-1.png">
                   </div>
                   <div class="customer-sngl-img mb-2">
                       <img src="images/catg-3.png">
                   </div>
               </div>
          </div>
        </div>
      </div>
</div>	
	
<div class="modal fade rate-product-modal" id="exampleModal-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <div class="modal-header-left d-flex">
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title" id="exampleModalLabel">Add Ratings</h5>
        </div>
      </div>
      <div class="modal-body">
           <div class="rate-product-inner">
               <div class="five-star-rating">
                   <h4 class="mb-0">Rate this product</h4>
                   <div class="star-ratings d-flex">
                       <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                      </div>
                   </div>
               </div>
               <div class="rating-description">
                   <h4>Review this product</h4>
                   <div class="review-desc-wrap">
                       <textarea rows="8" placeholder="Description..." class="gdns+F"></textarea>
                   </div>
               </div>
               <div class="rating-submit-btn d-flex justify-content-end">
                   <a href="#">SUBMIT</a>
               </div>
           </div>
      </div>
    </div>
  </div>
</div>

</div>