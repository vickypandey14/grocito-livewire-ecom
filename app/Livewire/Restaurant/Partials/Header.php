<?php

namespace App\Livewire\Restaurant\Partials;

use Livewire\Component;
use App\Models\Seller;

class Header extends Component
{
    public $seller;

    public function mount()
    {
        $this->fetchSellerDetails();    
    }

    public function fetchSellerDetails()
    {
        $sellerId = 17;
        
        // $sellerId = $this->sellerId;

        $this->seller = Seller::find($sellerId);
    }

    public function render()
    {
        return view('livewire.restaurant.partials.header', [
            'seller' => $this->seller,
        ]);
    }
}
