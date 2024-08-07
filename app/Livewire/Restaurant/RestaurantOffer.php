<?php

namespace App\Livewire\Restaurant;

use App\Models\SellerBanner;
use Livewire\Component;

class RestaurantOffer extends Component
{
    public $seller_id;


    public function mount($seller_id)
    {
        $this->seller_id = $seller_id;
    }

    public function render()
    {
        $seller_center_banners = SellerBanner::where('seller_id', $this->seller_id)
                                            ->where('status', 'active')
                                            ->where('position', 'Center')
                                            ->get(); 

        return view('livewire.restaurant.restaurant-offer', [
            'seller_center_banners' => $seller_center_banners,
        ])->layout('components.layouts.restaurant-layout');
    }
}
