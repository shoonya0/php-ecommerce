<?php

namespace App\Livewire;

use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ItemCard extends Component
{

    public $product;

    public function mount($product_details)
    {
        $this->product = $product_details;
    }

    public function placeholder()
    {
        return view('livewire.skeleton.item-skeleton');
    }

    // adding item to the cart
    public function addToCart($productId)
    {
        $cartItem = ShoppingCart::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            ShoppingCart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => 1
            ]);
        }
        $this->dispatch('CartUpdated');
    }

    public function render()
    {
        return view('livewire.item-card');
    }
}
