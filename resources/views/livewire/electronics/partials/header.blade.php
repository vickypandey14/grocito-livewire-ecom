<div>

    <header class="desktop-header d-flex align-items-center justify-content-between">
        <div class="logo-cath-wrap d-flex align-items-center">
            <div class="logo">
                @php
                    $seller_id = 16;
                @endphp
                <a href="{{ route('electronics-shop-home', $seller_id) }}">
                    <img src="{{ asset('electronics-shop/images/grocito-logo.png') }}" wire:navigate>
                </a>
            </div>
            <div class="nav-catg">
                <div id="primary_nav_wrap">
                    <ul>
                        <li>
                            <div class="d-flex align-items-center">
                                <a href="#">All Categories</a>
                                <i class="fa-solid fa-angle-down" style="color: #000"></i>
                            </div>	
                            <ul class="hover-item">
                                <li class="dir"><a href="other.html">Phone</a>
                                    <ul class="hover-inner-items">
                                        <li><a href="#">Apple</a></li>
                                        <li><a href="#">Xiomi</a></li>
                                    </ul>
                                </li>
                                <li class="dir"><a href="other.html">Laptop</a>
                                    <ul class="hover-inner-items">
                                        <li><a href="#">Apple</a></li>
                                        <li><a href="#">Dell</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="prdt-search-wrap">
            <div class="form">
              <i class="fa fa-search"></i>
              <input type="text" class="form-control form-input" placeholder="Search for product, brands and more">
            </div>
        </div>
        <div class="dsk-header-right d-flex align-items-center justify-content-end">
            <div class="header-icons">
                <i class="fa-regular fa-heart"></i>
            </div>
            <div class="header-icons">
                <i class="fa-solid fa-cart-shopping"></i>
            </div>
            <div class="header-icons">
                <i class="fa-regular fa-user"></i>
            </div>
        </div>
    </header>

    <header class="mobile-header d-flex justify-content-between d-md-none">
        <div class="hmburger-logo-wrap d-flex align-items-center">
            <div class="hamburger-icn" id="toggle" onclick="toggle(this)">
                <div></div>
                <div class="sm-line"></div>
                <div></div>
            </div>
            <div class="prdt-logo">
                <img src="{{ asset('electronics-shop/images/grocito-logo.png') }}">
            </div>
        </div>
        <div class="search-icn-wrap d-flex align-items-center">
            <div class="mobile-search">
                <div class="search-btn"><i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i></div>
                <div class="search-icn-open" style="display: none;">
                    <form>
                        <div class="search-box">
                            <div class="back-input-wrap d-flex">
                                <div class="search-bck"><i class="fa-solid fa-arrow-left"></i></div>
                                <input type="search" autocomplete="off" class="search-in product-search" placeholder="Search for Products" autocapitalize="off">
                                <div class="in-search-icn"><i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i></div>
                            </div>
                        <div class="search-open-box" style="display: none;">

                            <div class="search-open-sngl d-flex align-items-center">
                                <img src="images/search-open.webp">
                                <p class="mb-0">Pants for men</p>
                            </div>

                        </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="header-rgt-img me-4">
                <i class="fa-solid fa-user" style="color: #000000;"></i>
            </div>
            <div class="header-rgt-img">
                <i class="fa-solid fa-cart-shopping" style="color: #000000;"></i>
            </div>
        </div>
        <div class="hamburger-prdt-catg" id="sidebar">
            <div class="sidebar-cross">
                <a href="javascript:void(0)" onclick="toggleHide(this)">
                    <img src="{{ asset('electronics-shop/images/close.png') }}">
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
                                    <li class="list-item" style="--delay:0.2s"> 
                                        <a href="#">Classic Shirt</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </header>

</div>
