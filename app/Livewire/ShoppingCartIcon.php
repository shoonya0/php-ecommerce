<?php

namespace App\Livewire;

use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShoppingCartIcon extends Component
{
    public $cartCount = 0;

    // this is a listener that will listen to the CartUpdated event and call the updateCartCount method
    protected $listeners = [
        'CartUpdated' => 'updateCartCount'
    ];

    public function mount()
    {
        $this->updateCartCount();
    }

    public function updateCartCount()
    {
        // get the count from shopping cart table
        // here we are getting the user id from the auth user by using Auth::id() which is a helper function that returns 
        // the id of the authenticated user and then we are using that id to get the count of the items in the shopping cart table
        $this->cartCount = ShoppingCart::where('user_id', Auth::id())->sum('quantity');
    }


    public function render()
    {
        return view('livewire.shopping-cart-icon');
    }
}
