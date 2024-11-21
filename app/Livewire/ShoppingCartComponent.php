<?php

namespace App\Livewire;

use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShoppingCartComponent extends Component
{
    public $cartItems = [];

    public $subtotal = 0;

    public $vat = 0;

    public $discount = 0;

    public $total = 0;

    public $title = '';

    // this is a listener that will listen to the CartUpdated event and call the render method
    public $listeners = [
        'CartUpdated' => 'render'
    ];

    public function mount()
    {
        $this->cartItems = $this->getCartItems();
        $this->calculateTotals();
    }

    // calculating the other details of the cart
    public function calculateTotals()
    {
        $this->subtotal = $this->cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
        $this->vat = $this->subtotal * 0.1; // 10% VAT example
        $this->discount = 5; // Apply your discount logic here
        $this->total = $this->subtotal + $this->vat - $this->discount;
    }

    // get the details of the shopping cart items
    public function getCartItems()
    {
        return ShoppingCart::with('product')
            ->where('user_id', Auth::id())
            ->get();
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

    // updating the cart functionality
    public function updateQuantity($cartItemId, $quantity)
    {
        $cartItem = ShoppingCart::find($cartItemId);
        if ($cartItem) {
            $cartItem->quantity = $quantity;
            $cartItem->save();
            // $this->flashMessage('Item quantity updated successfully', 'success');
            $this->dispatch('CartUpdated');
        }
    }

    // removing item from the cart
    public function removeItem($cartItemId)
    {
        $cartItem = ShoppingCart::find($cartItemId);
        if ($cartItem) {
            $cartItem->delete();
            // $this->flashMessage('Item removed from cart successfully', 'success');
            $this->dispatch('CartUpdated');
        }
    }

    public function render()
    {
        $this->cartItems = $this->getCartItems();
        $this->calculateTotals();

        return view('livewire.shopping-cart-component', [
            'cartItems' => $this->cartItems,
        ])->title('Shopping Cart');
    }
}
