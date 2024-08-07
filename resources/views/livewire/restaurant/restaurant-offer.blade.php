<div>

    <section class="offer-tab-wrap pb-4">
        <div class="container">
            <div class="order-now-inner d-flex justify-content-between">
                
                @foreach ($seller_center_banners as $banner)
                    
                    <div class="order-now-sngl">
                        <img src="{{ $banner->image }}">
                    </div>

                @endforeach                    

            </div>
        </div>
    </section>

</div>
