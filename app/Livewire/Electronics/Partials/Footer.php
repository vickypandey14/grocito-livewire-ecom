<?php

namespace App\Livewire\Electronics\Partials;

use Livewire\Component;
use App\Models\Seller;

class Footer extends Component
{
    public $seller;

    public function mount()
    {
        $this->fetchSellerDetails();
    }

    public function fetchSellerDetails()
    {
        $sellerId = 16;

        $this->seller = Seller::find($sellerId);
    }

    public function render()
    {
        return view('livewire.electronics.partials.footer', [
            'seller' => $this->seller,
        ]);
    }
}
