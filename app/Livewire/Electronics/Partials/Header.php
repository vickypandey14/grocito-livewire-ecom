<?php

namespace App\Livewire\Electronics\Partials;

use App\Models\Category;
use App\Models\Seller;
use Livewire\Component;

class Header extends Component
{
    public $seller;
    public $categories;

    public function mount()
    {
        $this->fetchSellerDetails();
        $this->fetchCategories();
    }

    public function fetchSellerDetails()
    {
        $sellerId = 16;
        $this->seller = Seller::find($sellerId);
    }

    public function fetchCategories()
    {
        if ($this->seller) {
            $this->categories = Category::where('seller_id', $this->seller->id)
                                        ->where('status', 'active')
                                        ->where('delete_status', 0)
                                        ->get();
        } else {
            $this->categories = collect();
        }
    }

    public function render()
    {
        return view('livewire.electronics.partials.header', [
            'seller' => $this->seller,
            'categories' => $this->categories,
        ]);
    }
}