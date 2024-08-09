<div>

    <header class="desktop-header d-flex align-items-center justify-content-between">
        <div class="logo-cath-wrap d-flex align-items-center">
            <div class="logo">
                @if ($seller)
                    <a href="{{ $seller->storeLink }}" wire:navigate.hover>
                        <img src="{{ $seller->storeLogo }}" alt="Store Logo">
                    </a>
                @endif
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

                                @php
                                    $seller_id = '16';
                                @endphp
                                
                                @foreach($categories as $category)
                                    <li class="dir"><a href="{{ route('electronics-products-by-category', ['seller_id' => $seller_id, 'category_id' => $category->id]) }}" wire:navigate>{{ $category->CategoryName }}</a></li>
                                @endforeach
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
                @if ($seller)
                    <a href="{{ $seller->storeLink }}" wire:navigate.hover>
                        <img src="{{ $seller->storeLogo }}" alt="Store Logo">
                    </a>
                @endif
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
                    <h3>Categories</h3>
                </div>
                <div class="single-dropdown">
                    <button class="toggle sidebar-filter-btn toggle-btn-main mb-2">Categories</button>
                    <ul class="list list-main">

                        @foreach($categories as $category)
                            <li class="list-item" style="--delay:0.2s">
                                <a href="{{ route('electronics-products-by-category', ['seller_id' => $seller_id, 'category_id' => $category->id]) }}">{{ $category->CategoryName }}</a>
                            </li>
                        @endforeach
                        
                    </ul>
                </div>
            </div>
        </div>        

    </header>

</div>
