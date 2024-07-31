<div>

    {{-- <h1>Products in {{ $category->CategoryName }}</h1>
    
    @foreach ($products as $product)
        <div class="product-item">
            <div class="product-img">
                <img src="{{ $product->Image }}" alt="{{ $product->productName }}">
            </div>
            <div class="product-details">
                <h3>{{ $product->productName }}</h3>
                <p>{!! $product->description !!}</p>
                <span>-{{ $this->calculateDiscount($product->product_stock->price, $product->product_stock->mrp) }}% OFF</span>
                <h3>₹{{ $product->product_stock->price }}</h3>
                <h4>₹{{ $product->product_stock->mrp }}</h4>
            </div>
        </div>
    @endforeach --}}

    <section class="product-detail-sec mb-5">
        <div class="product-detail-sec-inner">
            <div class="row">
                <div class="col-md-3">
                    <div class="product-dtl-left">
                        <div class="product-dtl-left-inner">
                            <div class="prdt-dtl-filter">
                                <div class="filter-head d-flex align-items-center justify-content-between">
                                    <h3 class="fs-20 mb-0 fw-400">Filter</h3>
                                    <div class="apply-fltr-btn d-flex">
                                        <a href="#">Clear all</a>
                                    </div>
                                </div>
                                <div class="filter-data mt-3 sec-center">
                                    
                                    <div class="single-dropdown">
                                        <h3 class="sidebar-filter-btn mb-2 toggle-btn-main">Brand Name</h3>
                                        <ul class="lists list-main">
                                            <li class="list-item" style="--delay:0.2s">
                                                <div class="form-group">
                                                    <input type="checkbox" id="tops1">
                                                    <label for="tops1">Samsung</label>
                                                </div>
                                            </li>
                                            <li class="list-item" style="--delay:0.4s">
                                                <div class="form-group">
                                                    <input type="checkbox" id="tops2">
                                                    <label for="tops2">Vivo</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>

                                </div>
                            </div>
                        </div>
                        <div class="sort-filter-mobile-wrap">
                            <div class="sort-filter-inner d-flex">
                                <div class="sort-btn d-flex justify-content-center" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <svg width="20" height="20" viewBox="0 0 256 256">
                                        <path fill="none" d="M0 0h256v256H0z"></path>
                                        <path fill="none" stroke="#111112" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="12"
                                            d="m144 168 40 40 40-40M184 112v96M48 128h72M48 64h136M48 192h56"></path>
                                    </svg>
                                    <p class="mb-0 fs-16 ps-3">Sort</p>
                                </div>
                                <div class="filter-btn d-flex justify-content-center" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal-1">
                                    <svg width="20" height="20" viewBox="0 0 256 256">
                                        <path fill="none" d="M0 0h256v256H0z"></path>
                                        <path fill="none" stroke="#111112" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="12" d="M148 172H40M216 172h-28">
                                        </path>
                                        <circle cx="168" cy="172" r="20" fill="none" stroke="#111112"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="12">
                                        </circle>
                                        <path fill="none" stroke="#111112" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="12" d="M84 84H40M216 84h-92"></path>
                                        <circle cx="104" cy="84" r="20" fill="none" stroke="#111112"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="12">
                                        </circle>
                                    </svg>
                                    <p class="mb-0 fs-16 ps-3">filter</p>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-category d-flex d-md-none">
                            <div class="mobile-ctg-sngl">
                                <a href="#">
                                    <p class="mb-0">Printed T Shirts</p>
                                </a>
                            </div>
                            <div class="mobile-ctg-sngl">
                                <a href="#">
                                    <p class="mb-0">Plain T Shirts</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="product-dtl-right">
                        <div class="desktop-catg-wrap d-none d-md-block">
                            <div class="desktop-category-wrap d-flex ">

                                <div class="desktop-ctg-sngl">
                                    <a href="#">
                                        <p class="mb-0">Techno Pova</p>
                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="product-dtl-rgt-inner mt-3">


                            @forelse ($products as $product)

                                <div class="bestseller-single-card mb-3">
                                    <div class="bestseller-img position-relative overflow-hidden">
                                        <img src="{{ $product->Image }}" alt="">
                                        <div class="prd-icn-wrap">
                                            <a href="javascript:void(0)" class="wishlist-icn position-relative">
                                                <img src="{{ asset('electronics-shop/images/heart.png') }}" class="heart-grey" alt="heart grey">
                                                <img src="{{ asset('electronics-shop/images/heart-fill.png') }}" class="heart-fill" alt="heart fill">
                                            </a>
                                            <a href="javascript:void(0)" class="share-icn mt-2">
                                                <img src="{{ asset('electronics-shop/images/share.png') }}" alt="" class="share-icn">
                                            </a>
                                        </div>
                                        <div class="add-cart-btn"data-bs-toggle="modal" data-bs-target="#exampleModal-2">
                                            <a href="javascript:void(0)" class="d-flex justify-content-center">
                                                <p class="mb-0 pe-2 fs-14">Add To Cart</p>
                                                <img src="{{ asset('electronics-shop/images/cart-blue.png') }}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="bestseller-content">
                                        <h3>{{ $product->productName }}</h3>
                                        <p>{!! $product->description !!}</p>
                                        <div class="rating-container fs-12 fw-600 d-flex align-items-center">
                                            <span>4.3</span>
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                        </div>
                                        <div class="price-discount-wrap d-flex align-items-center">
                                            <h4 class="fs-14 fw-500 mb-0">₹{{ $product->product_stock->price }}</h4>
                                            <h5 class="mb-0">₹{{ $product->product_stock->mrp }}</h5>
                                            <span class="mb-0">{{ $this->calculateDiscount($product->product_stock->price, $product->product_stock->mrp) }}% OFF</span>
                                        </div>
                                    </div>
                                </div>

                            @empty

                                <h4 class="mx-auto">No Products are found for this Category!</h4>

                            @endforelse


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade filter-modal" id="exampleModal-1" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-header-left">
                            <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-header-rgt" style="display: none;">
                            <p class="mb-0 fs-16">Clear Filter</p>
                        </div>
                        <div class="apply-filter-button d-flex">
                            <a href="#">Apply Filter</a>
                        </div>
                    </div>
                    <div class="modal-body filter-mobile-inner">
                        <div class="filter-data mt-4 sec-center">
                            <div class="d-flex align-items-start filter-data-inner">
                                <div class="nav flex-column nav-pills me-3 flt-inner-left" id="v-pills-tab"
                                    role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-home" type="button" role="tab"
                                        aria-controls="v-pills-home" aria-selected="true">Price</button>

                                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-profile" type="button" role="tab"
                                        aria-controls="v-pills-profile" aria-selected="false">Brand</button>
                                </div>
                                <div class="tab-content  flt-inner-rgt" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                        aria-labelledby="v-pills-home-tab">
                                        <div class="form-group">
                                            <input type="checkbox" id="Price">
                                            <label for="Price">Rs. 250 - Rs. 399</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Price-1">
                                            <label for="Price-1">Rs. 400 - Rs. 499</label>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                        aria-labelledby="v-pills-profile-tab">
                                        <div class="form-group">
                                            <input type="checkbox" id="Brand">
                                            <label for="Brand">Highlander</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Brand-1">
                                            <label for="Brand-1">Allen Solly</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade sort-modal" id="exampleModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-header-left">
                            <h5 class="modal-title" id="exampleModalLabel-1">Sort By</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-header-rgt">
                            <p class="mb-0 fs-14">Clear Filter</p>
                        </div>
                    </div>
                    <div class="modal-body filter-mobile-inner">
                        <div class="sort-inner">
                            <div class="sort-inner-sngl d-flex justify-content-between">
                                <div><label for="html">Popularity</label></div>
                                <div><input type="radio" id="html" name="fav_language" value="HTML">
                                </div>
                            </div>
                            <div class="sort-inner-sngl d-flex justify-content-between">
                                <div><label for="html">Price -- Low to High</label></div>
                                <div><input type="radio" id="html" name="fav_language" value="HTML">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade add-cart-modal" id="exampleModal-2" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-header-left d-flex">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body add-cart-modal-wrap">
                        <div class="add-cart-modal-inner">
                            <div class="cart-description d-flex">
                                <div class="cart-description-left">
                                    <img src="images/list-mobile1.webp">
                                </div>
                                <div class="cart-description-rgt">
                                    <p>POCO C65 (Matte Black, 128 GB)</p>
                                    <div class="price-discount-wrap d-flex align-items-center">
                                        <h4 class="fs-14 fw-500 mb-0">₹13,999</h4>
                                        <h5 class="mb-0">₹14,999</h5>
                                        <span class="mb-0">(62% OFF)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-color-select">
                                <h3>Select Color</h3>
                                <div class="cart-color-select-inner d-flex flex-wrap">
                                    <a href="#">
                                        <img src="images/list-mobile1.webp">
                                    </a>
                                    <a href="#">
                                        <img src="images/list-mobile2.webp">
                                    </a>
                                </div>
                            </div>
                            <div class="cart-size-select">
                                <h3>Select Variant</h3>
                                <form>
                                    <div class="product-size-wrap">
                                        <div class="custom-radios d-flex justify-content-between">

                                            {{-- repeat --}}

                                            <div>
                                                <input type="radio" id="size-1" name="size"
                                                    value="size-1" checked>
                                                <label for="size-1">
                                                    <span class="prdt-size-crcl">3 GB
                                                    </span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="done-btn w-100 d-flex mt-4">
                                <a href="#">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>