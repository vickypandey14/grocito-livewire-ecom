<div>
    <header class="site-header">
        <div class="container">
            <div class="site-header-inner d-flex align-items-center">
                <div class="header-left d-flex align-items-center">
                    <div class="header-left-logo">
                        <img src="{{ asset('restaurant-shop/images/grocito-new-logo.png') }}">
                    </div>
                    <div class="delivery" onclick="openLocationDialog()">
                        <div class="deliveryTime">Delivery In 1 Hour</div>
                        <div class="deliveryArea">
                            232327, Surat <i class="fa-solid fa-angle-down" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="header-center d-flex align-items-center">
                    {{-- <div class="header-nav-wrap">
                        <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a href="/pills-home" class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Home</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" role="tab" aria-controls="pills-profile"
                                    aria-selected="false">Menu</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" role="tab" aria-controls="pills-contact"
                                    aria-selected="false">Offers</a>
                            </li>
                        </ul>
                    </div> --}}
                    <div class="header-nav-wrap">
                        <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                            
                            @php
                                $seller_id = '17';
                            @endphp

                            <li class="nav-item" role="presentation">
                                <a href="{{ route('restaurant-shop-home', $seller_id) }}" class="nav-link {{ Request::routeIs('restaurant-shop-home') ? 'active' : '' }}" wire:navigate>Home</a>
                            </li>
                            <li class="nav-item" role="presentation">                                
                                <a href="{{ route('restaurant-shop-menu', $seller_id) }}" class="nav-link {{ Request::routeIs('restaurant-shop-menu') ? 'active' : '' }}" wire:navigate>Menu</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="{{ route('restaurant-shop-offer', $seller_id) }}" class="nav-link {{ Request::routeIs('restaurant-shop-offer') ? 'active' : '' }}" wire:navigate>Offers</a>
                            </li>
                        </ul>
                    </div>  
                </div>
                <div class="header-right d-flex align-items-center justify-content-end">
                    <div class="headerCenterWrapper">
                        <div class="fa-solid fa-magnifying-glass fa-lg" id="searchbarButtonImg" alt=""
                            aria-hidden="true"></div>
                        <input class="searchbar" type="text" placeholder="Search ...">
                    </div>
                    <div class="cart">
                        <img src="{{ asset('restaurant-shop/images/cart.png') }}">
                    </div>
                    <div class="login-btn d-flex">
                        <a href="#">
                            <i class="fa-solid fa-user" style="color: #fff;" aria-hidden="true"></i>
                            Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <header class="mobile-header">

    </header>
</div>
