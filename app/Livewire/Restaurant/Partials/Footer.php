<?php

namespace App\Livewire\Restaurant\Partials;

use App\Models\Seller;
use Livewire\Component;

class Footer extends Component
{
    public $seller;
    
    public function mount()
    {
        $this->fetchSellerDetails();
    }

    public function fetchSellerDetails()
    {
        $sellerId = 17;

        $this->seller = Seller::find($sellerId);

        // $this->seller = Seller::with('user')->find($sellerId);

        // dd($this->seller);
    }

    public function render()
    {
        return view('livewire.restaurant.partials.footer', [
            'seller' => $this->seller
        ]);
    }
}
