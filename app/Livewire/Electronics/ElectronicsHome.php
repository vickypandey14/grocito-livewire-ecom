<?php

namespace App\Livewire\Electronics;

use App\Models\Category;
use App\Models\Product;
use App\Models\Seller;
use App\Models\UserBanner;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Electronics & Accessories Home - Grocito')]


class ElectronicsHome extends Component
{
    public $seller_id;

    public function mount($seller_id)
    {
        $this->seller_id = $seller_id;
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

        if ($seller && $seller->business_category && $seller->business_category->name == 'Electronics & Accessories')
        {

            $products = Product::where('seller_id', $this->seller_id)->with('category')->get();

            $categories = Category::where('seller_id', $this->seller_id)
                ->where('status', 'active')
                ->where('delete_status', 0)
                ->get();

            $seller_banner = UserBanner::where('seller_id', $this->seller_id)->where('status', 'active')->get();


            $best_selling_products = Product::where('seller_id', $this->seller_id)
                                            ->orderBy('no_of_sale', 'desc')
                                            ->where('status', 'active')
                                            ->with(['category', 'product_stock'])
                                            ->get();

            $trending_products = Product::where('seller_id', $this->seller_id)
                                            ->where('trending', 1)
                                            ->where('status', 'active')
                                            ->with(['category', 'product_stock'])
                                            ->get();
        }
        else
        {
            abort(404);
        }

        // echo '<pre>';
        // echo json_encode($best_selling_products, JSON_PRETTY_PRINT);
        // echo '</pre>';
        // dd();

        return view('livewire.electronics.electronics-home', [
            'products' => $products,
            'categories' => $categories,
            'seller_banner' => $seller_banner,
            'trending_products' => $trending_products,
            'best_selling_products' => $best_selling_products,
        ])->layout('components.layouts.electronics-layout');
    }
}
