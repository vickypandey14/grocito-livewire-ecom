<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use App\Models\Seller;

class Footer extends Component
{
    public $seller;

    // public $sellerId;

    public function mount()
    {
        // $this->sellerId = $sellerId;

        $this->fetchSellerDetails();
    }

    public function fetchSellerDetails()
    {
        $sellerId = 1;
        
        // $sellerId = $this->sellerId;

        $this->seller = Seller::find($sellerId);
    }

    public function render()
    {
        return view('livewire.partials.footer', [
            'seller' => $this->seller,
        ]);
    }
}