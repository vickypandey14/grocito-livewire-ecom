<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class Navbar extends Component
{
    public $productTypesWithCategories = [];

    public function mount()
    {
        $productTypes = Product::distinct('product_type')->pluck('product_type');

        foreach ($productTypes as $productType) {
            $categories = Category::whereIn('id', Product::where('product_type', $productType)->pluck('categoryId'))->get();
            $this->productTypesWithCategories[$productType] = $categories;
        }
    }

    public function render()
    {
        return view('livewire.partials.navbar', [
            'productTypesWithCategories' => $this->productTypesWithCategories,
        ]);
    }
}
