<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.png" sizes="32x32" type="image/png">
    <title>{{ $title ?? 'Clothing Shop Grocito' }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('shop/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('shop/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('shop/css/product_details_css.css') }}"> 
    <link rel="stylesheet" href="{{ asset('shop/css/wishlist_css.css') }}">
    
    @livewireStyles
</head>

<body>

    @livewire('partials.navbar')

    <div class="main-wrap">
        {{ $slot }}
    </div>

    @livewire('partials.footer')


    <script src="{{ asset('shop/js/jquery.min.js') }}"></script>
    <script src="{{ asset('shop/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('shop/js/custom.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // BANNER SWIPER
        var swiper = new Swiper(".banner-swiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        // NEW ARRIVAL SWIPER
        var swiper = new Swiper(".new-arrival-swiper", {
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

        // MENS BESTSELLER SWIPER
        var swiper = new Swiper(".mens-swiper", {
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

        // KIDS BESTSELLER SWIPER
        var swiper = new Swiper(".kids-swiper", {
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

        // WOMEN BESTSELLER SWIPER
        var swiper = new Swiper(".women-swiper", {
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


        // dropdown 
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

        // var btn = document.querySelector('.toggle');
        // var btnst = true;
        // btn.onclick = function() {
        //   if(btnst == true) {
        //     document.querySelector('.toggle').classList.add('toggle');
        //     document.getElementById('sidebar').classList.add('sidebarshow');
        //     btnst = false;
        //   }else if(btnst == false) {
        //     document.querySelector('.toggle').classList.remove('toggle');
        //     document.getElementById('sidebar').classList.remove('sidebarshow');
        //     btnst = true;
        //   }
        // }
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

        // headr- dropdown
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
    </script>

    @livewireScripts
</body>

</html>
