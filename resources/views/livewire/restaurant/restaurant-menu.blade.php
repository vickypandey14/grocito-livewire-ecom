<div>

    <section class="menu-category-items pb-4">        
        <div class="container">
            <h4>Menu</h4>
            <div class="menu-category mt-3">
                <div class="swiper swiper-category">
                    <div class="swiper-wrapper">

                        @foreach ($categories as $category)

                            <div class="swiper-slide" wire:key="{{ $category->CategoryName }}" wire:click="selectCategory({{ $category->id }})">
                                <div class="our-menu-sngl">
                                    <img src="{{ $category->Image }}" alt="{{ $category->CategoryName }}">
                                    <h4 class="mb-0">{{ $category->CategoryName }}</h4>
                                </div>
                            </div>
                            
                        @endforeach

                    </div>
                </div>
            </div>

            @if ($selectedCategory)
                <div class="veg-nav-wrap">

                    <a href="javascript:void(0);" class="veg-btn" wire:click="filterByType('Veg')">
                        <img src="{{ asset('restaurant-shop/images/veg-img.png') }}">
                        <p class="mb-0">Veg</p>
                    </a>

                    <a href="javascript:void(0);" class="veg-btn" wire:click="filterByType('Non-Veg')">
                        <img src="{{ asset('restaurant-shop/images/non-veg-img.png') }}">
                        <p class="mb-0">Non-Veg</p>
                    </a>

                </div>
            @endif

            <div class="menu-sub-catg">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseOne">
                                {{ $selectedCategory->CategoryName ?? 'Select a Category' }}
                            </button>
                        </h2>

                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <div class="menu-prdt-card-wrap">

                                    @foreach ($products as $product)
                                        <div class="popular-items-card d-flex mb-3">
                                            <div class="popular-items-left">
                                                <img src="{{ $product->Image }}">
                                            </div>
                                            <div class="popular-items-rgt">
                                                <div class="popular-items-heading d-flex align-items-center">
                                                    <h4 class="mb-0 fs-14 pe-2">{{ $product->productName }}</h4>
                                                </div>
                                                <p class="fs-12 mb-0">{!! $product->description !!}</p>
                                                <div class="price-add-wrap d-flex align-items-center justify-content-between">
                                                    <div class="price">
                                                        <p class="mb-0">₹{{ $product->product_stock->price }}</p>
                                                    </div>
                                                    <div class="add-bag d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addProductModal" wire:click="addToCart({{ $product->id }})">
                                                        <img src="{{ asset('restaurant-shop/images/shopping-bag.png') }}">
                                                        <p class="mb-0">Add</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Add Product Modal -->
    
    <div class="modal fade add-popup" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalTitle" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="add-cart-wrap">
                        @if ($cartProduct)
                            <div class="add-cart-top d-flex">
                                <div class="cart-top-img">
                                    <img src="{{ $cartProduct->Image }}" alt="{{ $cartProduct->productName }}">
                                </div>
                                <div class="cart-top-text">
                                    <h3>{{ $cartProduct->productName }}</h3>
                                    <p>{!! $cartProduct->description !!}</p>
                                    <div class="cart-item-price">
                                        ₹{{ $totalPrice }}
                                    </div>
                                </div>
                            </div>
                        @endif
    
                        <div class="plus-minus-btn d-flex align-items-center">
                            <div class="quantity-txt">
                                <p class="mb-0">Quantity:</p>
                            </div>
                            <div class="qty">
                                <span class="minus" wire:click="decrementQuantity">-</span>
                                <input type="number" class="count" name="qty" value="{{ $quantity }}" wire:model="quantity">
                                <span class="plus" wire:click="incrementQuantity">+</span>
                            </div>
                        </div>
    
                        @if ($addons)
                            <div class="add-ons-sec">
                                <h3>Addons</h3>
                                <div class="add-ons-wrap d-flex">
    
                                    @foreach ($addons as $addon)
                                        <div class="add-ons d-flex" wire:click="toggleAddon('{{ $addon['name'] }}', {{ $addon['price'] }})">
                                            <div class="add-on-image">
                                                <img src="https://cdn-icons-png.flaticon.com/512/288/288851.png">
                                            </div>
                                            <div class="add-ons-txt">
                                                <p>{{ $addon['name'] }}</p>
                                                <div class="add-on-price">
                                                    ₹{{ $addon['price'] }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        @endif
    
                        <div class="customize-taste">
                            <h3>Customise as per your taste</h3>
                            <div class="customise-inner-wrap">
                                <h2>Quantity</h2>
    
                                {{-- repeat --}}
    
                                @foreach ($sizes as $id => $size)

                                    <div class="quantity-options-wrap">
                                        <div class="quantity-opt-left">
                                            <div class="d-flex">
                                                <div class="quantity-opt-left-img">
                                                    @if ($cartProduct->product_type == 'Veg')
                                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Veg_symbol.svg/1200px-Veg_symbol.svg.png" alt="Veg Symbol">
                                                    @else
                                                        <img src="https://freesvg.org/img/1531813245.png" alt="Non Veg Symbol">
                                                    @endif
                                                </div>
                                                <div class="quantity-opt-left-txt">
                                                    <p class="mb-0">{{ $size }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="quantity-opt-rgt">
                                            <input type="radio" id="size-{{ $id }}" name="radio-group" value="{{ $id }}" wire:model="selectedSize">
                                        </div>                                        
                                    </div>

                                @endforeach   
                                
                                
    
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <a href="#">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>