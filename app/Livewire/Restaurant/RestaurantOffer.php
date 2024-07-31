<?php

namespace App\Livewire\Restaurant;

use Livewire\Component;

class RestaurantOffer extends Component
{
    public function render()
    {
        return view('livewire.restaurant.restaurant-offer')->layout('components.layouts.restaurant-layout');
    }
}
