<?php

namespace App\Livewire;


use App\Models\UserBanner;
use App\Models\Product;
use App\Models\BusinessCategory;
use App\Models\Category;
use App\Models\Seller;
use App\Models\Wishlist as WishlistModel;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

#[Title('Clothing Category Template Home - Grocito')]

class HomePage extends Component
{
    public $seller_id;
    
    public $wishlist;

    public function mount($seller_id)
    {
        $this->seller_id = $seller_id;

        $this->wishlist = WishlistModel::where('user_id', 1)->pluck('product_id')->toArray();

        // $this->wishlist = WishlistModel::where('user_id', Auth::id())->pluck('product_id')->toArray();
    }

    public function calculateDiscount($price, $mrp)
    {
        if ($mrp > 0 && $price < $mrp) {
            return round((($mrp - $price) / $mrp) * 100);
        }
        return 0;
    }

    public function toggleWishlist($productId)
    {
        // $userId = Auth::id();
        $userId = 1;

        if (in_array($productId, $this->wishlist)) {

            WishlistModel::where('user_id', $userId)->where('product_id', $productId)->delete();
            $this->wishlist = array_filter($this->wishlist, function ($id) use ($productId) {
                return $id != $productId;
            });

        } else {
            WishlistModel::create(['user_id' => $userId, 'product_id' => $productId]);
            $this->wishlist[] = $productId;
        }
    }

    public function render()
    {
        $seller = Seller::find($this->seller_id);

        if ($seller && $seller->business_category && $seller->business_category->name == 'Clothing Stores') {

            $products = Product::where('seller_id', $this->seller_id)->with('category')->get();
            
            $categories = $products->pluck('category')->unique('id');

            $new_arrival_products = Product::where('seller_id', $this->seller_id)
                                            ->where('new_arrival', 1)
                                            ->with(['category', 'product_stock'])
                                            ->get();
            
            $men_best_selling_products = Product::where('seller_id', $this->seller_id)
                                            ->where('product_type', 'men')
                                            ->orderBy('no_of_sale', 'desc')
                                            ->take(12)
                                            ->with(['category', 'product_stock'])
                                            ->get();

            $kids_best_selling_products = Product::where('seller_id', $this->seller_id)
                                             ->where('product_type', 'kids')
                                             ->orderBy('no_of_sale', 'desc')
                                             ->take(12)
                                             ->with(['category', 'product_stock'])
                                             ->get();

            $womens_best_selling_products = Product::where('seller_id', $this->seller_id)
                                               ->where('product_type', 'women')
                                               ->orderBy('no_of_sale', 'desc')
                                               ->take(12)
                                               ->with(['category', 'product_stock'])
                                               ->get();
                                         

            $seller_banner = UserBanner::where('seller_id', $this->seller_id)->where('status', 'active')->get();

        } else {
            $products = collect();
            $categories = collect();
            $new_arrival_products = collect();
            $men_best_selling_products = collect();
            $kids_best_selling_products = collect();
            $womens_best_selling_products = collect();
            $seller_banner = collect();
        }

        return view('livewire.home-page', [
            'products' => $products,
            'categories' => $categories,
            'new_arrival_products' => $new_arrival_products,
            'men_best_selling_products' => $men_best_selling_products,
            'kids_best_selling_products' => $kids_best_selling_products,
            'womens_best_selling_products' => $womens_best_selling_products,
            'seller_banner' => $seller_banner,
            'wishlist' => $this->wishlist,
        ]);
    }
}