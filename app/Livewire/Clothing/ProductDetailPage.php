<?php

namespace App\Livewire\Clothing;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Clothing Product Detail - Grocito')]

class ProductDetailPage extends Component
{
    public $productId;
    public $product;
    public $trendingProducts;

    public function mount($productId)
    {
        $this->productId = $productId;

        $this->product = Product::with('product_stock', 'category')->find($this->productId);

        if (!$this->product) {
            abort(404);
        }

        $this->trendingProducts = Product::where('categoryId', $this->product->categoryId)
                                         ->where('id', '!=', $this->productId)
                                         ->limit(10)
                                         ->get();
    }
    
    // Function to calculate discount

    public function calculateDiscount($price, $mrp)
    {
        if ($mrp > 0 && $price < $mrp) 
        {
            return round((($mrp - $price) / $mrp) * 100);
        }
        return 0;
    }

    public function render()
    {
        return view('livewire.clothing.product-detail-page', [
            'product' => $this->product,
            'trendingProducts' => $this->trendingProducts,
        ])->layout('components.layouts.product-detail');
    }
}