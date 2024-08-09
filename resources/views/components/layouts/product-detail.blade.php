<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.png" sizes="32x32" type="image/png">
    <title>{{ $title ?? 'Clothing Shop Grocito' }}</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
	<link rel="stylesheet" href="{{ asset('shop/css/bootstrap.min.css') }}">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css'>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
	<link rel='stylesheet' href='https://mreq.github.io/slick-lightbox/dist/slick-lightbox.css'>
	<link rel="stylesheet" href="{{ asset('shop/css/style_product_two.css') }}"> 

    @livewireStyles
</head>

<body>

    @livewire('clothing.partials.navbar')

    <div class="main-wrap">
        {{ $slot }}
    </div>

    @livewire('clothing.partials.footer')

    <script src="{{ asset('shop/js/jquery.min.js') }}"></script>
    <script src="{{ asset('shop/js/bootstrap.min.js') }}"></script>
    <script src="https://use.fontawesome.com/fe459689b4.js"></script>
    <script src="{{ asset('shop/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js'></script>
    <script src='https://mreq.github.io/slick-lightbox/dist/slick-lightbox.js'></script>
    <script>
        var swiper = new Swiper(".banner-swiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        // THUMBSLIDER JS
        var swiper = new Swiper(".product-swiper", {
            spaceBetween: 10,
            slidesPerView: 5,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".product-swiper-right", {
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            thumbs: {
                swiper: swiper,
            },
        });

        // 
        var swiper = new Swiper(".trending-products-swiper", {
            slidesPerView: 2,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 15,
                },
            },
        });

        // like dislike
        $(function() {
            $(".like").click(function() {
                var input = $(this).find('.qty1');
                input.val(parseInt(input.val()) + 1);

            });

        });

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

            // review rating
            $(".view-all-btn").click(function() {
                $(".customers-review-wrap").addClass("show-review");
            });
        });
        // slick prdt slider
        $(".mobile-prdt-slick").slick({
            dots: true
        });

        $(".mobile-prdt-slick").slickLightbox({
            itemSelector: "a",
            navigateByKeyboard: true,

        });

        // Button revome on scroll
        // $(window).scroll(function() {    
        //     var scroll = $(window).scrollTop();

        //     if (scroll <= 100) {
        //         $(".add-wishlist-btn").addClass("hide-btn");
        //     } else {
        //         $(".add-wishlist-btn").removeClass("hide-btn");
        //     }
        // });
        $(window).scroll(function() {
            $(".add-wishlist-btn").removeClass("viewport-bottom");
            if ($(window).scrollTop() + $(window).height() > ($(document).height() - 270)) {
                //you are at bottom
                $(".add-wishlist-btn").addClass("viewport-bottom");
            }
        });

        // header dropdown 
        $('.dropDown>li').mouseover(function() {
            $(this).parents('.dropDown').addClass("hovered-menu");
        });

        // $(".dropDown-content").mouseleave(function(){ //mouseleave instead of mouseout, as mouseout seems to have been deprecated
        // 	$(this).removeClass("result_hover");
        // 	$(this).parents('.dropDown').removeClass("hovered-menu");
        // });
        $(".dropDown-content").mouseover(function() {
            $(this).addClass("result_hover");
            $(this).parents('.dropDown').addClass("hovered-menu");
        });

        $(".dropDown-content").mouseleave(
        function() { //mouseleave instead of mouseout, as mouseout seems to have been deprecated
            $(this).removeClass("result_hover");
            $(this).parents('.dropDown').removeClass("hovered-menu");
        });

        // Like Js New
        var btn1 = document.querySelector('#green');
        var btn2 = document.querySelector('#red');

        btn1.addEventListener('click', function() {

            if (btn2.classList.contains('red')) {
                btn2.classList.remove('red');
            }
            this.classList.toggle('green');

        });

        btn2.addEventListener('click', function() {

            if (btn1.classList.contains('green')) {
                btn1.classList.remove('green');
            }
            this.classList.toggle('red');

        });
    </script>

    @livewireScripts

</body>

</html>
