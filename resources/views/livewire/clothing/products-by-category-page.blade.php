<div>
    <section class="product-detail-sec mb-5 mt-4">
        <div class="product-detail-sec-inner">
            <div class="row">

                <div class="col-md-3">
                    <div class="product-dtl-left">
                        <div class="product-dtl-left-inner">
                            <div class="prdt-dtl-filter">
                                <div class="filter-head d-flex align-items-center justify-content-between">
                                    <h3 class="fs-20 mb-0 fw-400">Filter</h3>
                                    <div class="apply-fltr-btn d-flex">
                                        <a href="javascript:void(0)" wire:click="clearFilters">Clear all</a>
                                    </div>
                                </div>

                                <div class="filter-data mt-3 sec-center">
                                    <div class="single-dropdown">
                                        <h3 class="sidebar-filter-btn mb-2 toggle-btn-main">Sub Categories</h3>
                                        <ul class="lists list-main">

                                            @foreach ($subCategories as $subCategory)
                                                <li class="list-item" style="--delay:0.2s"
                                                    wire:key="{{ $subCategory->id }}">
                                                    <div class="form-group">
                                                        <input type="checkbox" id="{{ $subCategory->id }}"
                                                            wire:model.live="selected_sub_categories"
                                                            value="{{ $subCategory->id }}">
                                                        <label
                                                            for="{{ $subCategory->id }}">{{ $subCategory->CategoryName }}</label>
                                                    </div>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    <hr>

                                    <div class="single-dropdown">
                                        <h3 class="sidebar-filter-btn mb-2 toggle-btn-main">Sizes</h3>
                                        <ul class="lists list-main">

                                            @foreach ($sizes as $size)
                                                <li class="list-item" style="--delay:0.2s">
                                                    <div class="form-group">
                                                        <input type="checkbox" id="size-{{ $size }}"
                                                            wire:click="filterBySize('{{ $size }}')">
                                                        <label
                                                            for="size-{{ $size }}">{{ $size }}</label>
                                                    </div>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    <hr>

                                    <div class="single-dropdown">
                                        <h3 class="sidebar-filter-btn mb-2 toggle-btn-main">Brands</h3>
                                        <ul class="lists list-main">
                                            @foreach ($brands as $brand)
                                                <li class="list-item" style="--delay:0.2s">
                                                    <div class="form-group">
                                                        <input type="checkbox" id="brand-{{ $brand }}"
                                                            wire:click="filterByBrand('{{ $brand }}')">
                                                        <label
                                                            for="brand-{{ $brand }}">{{ $brand }}</label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <hr>

                                    <div class="single-dropdown">
                                        <h3 class="sidebar-filter-btn mb-2 toggle-btn-main">Price Range</h3>
                                        <div class="price-range">
                                            <input type="number" wire:model.lazy="min_price"
                                                wire:change="filterByPriceRange" placeholder="Min Price">
                                            <input type="number" wire:model.lazy="max_price"
                                                wire:change="filterByPriceRange" placeholder="Max Price">
                                        </div>
                                    </div>


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
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="12"></circle>
                                        <path fill="none" stroke="#111112" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="12" d="M84 84H40M216 84h-92"></path>
                                        <circle cx="104" cy="84" r="20" fill="none" stroke="#111112"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="12"></circle>
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
                            <div class="desktop-category-wrap d-flex">

                                @foreach ($subCategories as $subCategory)
                                    <div class="desktop-ctg-sngl" wire:key="{{ $subCategory->id }}">
                                        <a href="javascript:void(0)"
                                            wire:click="toggleSubCategory({{ $subCategory->id }})">
                                            <p class="mb-0">{{ $subCategory->CategoryName }}</p>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="product-dtl-rgt-inner mt-3">
                            @foreach ($products as $product)
                                <div class="bestseller-single-card mb-3 product-list-card">
                                    <div class="bestseller-img position-relative overflow-hidden">
                                        <img src="{{ $product->Image }}" alt="{{ $product->productName }}">
                                        <div class="prd-icn-wrap">
                                            <a href="javascript:void(0)" class="wishlist-icn position-relative"
                                                wire:click="toggleWishlist({{ $product->id }})">
                                                <img src="{{ asset('shop/images/heart.png') }}"
                                                    class="heart-grey {{ in_array($product->id, $wishlist) ? 'd-none' : '' }}"
                                                    alt="heart grey">
                                                <img src="{{ asset('shop/images/heart-fill.png') }}"
                                                    class="heart-fill {{ in_array($product->id, $wishlist) ? '' : 'd-none' }}"
                                                    alt="heart fill">
                                            </a>
                                            <a href="javascript:void(0)" class="share-icn mt-2">
                                                <img src="{{ asset('shop/images/share.png') }}" alt=""
                                                    class="share-icn">
                                            </a>
                                        </div>
                                        <div class="add-cart-btn" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal-2">
                                            <a href="javascript:void(0)" class="d-flex justify-content-center">
                                                <p class="mb-0 pe-2 fs-14">Add To Cart</p>
                                                <img src="{{ asset('shop/images/cart-blue.png') }}">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="bestseller-content">

                                        <a href="{{ route('product-details', ['productId' => $product->id]) }}"
                                            wire:navigate>
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
                                            <span
                                                class="mb-0">({{ $this->calculateDiscount($product->product_stock->price, $product->product_stock->mrp) }}%
                                                OFF)</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>

            </div>
        </div>

        {{-- Filter Modal --}}

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
                                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-messages" type="button" role="tab"
                                        aria-controls="v-pills-messages" aria-selected="false">Gender</button>
                                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-settings" type="button" role="tab"
                                        aria-controls="v-pills-settings" aria-selected="false">Discount</button>
                                    <button class="nav-link" id="v-pills-sleeves-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-sleeves" type="button" role="tab"
                                        aria-controls="v-pills-size" aria-selected="false">Sleeves</button>
                                    <button class="nav-link" id="v-pills-collor-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-collar" type="button" role="tab"
                                        aria-controls="v-pills-size" aria-selected="false">Collar</button>
                                    <button class="nav-link" id="v-pills-fabric-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-fabric" type="button" role="tab"
                                        aria-controls="v-pills-size" aria-selected="false">fabric</button>
                                    <button class="nav-link" id="v-pills-pattern-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-patten" type="button" role="tab"
                                        aria-controls="v-pills-size" aria-selected="false">Pattern</button>
                                    <button class="nav-link" id="v-pills-occassion-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-occassion" type="button" role="tab"
                                        aria-controls="v-pills-size" aria-selected="false">Occassion</button>
                                    <button class="nav-link" id="v-pills-color-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-color" type="button" role="tab"
                                        aria-controls="v-pills-size" aria-selected="false">Color</button>
                                    <button class="nav-link" id="v-pills-fit-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-color" type="button" role="tab"
                                        aria-controls="v-pills-fit" aria-selected="false">Fit</button>
                                    <button class="nav-link" id="v-pills-collection-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-collection" type="button" role="tab"
                                        aria-controls="v-pills-fit" aria-selected="false">Collection</button>
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
                                        <div class="form-group">
                                            <input type="checkbox" id="Price-2">
                                            <label for="Price-2">Rs. 500 - Rs. 699</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Price-3">
                                            <label for="Price-3">Rs. 700 - Rs. 899</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Price-4">
                                            <label for="Price-4">Rs. 900 - Rs. 999</label>
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
                                        <div class="form-group">
                                            <input type="checkbox" id="Brand-2">
                                            <label for="Brand-2">U.S. Poli Assn.</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Brand-3">
                                            <label for="Brand-3">The Indian Garage</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Brand-4">
                                            <label for="Brand-4">Mufti</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Brand-5">
                                            <label for="Brand-5">WROGN</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Brand-6">
                                            <label for="Brand-6">BEING HUMAN</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Brand-7">
                                            <label for="Brand-7">PETER ENGLAND</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Brand-8">
                                            <label for="Brand-8">ARROW</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Brand-9">
                                            <label for="Brand-9">kILLER</label>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                        aria-labelledby="v-pills-messages-tab">
                                        <div class="form-group">
                                            <input type="checkbox" id="Gender">
                                            <label for="Gender">Men</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Women">
                                            <label for="Women">Women</label>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                        aria-labelledby="v-pills-settings-tab">
                                        <div class="form-group">
                                            <input type="checkbox" id="Discount-1">
                                            <label for="Discount-1">50% or more</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Discount-2">
                                            <label for="Discount-2">30% or more</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Discount-3">
                                            <label for="Discount-3">40% or more</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Discount-4">
                                            <label for="Discount-4">60% or more</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Discount-5">
                                            <label for="Discount-5">70% or more</label>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-sleeves" role="tabpanel"
                                        aria-labelledby="v-pills-sleeves-tab">
                                        <div class="form-group">
                                            <input type="checkbox" id="sleeve-1">
                                            <label for="sleeve-1">3/4 Sleeves</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="sleeve-2">
                                            <label for="sleeve-2">Full Sleeves</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="sleeve-3">
                                            <label for="sleeve-3">Half Sleeves</label>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-collar" role="tabpanel"
                                        aria-labelledby="v-pills-collor-tab">
                                        <div class="form-group">
                                            <input type="checkbox" id="Collor-1">
                                            <label for="Collor-1">Built-up</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Collor-2">
                                            <label for="Collor-2">Button Down</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Collor-3">
                                            <label for="Collor-3">Club</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Collor-4">
                                            <label for="Collor-4">Cut Away</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Collor-5">
                                            <label for="Collor-5">Hood</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Collor-6">
                                            <label for="Collor-6">Lapel</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Collor-7">
                                            <label for="Collor-7">Mandarin</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Collor-8">
                                            <label for="Collor-8">Peter Pan</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Collor-9">
                                            <label for="Collor-9">Ribbed Color</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="Collor-10">
                                            <label for="Collor-10">Spread</label>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-fabric" role="tabpanel"
                                        aria-labelledby="v-pills-fabric-tab">...</div>
                                    <div class="tab-pane fade" id="v-pills-patten" role="tabpanel"
                                        aria-labelledby="v-pills-pattern-tab">...</div>
                                    <div class="tab-pane fade" id="v-pills-occassion" role="tabpanel"
                                        aria-labelledby="v-pills-occassion-tab">...</div>
                                    <div class="tab-pane fade" id="v-pills-color" role="tabpanel"
                                        aria-labelledby="v-pills-color-tab">...</div>
                                    <div class="tab-pane fade" id="v-pills-fit" role="tabpanel"
                                        aria-labelledby="v-pills-fit-tab">...</div>
                                    <div class="tab-pane fade" id="v-pills-collection" role="tabpanel"
                                        aria-labelledby="v-pills-collection-tab">...</div>
                                    <!-- <div class="apply-filter-button d-flex">
                            <a href="#">Apply Filter</a>
                        </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sort Modal --}}

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
                                <div><input type="radio" id="html" name="fav_language" value="HTML"></div>
                            </div>
                            <div class="sort-inner-sngl d-flex justify-content-between">
                                <div><label for="html">Price -- Low to High</label></div>
                                <div><input type="radio" id="html" name="fav_language" value="HTML"></div>
                            </div>
                            <div class="sort-inner-sngl d-flex justify-content-between">
                                <div><label for="html">Price -- High to Low</label></div>
                                <div><input type="radio" id="html" name="fav_language" value="HTML"></div>
                            </div>
                            <div class="sort-inner-sngl d-flex justify-content-between">
                                <div><label for="html">Newest First</label></div>
                                <div><input type="radio" id="html" name="fav_language" value="HTML"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Add to Cart Modal --}}

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
                                    <img src="images/mens-bestseller.png">
                                </div>
                                <div class="cart-description-rgt">
                                    <p>The Indian Garage Co Men White & Teal Blue Slim Fit Striped Casual Shirt</p>
                                    <div class="price-discount-wrap d-flex align-items-center">
                                        <h4 class="fs-14 fw-500 mb-0">₹40</h4>
                                        <h5 class="mb-0">₹60</h5>
                                        <span class="mb-0">(62% OFF)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-color-select">
                                <h3>Select Color</h3>
                                <div class="cart-color-select-inner d-flex flex-wrap">
                                    <a href="#">
                                        <img src="images/color-img-1.jpg">
                                    </a>
                                    <a href="#">
                                        <img src="images/color-img-2.jpg">
                                    </a>
                                    <a href="#">
                                        <img src="images/color-img-3.jpg">
                                    </a>
                                </div>
                            </div>
                            <div class="cart-size-select">
                                <h3>Select Size</h3>
                                <form>
                                    <div class="product-size-wrap">
                                        <div class="custom-radios d-flex justify-content-between">
                                            <div>
                                                <input type="radio" id="size-1" name="size" value="size-1"
                                                    checked>
                                                <label for="size-1">
                                                    <span class="prdt-size-crcl">38

                                                    </span>
                                                </label>
                                            </div>
                                            <div>
                                                <input type="radio" id="size-2" name="size" value="size-2">
                                                <label for="size-2">
                                                    <span class="prdt-size-crcl">40

                                                    </span>
                                                </label>
                                            </div>
                                            <div>
                                                <input type="radio" id="size-3" name="size" value="size-3">
                                                <label for="size-3">
                                                    <span class="prdt-size-crcl">42
                                                    </span>
                                                </label>
                                            </div>
                                            <div>
                                                <input type="radio" id="size-4" name="size" value="size-4">
                                                <label for="size-4">
                                                    <span class="prdt-size-crcl">44
                                                    </span>
                                                </label>
                                            </div>
                                            <div>
                                                <input type="radio" id="size-5" name="size" value="size-5">
                                                <label for="size-5">
                                                    <span class="prdt-size-crcl">46
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
