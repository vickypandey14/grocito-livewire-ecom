<?php

namespace App\Livewire\Electronics;

use App\Models\Product;
use App\Models\Seller;
use Livewire\Component;

class ElectronicProductDetail extends Component
{
    public $seller_id;
    public $productId;
    public $product;

    public $images = [];
    public $colors = [];
    public $bestSellingProducts = [];

    public function mount($seller_id, $productId)
    {
        $this->seller_id = $seller_id;
        $this->product_id = $productId;
        $this->product = Product::where('seller_id', $this->seller_id)
                                ->with('product_stock', 'category')
                                ->findOrFail($this->productId);

        if ($this->product->Image) {
            $this->images = json_decode($this->product->Image, true) ?? [$this->product->Image];
        }

        $this->colors = $this->product->product_stock->where('product_id', $this->product_id)->pluck('color')->unique()->toArray();

        $this->bestSellingProducts = Product::where('seller_id', $this->seller_id)
                                        ->orderBy('no_of_sale', 'desc')
                                        ->take(10)
                                        ->get();
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

        // dd($this->colors);

        return view('livewire.electronics.electronic-product-detail', [
            'product' => $this->product,
            'images' => $this->images,
            'colors' => $this->colors,
            'bestSellingProducts' => $this->bestSellingProducts,
        ])->layout('components.layouts.electronics-product-detail-layout');
    }
}