<?php

namespace App\Livewire\Restaurant;

use App\Models\Category;
use App\Models\Product;
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
        $this->products = Product::where('categoryId', $categoryId)->with('product_stock')->get();
    }

    public function addToCart($productId)
    {
        $this->cartProduct = Product::with('product_stock')->find($productId);
        $this->quantity = 1;
        $this->totalPrice = $this->cartProduct->product_stock->price;

        $this->addons = [];
        
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
        $this->totalPrice = $this->cartProduct->product_stock->price * $this->quantity;
    }

    public function render()
    {
        return view('livewire.restaurant.restaurant-menu')->layout('components.layouts.restaurant-layout');
    }
}