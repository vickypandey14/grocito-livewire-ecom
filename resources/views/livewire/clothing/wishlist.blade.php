<div>
    <section class="wishlist-wrap pb-4">
        <div class="container">
            <div class="wishlist-head d-flex align-items-center">
                <h3 class="mb-0">My Wishlist</h3>
                <span>{{ $wishlistItems->count() }} Items in Wishlist</span>
            </div>
    
            <div class="wishlist-wrap-inner">
                
                @foreach ($wishlistItems as $item)

                    <div class="wishlist-card">
                        <div class="wishlist-card-img">
                            <img src="{{ $item->product->Image }}" alt="{{ $item->product->productName }}">
                            
                            <div class="remove-wishlist" wire:click="removeWishlistItem({{ $item->product->id }})">
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                        </div>

                        <div class="wishlist-card-content">
                            <div class="wishlist-card-content-top">

                                <a href="{{ route('product-details', ['productId' => $item->product->id]) }}" wire:navigate>
                                    <h3>{{ $item->product->productName }}</h3>
                                </a>

                                <div class="wishlist-pricing d-flex align-items-center">
                                    <h4 class="fw-500 mb-0">₹{{ $item->product->product_stock->price }}</h4>
                                    <h5 class="mb-0">₹{{ $item->product->product_stock->mrp }}</h5>
                                    <span class="mb-0">({{ $this->calculateDiscount($item->product->product_stock->price, $item->product->product_stock->mrp) }}% OFF)</span>
                                </div>
                            </div>
                            <div class="wishlist-card-content-btm">
                                <a href="#">Move to cart</a>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section>

    {{-- Add to Cart Modal --}}

    <div class="modal fade add-cart-modal" id="exampleModal-1" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-header-left d-flex">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="modal-body add-cart-modal-wrap">
                    <div class="add-cart-modal-inner">
                        
                        <div class="cart-description d-flex">
                            <div class="cart-description-left">
                                <img src="images/mens-bestseller.png">
                            </div>
                            <div class="cart-description-rgt">
                                <p>The Indian Garage Co Men White & Teal Blue Slim Fit Striped Casual Shirt</p>
                                <div class="price-discount-wrap d-flex align-items-center">
                                    <h4 class="fs-14 fw-500 mb-0">₹40</h4>
                                    <h5 class="mb-0">₹60</h5>
                                    <span class="mb-0">(62% OFF)F)</span>
                                </div>
                            </div>
                        </div>

                        <div class="cart-size-select">
                            <h3>Select Size</h3>
                            <form>
                                <div class="product-size-wrap">
                                    <div class="custom-radios d-flex justify-content-between">
                                        <div>
                                            <input type="radio" id="size-1" name="size" value="size-1" checked>
                                            <label for="size-1">
                                                <span class="prdt-size-crcl">38
                                                    <div class="price-show fs-12">Rs. 560</div>
                                                </span>
                                            </label>
                                        </div>

                                        <div>
                                            <input type="radio" id="size-2" name="size" value="size-2">
                                            <label for="size-2">
                                                <span class="prdt-size-crcl">40
                                                    <div class="price-show fs-12">Rs. 560</div>
                                                </span>
                                            </label>
                                        </div>

                                        <div>
                                            <input type="radio" id="size-3" name="size" value="size-3">
                                            <label for="size-3">
                                                <span class="prdt-size-crcl">42
                                                    <div class="price-show fs-12">Rs. 620</div>
                                                </span>
                                            </label>
                                        </div>

                                        <div>
                                            <input type="radio" id="size-4" name="size" value="size-4">
                                            <label for="size-4">
                                                <span class="prdt-size-crcl">44
                                                    <div class="price-show fs-12">Rs. 620</div>
                                                </span>
                                            </label>
                                        </div>
                                        <div>
                                            <input type="radio" id="size-5" name="size" value="size-5">
                                            <label for="size-5">
                                                <span class="prdt-size-crcl">46
                                                    <div class="price-show fs-12">Rs. 560</div>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="done-btn w-100 d-flex mt-4">
                            <a href="#">Done</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>