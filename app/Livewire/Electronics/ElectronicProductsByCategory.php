<?php

namespace App\Livewire\Electronics;

use App\Models\Category;
use App\Models\Product;
use App\Models\Seller;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Electronics Products by Category - Grocito')]

class ElectronicProductsByCategory extends Component
{
    public $seller_id;
    public $category_id;

    public function mount($seller_id, $category_id)
    {
        $this->seller_id = $seller_id;
        $this->category_id = $category_id;
    }

    public function calculateDiscount($price, $mrp)
    {
        if ($mrp > 0 && $price < $mrp) {
            return round((($mrp - $price) / $mrp) * 100);
        }
        return 0;
    }

    public function calculateDiscountAmount($price, $mrp)
    {
        if ($mrp > 0 && $price < $mrp) {
            return $mrp - $price;
        }
        return 0;
    }

    public function render()
    {
        $seller = Seller::find($this->seller_id);

        if (!$seller || $seller->business_category->name != 'Electronics & Accessories') {
            abort(404);
        }
        
        $category = Category::findOrFail($this->category_id);

        $products = Product::where('seller_id', $this->seller_id)
            ->where('categoryId', $this->category_id)
            ->where('status', 'active')
            ->with(['category', 'product_stock'])
            ->get();

        return view('livewire.electronics.electronic-products-by-category', [
            'products' => $products,
            'category' => $category,
        ])->layout('components.layouts.electronics-layout');
    }
}
