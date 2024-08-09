<?php

use App\Livewire\Electronics\ElectronicProductDetail;
use App\Livewire\Electronics\ElectronicProductsByCategory;
use App\Livewire\Electronics\ElectronicsHome;
use App\Livewire\Clothing\HomePage;
use App\Livewire\Clothing\ProductsByCategoryPage;
use App\Livewire\Restaurant\RestaurantHome;
use App\Livewire\Restaurant\RestaurantMenu;
use App\Livewire\Restaurant\RestaurantOffer;
use App\Livewire\Clothing\Wishlist;
use App\Livewire\Clothing\ProductDetailPage;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });


// Clothing Category


Route::get('/{seller_id}', HomePage::class)->name('index');

Route::get('/{seller_id}/{category_id}', ProductsByCategoryPage::class)->name('list-products-by-category');

Route::get('/page/product/detail/{productId}', ProductDetailPage::class)->name('product-details');

Route::get('/page/my-wishlist/detail', Wishlist::class)->name('list-wishlist');


// Restaurant Category


Route::get('/shop/restaurant/{seller_id}', RestaurantHome::class)->name('restaurant-shop-home');

Route::get('/shop/restaurant/{seller_id}/menu', RestaurantMenu::class)->name('restaurant-shop-menu');

Route::get('/shop/restaurant/{seller_id}/offers', RestaurantOffer::class)->name('restaurant-shop-offer');


// Electronics and Accessories Category


Route::get('/shop/electronics/{seller_id}', ElectronicsHome::class)->name('electronics-shop-home');

Route::get('/shop/electronics/{seller_id}/category/{category_id}', ElectronicProductsByCategory::class)->name('electronics-products-by-category');

Route::get('/shop/electronics/{seller_id}/product/detail/{productId}', ElectronicProductDetail::class)->name('electronic-product-details');
