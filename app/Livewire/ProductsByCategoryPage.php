<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Wishlist as WishlistModel;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

#[Title('Product Listing By Category - Grocito')]

class ProductsByCategoryPage extends Component
{
    use WithPagination;

    public $seller_id;
    public $category_id;
    public $category_name;
    public $subCategories;
    public $brands;

    #[Url]
    public $selected_sub_categories = [];

    #[Url]
    public $selected_sizes = [];

    #[Url]
    public $selected_brands = [];

    #[Url]
    public $min_price;

    #[Url]
    public $max_price;

    public $wishlist;

    public function mount($seller_id, $category_id)
    {
        $this->seller_id = $seller_id;
        $this->category_id = $category_id;

        $category = Category::find($category_id);

        if (!$category) {
            abort(404);
        }
        
        $this->category_name = $category->CategoryName;
        $this->subCategories = SubCategory::where('ParentCategoryId', $this->category_id)->get();
        $this->brands = Product::where('categoryId', $this->category_id)
                                ->distinct()
                                ->pluck('brand');
        
        $this->wishlist = WishlistModel::where('user_id', Auth::id())->pluck('product_id')->toArray();
    }

    public function calculateDiscount($price, $mrp)
    {
        if ($mrp > 0 && $price < $mrp) {
            return round((($mrp - $price) / $mrp) * 100);
        }
        return 0;
    }

    public function toggleSubCategory($subCategoryId)
    {
        if (in_array($subCategoryId, $this->selected_sub_categories)) {
            $this->selected_sub_categories = array_filter(
                $this->selected_sub_categories,
                fn($id) => $id !== $subCategoryId
            );
        } else {
            $this->selected_sub_categories[] = $subCategoryId;
        }
    }

    public function clearFilters()
    {
        $this->selected_sub_categories = [];
        $this->selected_sizes = [];
        $this->selected_brands = [];
        $this->min_price = null;
        $this->max_price = null;
    }

    public function filterBySize($size)
    {
        if (in_array($size, $this->selected_sizes)) {
            $this->selected_sizes = array_filter(
                $this->selected_sizes,
                fn($s) => $s !== $size
            );
        } else {
            $this->selected_sizes[] = $size;
        }
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
        $this->min_price = $this->min_price ?: null;
        $this->max_price = $this->max_price ?: null;
    }

    public function toggleWishlist($productId)
    {
        $userId = 1;
        // $userId = Auth::id();        

        if (in_array($productId, $this->wishlist)) {
            WishlistModel::where('user_id', $userId)->where('product_id', $productId)->delete();
            $this->wishlist = array_filter($this->wishlist, function($id) use ($productId) {
                return $id != $productId;
            });
        } else {
            WishlistModel::create(['user_id' => $userId, 'product_id' => $productId]);
            $this->wishlist[] = $productId;
        }
    }

    public function render()
    {
        $query = Product::where('seller_id', $this->seller_id)
                        ->where('categoryId', $this->category_id)
                        ->with('product_stock', 'category');

        if (!empty($this->selected_sub_categories)) 
        {
            $query->whereIn('subCategoryId', $this->selected_sub_categories);
        }

        if (!empty($this->selected_sizes)) 
        {
            $query->whereHas('product_stock', function($q) {
                $q->whereIn('s_w', $this->selected_sizes);
            });
        }

        if (!empty($this->selected_brands)) 
        {
            $query->whereIn('brand', $this->selected_brands);
        }

        if (!is_null($this->min_price) && !is_null($this->max_price)) 
        {
            $query->whereHas('product_stock', function($q) {
                $q->whereBetween('price', [$this->min_price, $this->max_price]);
            });
        } elseif (!is_null($this->min_price)) 
        {
            $query->whereHas('product_stock', function($q) {
                $q->where('price', '>=', $this->min_price);
            });
        } elseif (!is_null($this->max_price)) 
        {
            $query->whereHas('product_stock', function($q) {
                $q->where('price', '<=', $this->max_price);
            });
        }

        $products = $query->get();

        return view('livewire.products-by-category-page', [
            'products' => $products,
            'category_name' => $this->category_name,
            'subCategories' => $this->subCategories,
            'sizes' => ['S', 'M', 'L', 'XL', 'XXL'],
            'brands' => $this->brands,
            'wishlist' => $this->wishlist,
        ]);
    }
}
