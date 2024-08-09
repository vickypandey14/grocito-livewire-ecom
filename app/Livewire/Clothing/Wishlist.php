<?php

namespace App\Livewire\Clothing;

use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist as WishlistModel;
use App\Models\Product;

#[Title('My WishList - Grocito')]

class Wishlist extends Component
{
    public $wishlistItems;

    public function mount()
    {
        // $this->wishlistItems = WishlistModel::where('user_id', Auth::id())->with('product')->get();

        $this->wishlistItems = WishlistModel::where('user_id', 1)->with('product')->get();
    }

    public function calculateDiscount($price, $mrp)
    {
        if ($mrp > 0 && $price < $mrp) 
        {
            return round((($mrp - $price) / $mrp) * 100);
        }
        return 0;
    }

    public function removeWishlistItem($productId)
    {
        $userId = 1;
        // $userId = Auth::id();

        WishlistModel::where('user_id', $userId)->where('product_id', $productId)->delete();

        $this->wishlistItems = $this->wishlistItems->filter(function ($item) use ($productId) {
            return $item->product_id != $productId;
        });
    }

    public function render()
    {
        return view('livewire.clothing.wishlist', [
            'wishlistItems' => $this->wishlistItems
        ]);
    }
}