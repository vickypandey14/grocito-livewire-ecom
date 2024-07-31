<!DOCTYPE html>
<html>
<head>
    <title>{{ $title ?? 'Electronics Shop Grocito' }}</title>
    <link rel="stylesheet" href="{{ asset('electronics-shop/css/bootstrap.min.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('electronics-shop/css/home_page.css') }}">
    <link rel="stylesheet" href="{{ asset('electronics-shop/css/product_list.css') }}">  

    @livewireStyles
</head>
<body>

    <div class="main-wrap">

        @livewire('electronics.partials.header')

        {{ $slot }}

        @livewire('electronics.partials.footer')


    </div>

    <script src="{{ asset('electronics-shop/js/jquery.min.js') }}"></script>
    <script src="{{ asset('electronics-shop/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('electronics-shop/js/custom.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="text/javascript">
        var swiper = new Swiper(".home-banner-swiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        // best selling swiper
        var swiper = new Swiper(".best-selling-swiper", {
            slidesPerView: 2,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 15,
                },
            },
        });

        document.addEventListener("DOMContentLoaded", function(event) {
            var acc = document.getElementsByClassName("toggle-btn-inner");
            var panel = document.getElementsByClassName('list-item-inner');
            for (var i = 0; i < acc.length; i++) {
                acc[i].onclick = function() {
                    var setClasses = !this.classList.contains('active');
                    setClass(acc, 'active', 'remove');
                    setClass(panel, 'show', 'remove');
                    if (setClasses) {
                        this.classList.toggle("active");
                        this.nextElementSibling.classList.toggle("show");
                    }
                }
            }

            function setClass(els, className, fnName) {
                for (var i = 0; i < els.length; i++) {
                    els[i].classList[fnName](className);
                }
            }
        });

        document.addEventListener("DOMContentLoaded", function(event) {
            var acc = document.getElementsByClassName("toggle-btn-main");
            var panel = document.getElementsByClassName('list-main');
            for (var i = 0; i < acc.length; i++) {
                acc[i].onclick = function() {
                    var setClasses = !this.classList.contains('active');
                    setClass(acc, 'active', 'remove');
                    setClass(panel, 'show', 'remove');
                    if (setClasses) {
                        this.classList.toggle("active");
                        this.nextElementSibling.classList.toggle("show");
                    }
                }
            }

            function setClass(els, className, fnName) {
                for (var i = 0; i < els.length; i++) {
                    els[i].classList[fnName](className);
                }
            }
        });

        function toggle(ref) {
            document.getElementById("sidebar").classList.add('active');
        }

        function toggleHide(ref) {
            document.getElementById("sidebar").classList.remove('active');
        }

        $(document).ready(function() {
            $(".product-search").focus(() => {
                $(".search-open-box").show();
            });

            $(".search-btn").click(function() {
                $(".search-icn-open").show();
            });

            $(".search-bck").click(function() {
                $(".search-icn-open").hide();
                $(".search-open-box").hide();
            });
        });
    </script>

    @livewireScripts

</body>
</html>
