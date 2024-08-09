<div>

    <footer class="restaurant-site-footer">
        <div class="container">
            <div class="site-footer-inner">
                <div class="rest-footer-left">
                    <div class="footer-logo">
                        @if ($seller)
                            <a href="{{ $seller->storeLink }}" wire:navigate.hover>
                                <img src="{{ $seller->storeLogo }}" alt="Store Logo">
                            </a>
                        @endif
                    </div>
                    <div class="social-icons">
                        <h3>Follow Us On</h3>
                        <div class="social-icons-wrap d-flex">

                            @if ($seller->facebook)
                                <a href="{{ $seller->facebook }}"><i class="fa-brands fa-facebook-f" style="color: #ff006b;"></i></a>
                            @endif

                            @if ($seller->twitter)
                                <a href="{{ $seller->twitter }}"><i class="fa-brands fa-x-twitter" style="color: #ff006b;"></i></a>
                            @endif

                            @if ($seller->instagram)
                                <a href="{{ $seller->instagram }}"><i class="fa-brands fa-instagram" style="color: #ff006b;"></i></a>
                            @endif

                            @if ($seller->youtube)
                                <a href="{{ $seller->youtube }}"><i class="fa-brands fa-youtube" style="color: #ff006b;"></i></a>
                            @endif

                            @if ($seller->linkedin)
                                <a href="{{ $seller->linkedin }}"><i class="fa-brands fa-linkedin" style="color: #ff006b;"></i></a>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="rest-footer-center">
                    <div class="site-ftr-headline">
                        <h3>Useful Links</h3>
                    </div>
                    <div class="rest-footer-items">
                        <a href="#">About Us</a>
                        <a href="#">Terms & Conditions</a>
                        <a href="#">Privacy Policy</a>
                        <a href="#">Contact Us</a>
                    </div>
                </div>
                <div class="rest-footer-end">
                    <div class="site-ftr-headline">
                        <h3>Download Our Apps</h3>
                    </div>
                    <div class="ply-st-btn d-flex">
                        <a href="https://play.google.com/store/apps/details?id=com.grocito.grocito_seller"
                            class="d-flex align-items-center">
                            <img src="{{ asset('restaurant-shop/images/playstore-icon.png') }}" alt="playstore-icon">
                            <p class="mb-0">Get It Now</p>
                        </a>
                    </div>
                    <div class="footer-end-contact">
                        <div class="footer-mail d-flex align-items-center">
                            <i class="fa-regular fa-envelope" style="color: #ffffff;"></i>
                            <a href="#">support@grocito.com</a>
                        </div>
                        <div class="footer-contact d-flex align-items-center">
                            <i class="fa-solid fa-headset" style="color: #ffffff;"></i>
                            <span>7014099395</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-footer">
            <p class="mb-0">©2024 Grocito All rights reserved</p>
        </div>
    </footer>

    <div class="mobile-nav-bottom d-md-none">
        @php
            $seller_id = '17';
        @endphp

        <a href="{{ route('restaurant-shop-home', $seller_id) }}" wire:navigate>
            <i class="fa-solid fa-house" style="color: #6e7191;"></i>
            <span>Home</span>
        </a>
        <a href="{{ route('restaurant-shop-menu', $seller_id) }}" wire:navigate>
            <i class="fa-solid fa-layer-group" style="color: #6e7191;"></i>
            <span>Menu</span>
        </a>
        <a href="#">
            <i class="fa-solid fa-bag-shopping" style="color: #6e7191;"></i>
        </a>
        <a href="{{ route('restaurant-shop-offer', $seller_id) }}" wire:navigate>
            <i class="fa-solid fa-tags" style="color: #6e7191;"></i>
            <span>Offers</span>
        </a>
        <a href="#">
            <i class="fa-solid fa-circle-user" style="color: #6e7191;"></i>
            <span>Login</span>
        </a>
    </div>

</div>
