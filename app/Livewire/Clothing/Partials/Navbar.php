<?php

namespace App\Livewire\Clothing\Partials;

use App\Models\Seller;
use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class Navbar extends Component
{
    public $seller;

    public $productTypesWithCategories = [];

    public function mount()
    {
        $productTypes = Product::distinct('product_type')->pluck('product_type');

        foreach ($productTypes as $productType) {
            $categories = Category::whereIn('id', Product::where('product_type', $productType)->pluck('categoryId'))->get();
            $this->productTypesWithCategories[$productType] = $categories;
        }

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
        return view('livewire.clothing.partials.navbar', [
            'seller' => $this->seller,
            'productTypesWithCategories' => $this->productTypesWithCategories,
        ]);
    }
}
