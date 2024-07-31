<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('restaurant-shop/images/favicon.png') }}" sizes="32x32" type="image/png">
    <title>{{ $title ?? 'Restaurant Shop Grocito' }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('restaurant-shop/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <link rel="stylesheet" href="{{ asset('restaurant-shop/css/style.css') }}">

    @livewireStyles
</head>
<body>

    <div class="main-wrap-page">

        @livewire('restaurant.partials.header')

        {{ $slot }}

        @livewire('restaurant.partials.footer')

    </div>


    <script src="{{ asset('restaurant-shop/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".home-banner-swiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        // our menu
        var swiper2 = new Swiper(".our-menu-swiper", {
            slidesPerView: 3,
            spaceBetween: 10,
            mousewheel: {
                forceToAxis: true,
            },
            freemode: true,
            loop: true,
            breakpoints: {
                1024: {
                    slidesPerView: 7,
                    spaceBetween: 24,
                },
                768: {
                    slidesPerView: 7,
                    spaceBetween: 24,
                },
                640: {
                    slidesPerView: 7,
                    spaceBetween: 24,
                },
            },
        });

        //menu tab category
        var swiper2 = new Swiper(".swiper-category", {
            slidesPerView: 3,
            spaceBetween: 10,
            mousewheel: {
                forceToAxis: true,
            },
            freemode: true,
            loop: true,
            breakpoints: {
                1024: {
                    slidesPerView: 7,
                    spaceBetween: 15,
                },
                768: {
                    slidesPerView: 7,
                    spaceBetween: 15,
                },
                640: {
                    slidesPerView: 7,
                    spaceBetween: 24,
                },
            },
        });
    </script>

    @livewireScripts
    
</body>
</html>