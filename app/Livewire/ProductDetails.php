<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductDetails extends Component
{
    public $product;

    public function mount($product_id)
    {
        $this->product = Product::find($product_id);
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
        return view('livewire.product-details');
    }
}
