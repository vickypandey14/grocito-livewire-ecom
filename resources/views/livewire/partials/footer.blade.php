<div>
    <footer class="site-fotter">
        <div class="site-fotter-inner">
            <div class="site-fotter-single logo-sngl">
                <a href="/1" wire:navigate.hover>
                    <img src="{{ asset('shop/images/grocito-logo.png') }}">
                </a>
            </div>
            <div class="site-fotter-single">
                <div class="site-ftr-headline">
                    <h3>Useful Links</h3>
                </div>
                <div class="site-ftr-items">
                    <a href="#">About Us</a>
                    <a href="#">Terms & Conditions</a>
                </div>
            </div>
            <div class="site-fotter-single">
                <div class="site-ftr-headline">
                    <h3>Useful Links</h3>
                </div>
                <div class="site-ftr-items">
                    <a href="#">Return & Refund Policy</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Cancellation Policy</a>
                </div>
            </div>
            <div class="site-fotter-single">
                <div class="site-ftr-headline">
                    <h3>Business Information</h3>
                </div>
                <div class="site-ftr-items">
                    <a href="#">account.test@grocito.com</a>
                    <a href="#">7014099395</a>
                </div>
            </div>
            <div class="site-fotter-single">
                <div class="site-ftr-headline">
                    <h3>Social Media</h3>
                </div>
                <div class="site-ftr-items">
                    <div class="ftr-icn-wrap">
                        <a href="#">
                            <img src="{{ asset('shop/images/facebook.png') }}">
                        </a>
                        <a href="#">
                            <img src="{{ asset('shop/images/instagram.png') }}">
                        </a>
                        <a href="#">
                            <img src="{{ asset('shop/images/twitter.png') }}">
                        </a>
                        <a href="#">
                            <img src="{{ asset('shop/images/linkdin.png') }}">
                        </a>
                        <a href="#">
                            <img src="{{ asset('shop/images/youtube.png') }}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <div class="modal fade add-cart-modal" id="exampleModal-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <img src="{{ asset('shop/images/mens-bestseller.png') }}">
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
                <div class="seller-name">
                    <p>Seller: <span>Truenet Commerce</p></span>
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