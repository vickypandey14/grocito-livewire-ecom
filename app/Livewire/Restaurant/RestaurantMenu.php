<?php

namespace App\Livewire\Restaurant;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RestaurantMenu extends Component
{
    public $seller_id;
    public $categories;
    public $selectedCategory;
    public $products = [];
    public $cartProduct;
    public $quantity = 1;
    public $totalPrice;
    public $addons = [];
    public $selectedAddons = [];
    public $sizes = [];
    public $productType = null;

    public function mount($seller_id)
    {
        $this->seller_id = $seller_id;

        $this->categories = Category::where('seller_id', $this->seller_id)
                                    ->where('status', 'active')
                                    ->where('delete_status', 0)
                                    ->get();

        $this->selectedCategory = null;
        $this->cartProduct = null;
        $this->totalPrice = 0;
    }

    public function selectCategory($categoryId)
    {
        $this->selectedCategory = Category::find($categoryId);
        $this->loadProducts();
    }

    public function loadProducts()
    {
        $query = Product::where('categoryId', $this->selectedCategory->id)
                        ->where('seller_id', $this->seller_id)
                        ->with('product_stock');

        if ($this->productType) {
            $query->where('product_type', $this->productType);
        }

        $this->products = $query->get();
    }

    public function filterByType($type)
    {
        $this->productType = $type;
        $this->loadProducts();
    }

    public function addToCart($productId)
    {
        $this->cartProduct = Product::with('product_stock')->find($productId);
        $this->quantity = 1;
        $this->totalPrice = $this->cartProduct->product_stock->price;
        $this->addons = [];
        $this->selectedAddons = [];
        $this->sizes = DB::table('product_stocks')
                        ->where('product_id', $productId)
                        ->pluck('s_w', 'id')
                        ->toArray();

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
        return view('livewire.restaurant.restaurant-menu')->layout('components.layouts.restaurant-layout');
    }
}