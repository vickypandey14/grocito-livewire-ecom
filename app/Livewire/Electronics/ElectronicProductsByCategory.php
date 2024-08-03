<?php

namespace App\Livewire\Electronics;

use App\Models\Category;
use App\Models\Product;
use App\Models\Seller;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Electronics Products by Category - Grocito')]

class ElectronicProductsByCategory extends Component
{
    use WithPagination;

    public $seller_id;
    public $category_id;

    #[Url]
    public $selected_brands = [];
    public $brands;
    public $min_price;
    public $max_price;

    public function mount($seller_id, $category_id)
    {
        $this->seller_id = $seller_id;
        $this->category_id = $category_id;
        
        $this->brands = Product::where('categoryId', $this->category_id)
                                ->distinct()
                                ->pluck('brand');
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

    public function clearFilters()
    {
        $this->selected_brands = [];
        $this->min_price = null;
        $this->max_price = null;
    }

    public function filterByBrand($brand)
    {
        if (in_array($brand, $this->selected_brands)) {
            $this->selected_brands = array_filter(
                $this->selected_brands,
                fn($b) => $b !== $brand
            );
        } else {
            $this->selected_brands[] = $brand;
        }
    }

    public function filterByPriceRange()
    {
        // This method can be left empty as the price filtering will be handled in the render method
    }

    public function render()
    {
        $seller = Seller::find($this->seller_id);

        if (!$seller || $seller->business_category->name != 'Electronics & Accessories') {
            abort(404);
        }
        
        $category = Category::findOrFail($this->category_id);

        $query = Product::where('seller_id', $this->seller_id)
                        ->where('categoryId', $this->category_id)
                        ->where('status', 'active')
                        ->with(['category', 'product_stock']);

        if (!empty($this->selected_brands)) 
        {
            $query->whereIn('brand', $this->selected_brands);
        }

        if ($this->min_price !== null) 
        {
            $query->whereHas('product_stock', function ($q) {
                $q->where('price', '>=', $this->min_price);
            });
        }

        if ($this->max_price !== null) 
        {
            $query->whereHas('product_stock', function ($q) {
                $q->where('price', '<=', $this->max_price);
            });
        }

        $products = $query->get();

        return view('livewire.electronics.electronic-products-by-category', [
            'products' => $products,
            'category' => $category,
            'brands' => $this->brands,
        ])->layout('components.layouts.electronics-layout');
    }
}