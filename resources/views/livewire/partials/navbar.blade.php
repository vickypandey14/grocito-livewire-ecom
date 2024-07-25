<div>
    <header class="product-header mb-0 d-none d-md-block">
        <div class="prd-header-inner d-flex align-items-center">
            <div class="prdt-logo">
                <a href="/1" wire:navigate.hover>
                    <img src="{{ asset('shop/images/grocito-logo.png') }}">
                </a>
            </div>

            <div class="prdt-nav-wrap ps-4">
                <ul class="nav navbar-nav">
                    @php
                        $seller_id = '1';
                    @endphp

                    @foreach($productTypesWithCategories as $productType => $categories)

                        <div class="dropDown">
                            <li class="active fs-18"><a href="#">{{ ucfirst($productType) }}</a></li>
                            <div class="dropDown-cnt-wrap">
                                <div class="dropDown-content">
                                    <div class="dropdown-list-inner d-flex">
                                        @foreach($categories as $category)
                                            <div class="dropDown-content-wrap">
                                                <p class="dropDown-content-heading mt-2">
                                                    <a href="{{ route('list-products-by-category', ['seller_id' => $seller_id, 'category_id' => $category->id]) }}" class="fs-18 fw-600" wire:navigate>{{ $category->CategoryName }}</a>
                                                </p>
                                                <ul>
                                                    <li class="dropItem"><a href="#">{{ $category->CategoryName }} Item</a></li>
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </ul>
            </div>
            

            <div class="prdt-search-wrap">
                <div class="form">
                    <i class="fa fa-search"></i>
                    <input type="text" class="form-control form-input"
                        placeholder="Search for product, brands and more">
                </div>
            </div>
            <div class="prdt-header-rgt ps-4 d-flex align-items-center">
                <div class="header-rgt-img me-4">

                    <a href="{{ route('list-wishlist') }}" wire:navigate.hover>
                        <img src="{{ asset('shop/images/wishlist.png') }}">
                    </a>

                </div>
                <div class="header-rgt-img me-4">
                    <img src="{{ asset('shop/images/profile-img.png') }}">
                </div>
                <div class="header-rgt-img">
                    <img src="{{ asset('shop/images/shopping cart.png') }}">
                </div>
            </div>
        </div>
    </header>

    <header class="mobile-header d-flex justify-content-between d-md-none">
        <div class="hmburger-logo-wrap d-flex align-items-center">
            <div class="hamburger-icn" id="toggle" onclick="toggle(this)">
                <div></div>
                <div></div>
                <div></div>
            </div>

            <div class="prdt-logo">
                <img src="{{ asset('shop/images/grocito-logo.png') }}">
            </div>
        </div>
        <div class="search-icn-wrap d-flex align-items-center">
            <div class="mobile-search">
                <div class="search-btn"><img src="{{ asset('shop/images/search-interface-symbol.svg') }}"></div>
                <div class="search-icn-open" style="display: none;">
                    <form>
                        <div class="search-box">
                            <div class="back-input-wrap d-flex">
                                <div class="search-bck"><img src="{{ asset('shop/images/back.png') }}"></div>
                                <input type="search" autocomplete="off" class="search-in product-search"
                                    placeholder="Search for Products" autocapitalize="off">
                                <div class="in-search-icn"><img src="{{ asset('shop/images/search-open.webp') }}">
                                </div>
                            </div>
                            <div class="search-open-box" style="display: none;">
                                <div class="search-open-sngl d-flex align-items-center">
                                    <img src="{{ asset('shop/images/search-open.webp') }}">
                                    <p class="mb-0">Pants for men</p>
                                </div>
                                <div class="search-open-sngl d-flex align-items-center">
                                    <img src="{{ asset('shop/images/search-open.webp') }}">
                                    <p class="mb-0">Formal Shirts</p>
                                </div>
                                <div class="search-open-sngl d-flex align-items-center">
                                    <img src="{{ asset('shop/images/search-open.webp') }}">
                                    <p class="mb-0">Trouser for men</p>
                                </div>
                                <div class="search-open-sngl d-flex align-items-center">
                                    <img src="{{ asset('shop/images/search-open.webp') }}">
                                    <p class="mb-0">Park Avenue Shirts</p>
                                </div>
                                <div class="search-open-sngl d-flex align-items-center">
                                    <img src="{{ asset('shop/images/search-open.webp') }}">
                                    <p class="mb-0">Casual Shirts</p>
                                </div>
                                <div class="search-open-sngl d-flex align-items-center">
                                    <img src="{{ asset('shop/images/search-open.webp') }}">
                                    <p class="mb-0">Formal Pants</p>
                                </div>
                                <div class="search-open-sngl d-flex align-items-center">
                                    <img src="{{ asset('shop/images/search-open.webp') }}">
                                    <p class="mb-0">Pants for men</p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="header-rgt-img me-4">
                <img src="{{ asset('shop/images/user-interface.svg') }}">
            </div>
            <div class="header-rgt-img">
                <img src="{{ asset('shop/images/shopping-cart.svg') }}">
            </div>
        </div>
        <div class="hamburger-prdt-catg" id="sidebar">
            <div class="sidebar-cross">
                <a href="javascript:void(0)" onclick="toggleHide(this)">
                    <img src="{{ asset('shop/images/close.png') }}">
                </a>
            </div>
            <div class="sidebar-inner">
                <div class="sidebar-head">
                    <h3>Category</h3>
                </div>
                <div class="single-dropdown">
                    <button class="toggle sidebar-filter-btn toggle-btn-main mb-2">Mens</button>
                    <ul class="list list-main">
                        <li class="list-item" style="--delay:0.2s">
                            <div class="single-dropdown sub-dropdown">
                                <button class="toggle mb-2 sidebar-filter-btn toggle-btn-inner">Classic</button>
                                <ul class="list list-item-inner">
                                    <li class="list-item" style="--delay:0.2s"> <a href="#">Classic Shirt</a>
                                    </li>
                                    <li class="list-item" style="--delay:0.2s"> <a href="#">Classic Suit</a>
                                    <li class="list-item" style="--delay:0.2s"> <a href="#">Classic Watches</a>
                                </ul>
                            </div>
                        </li>
                        <li class="list-item" style="--delay:0.2s">
                            <div class="single-dropdown sub-dropdown">
                                <button class="toggle mb-2 sidebar-filter-btn toggle-btn-inner">Casual</button>
                                <ul class="list list-item-inner">
                                    <li class="list-item" style="--delay:0.2s"> <a href="#">Casual Shirts</a>
                                    </li>
                                    <li class="list-item" style="--delay:0.2s"> <a href="#">Casual Pants</a>
                                    <li class="list-item" style="--delay:0.2s"> <a href="#">Casual Trouser</a>
                                </ul>
                            </div>
                        </li>
                        <li class="list-item" style="--delay:0.2s">
                            <div class="single-dropdown sub-dropdown">
                                <button class="toggle mb-2 sidebar-filter-btn toggle-btn-inner">Business</button>
                                <ul class="list list-item-inner">
                                    <li class="list-item" style="--delay:0.2s"> <a href="#">Casual Shirts</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="single-dropdown">
                    <button class="toggle sidebar-filter-btn toggle-btn-main mb-2">Women</button>
                    <ul class="list list-main">
                        <li class="list-item" style="--delay:0.2s">
                            <div class="single-dropdown sub-dropdown">
                                <button class="toggle mb-2 sidebar-filter-btn toggle-btn-inner">Tops</button>
                                <ul class="list list-item-inner">
                                    <li class="list-item" style="--delay:0.2s"> <a href="#">T shirt</a>
                                    </li>
                                    <li class="list-item" style="--delay:0.2s"> <a href="#">Women Trending</a>
                                    <li class="list-item" style="--delay:0.2s"> <a href="#">Shirts</a>
                                </ul>
                            </div>
                        </li>
                        <li class="list-item" style="--delay:0.2s">
                            <div class="single-dropdown sub-dropdown">
                                <button class="toggle mb-2 sidebar-filter-btn toggle-btn-inner">Bottomwear</button>
                                <ul class="list list-item-inner">
                                    <li class="list-item" style="--delay:0.2s"> <a href="#">Pants</a>
                                    </li>
                                    <li class="list-item" style="--delay:0.2s"> <a href="#">Jeans</a>
                                    <li class="list-item" style="--delay:0.2s"> <a href="#">Plazo</a>
                                </ul>
                            </div>
                        </li>
                        <li class="list-item" style="--delay:0.2s">
                            <div class="single-dropdown sub-dropdown">
                                <button class="toggle mb-2 sidebar-filter-btn toggle-btn-inner">Traditional</button>
                                <ul class="list list-item-inner">
                                    <li class="list-item" style="--delay:0.2s"> <a href="#">Suits</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="single-dropdown">
                    <button class="toggle sidebar-filter-btn toggle-btn-main mb-2">Kids</button>
                    <ul class="list list-main">
                        <li class="list-item" style="--delay:0.2s">
                            <div class="single-dropdown sub-dropdown">
                                <button class="toggle mb-2 sidebar-filter-btn toggle-btn-inner">Boys Clothing</button>
                                <ul class="list list-item-inner">
                                    <li class="list-item" style="--delay:0.2s"> <a href="#">T shirt</a>
                                    </li>
                                    <li class="list-item" style="--delay:0.2s"> <a href="#">Shirt</a>
                                    <li class="list-item" style="--delay:0.2s"> <a href="#">Shorts</a>
                                </ul>
                            </div>
                        </li>
                        <li class="list-item" style="--delay:0.2s">
                            <div class="single-dropdown sub-dropdown">
                                <button class="toggle mb-2 sidebar-filter-btn toggle-btn-inner">Girls clothimg</button>
                                <ul class="list list-item-inner">
                                    <li class="list-item" style="--delay:0.2s"> <a href="#">Dresses</a>
                                    </li>
                                    <li class="list-item" style="--delay:0.2s"> <a href="#">Tops</a>
                                    <li class="list-item" style="--delay:0.2s"> <a href="#">Party Wear</a>
                                </ul>
                            </div>
                        </li>
                        <li class="list-item" style="--delay:0.2s">
                            <div class="single-dropdown sub-dropdown">
                                <button class="toggle mb-2 sidebar-filter-btn toggle-btn-inner">toys & Games</button>
                                <ul class="list list-item-inner">
                                    <li class="list-item" style="--delay:0.2s"> <a href="#">Actiivity Toys</a>
                                    </li>
                                    <li class="list-item" style="--delay:0.2s"> <a href="#">Soft Toys</a>
                                    <li class="list-item" style="--delay:0.2s"> <a href="#">Play Set</a>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</div>
