<?php

namespace App\Livewire\Restaurant;

use App\Models\Seller;
use App\Models\Product;
use App\Models\Category;
use App\Models\UserBanner;
use App\Models\SellerBanner;
use Livewire\Component;

class RestaurantHome extends Component
{
    public $seller_id;
    public $selectedProduct;
    public $cartProduct;
    public $quantity = 1;
    public $totalPrice;
    public $selectedCategory;
    public $products = [];
    public $categories;
    public $addons = [];
    public $selectedAddons = [];

    public function mount($seller_id)
    {
        $this->seller_id = $seller_id;
        $this->selectedProduct = null;
        $this->cartProduct = null;
        $this->totalPrice = 0;
        $this->categories = Category::where('seller_id', $this->seller_id)
            ->where('status', 'active')
            ->where('delete_status', 0)
            ->get();
        $this->selectedCategory = $this->categories->first();
        $this->loadProducts();
    }

    public function loadProducts()
    {
        if ($this->selectedCategory) {
            $this->products = Product::where('seller_id', $this->seller_id)
                ->where('categoryId', $this->selectedCategory->id)
                ->where('status', 'active')
                ->get();
        } else {
            $this->products = [];
        }
    }

    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $this->categories->find($categoryId);
        $this->loadProducts();
    }

    public function selectProduct($productId)
    {
        $this->selectedProduct = Product::with('product_stock')->find($productId);
    }

    public function addToCart($productId)
    {
        $this->cartProduct = Product::with('product_stock')->find($productId);
        $this->quantity = 1;
        $this->totalPrice = $this->cartProduct->product_stock->price;
        $this->addons = [];
        $this->selectedAddons = [];

        if ($this->cartProduct->add_on_name && $this->cartProduct->add_on_price) {
            $addOnNames = json_decode($this->cartProduct->add_on_name, true);
            $addOnPrices = json_decode($this->cartProduct->add_on_price, true);

            foreach ($addOnNames as $index => $name) {
                $this->addons[] = [
                    'name' => $name,
                    'price' => $addOnPrices[$index]
                ];
            }
        }
    }

    public function incrementQuantity()
    {
        $this->quantity++;
        $this->updatedQuantity();
    }

    public function decrementQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
            $this->updatedQuantity();
        }
    }

    public function updatedQuantity()
    {
        $basePrice = $this->cartProduct->product_stock->price * $this->quantity;
        $addonPrice = array_sum(array_column($this->selectedAddons, 'price')) * $this->quantity;
        $this->totalPrice = $basePrice + $addonPrice;
    }

    public function toggleAddon($addonName, $addonPrice)
    {
        if (isset($this->selectedAddons[$addonName])) {
            unset($this->selectedAddons[$addonName]);
        } else {
            $this->selectedAddons[$addonName] = ['name' => $addonName, 'price' => $addonPrice];
        }
        $this->updatedQuantity();
    }

    public function render()
    {
        $seller = Seller::find($this->seller_id);

        if ($seller && $seller->business_category && $seller->business_category->name == 'Restaurants and Cafe') 
        {
            $products = Product::where('seller_id', $this->seller_id)->with('category')->get();

            $categories = Category::where('seller_id', $this->seller_id)
                ->where('status', 'active')
                ->where('delete_status', 0)
                ->get();

            $seller_banner = SellerBanner::where('seller_id', $this->seller_id)
                                        ->where('position', 'Top')
                                        ->where('status', 'active')
                                        ->get();

            $seller_center_banners = SellerBanner::where('seller_id', $this->seller_id)
                                            ->where('status', 'active')
                                            ->where('position', 'Center')
                                            ->get(); 

            $featured_products = Product::where('seller_id', $this->seller_id)
                                            ->where('featured', 1)
                                            ->where('status', 'active')
                                            ->with(['category', 'product_stock'])
                                            ->get();

            $popular_products = Product::where('seller_id', $this->seller_id)
                                            ->orderBy('no_of_sale', 'desc')
                                            ->where('status', 'active')
                                            ->with(['category', 'product_stock'])
                                            ->get();
        }
        else 
        {
            abort(404);
        }

        // echo '<pre>';
        // echo json_encode($seller_center_banners, JSON_PRETTY_PRINT);
        // echo '</pre>';
        // dd();

        return view('livewire.restaurant.restaurant-home', [
            'products' => $products,
            'categories' => $categories,
            'seller_banner' => $seller_banner,
            'featured_products' => $featured_products,
            'popular_products' => $popular_products,
            'selectedCategory' => $this->selectedCategory,
            'seller_center_banners' => $seller_center_banners,
        ])->layout('components.layouts.restaurant-layout');
    }
}