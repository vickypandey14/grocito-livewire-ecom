<?php

use App\Livewire\HomePage;
use App\Livewire\ProductsByCategoryPage;
use App\Livewire\Wishlist;
use App\Livewire\ProductDetailPage;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/{seller_id}', HomePage::class)->name('index');

Route::get('/{seller_id}/{category_id}', ProductsByCategoryPage::class)->name('list-products-by-category');

Route::get('/page/product/detail/{productId}', ProductDetailPage::class)->name('product-details');

Route::get('/page/my-wishlist/detail', Wishlist::class)->name('list-wishlist');
