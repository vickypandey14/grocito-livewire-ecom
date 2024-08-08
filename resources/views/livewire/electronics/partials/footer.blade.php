<div>

    <footer class="site-fotter">
        <div class="site-fotter-inner">
            <div class="site-fotter-single logo-sngl">
                @if ($seller)
                    <a href="{{ $seller->storeLink }}" wire:navigate.hover>
                        <img src="{{ $seller->storeLogo }}" alt="Store Logo">
                    </a>
                @endif
            </div>
            <div class="site-fotter-single mb-bs-info">
                <div class="site-ftr-headline">
                    <h3>Business Information</h3>
                </div>
                <div class="site-ftr-items">
                    <div class="site-ftr-items-wrap">
                        <i class="fa-solid fa-store" aria-hidden="true"></i>
                        <a href="#">{{ $seller->storeName }}</a>
                    </div>
                    <div class="site-ftr-items-wrap">
                        <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                        <a href="#">{{ $seller->location }}</a>
                    </div>
                    <div class="site-ftr-items-wrap">
                        <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                        <a href="#">account.test@grocito.com</a>
                    </div>
                    <div class="site-ftr-items-wrap">
                        <i class="fa-solid fa-phone" aria-hidden="true"></i>
                        <a href="#">7014099395</a>
                    </div>
                </div>
            </div>
            <div class="site-fotter-single">
                <div class="site-ftr-headline">
                    <h3>Useful Links</h3>
                </div>
                <div class="site-ftr-items">
                    <a href="#">About Us</a>
                    <a href="#">Terms & Conditions</a>
                    <a href="#">Return & Refund Policy</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Cancellation Policy</a>
                </div>
            </div>
            <div class="site-fotter-single">
                <div class="site-ftr-headline">
                    <h3>Social Media</h3>
                </div>
                <div class="site-ftr-items">
                    <div class="ftr-icn-wrap">
                        @if ($seller->facebook)
                            <a href="{{ $seller->facebook }}" target="_blank">
                                <img src="{{ asset('shop/images/facebook.png') }}" alt="Facebook">
                            </a>
                        @endif
                        @if ($seller->instagram)
                            <a href="{{ $seller->instagram }}" target="_blank">
                                <img src="{{ asset('shop/images/instagram.png') }}" alt="Instagram">
                            </a>
                        @endif
                        @if ($seller->twitter)
                            <a href="{{ $seller->twitter }}" target="_blank">
                                <img src="{{ asset('shop/images/twitter.png') }}" alt="Twitter">
                            </a>
                        @endif
                        @if ($seller->linkedin)
                            <a href="{{ $seller->linkedin }}" target="_blank">
                                <img src="{{ asset('shop/images/linkdin.png') }}">
                            </a>
                        @endif
                        @if ($seller->youtube)
                            <a href="{{ $seller->youtube }}" target="_blank">
                                <img src="{{ asset('shop/images/youtube.png') }}" alt="YouTube">
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright text-center"><p class="mb-0">©2024 Grocito All rights reserved</p></div>
    </footer>

</div>