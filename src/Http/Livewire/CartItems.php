<?php

namespace Jiny\Shop\Order\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CartItems extends Component
{
    public $cartItems;

    public function mount()
    {
        $this->loadCartItems();
    }

    public function loadCartItems()
    {
        $email = 'aaa';
        $this->cartItems = DB::table('shop_cart')
            ->where('email', $email)
            ->get();
    }

    public function removeFromCart($id)
    {
        DB::table('shop_cart')
            ->where('id', $id)
            ->delete();

        $this->loadCartItems();
    }

    public function incrementQuantity($id)
    {
        DB::table('shop_cart')->where('id', $id)->increment('quantity');
        $this->loadCartItems();
    }

    public function decrementQuantity($id)
    {
        $item = DB::table('shop_cart')->where('id', $id)->first();
        if ($item->quantity > 1) {
            DB::table('shop_cart')->where('id', $id)->decrement('quantity');
            $this->loadCartItems();
        }
    }

    public function updateQuantity($id, $quantity)
    {
        if ($quantity > 0) {
            DB::table('shop_cart')->where('id', $id)->update(['quantity' => $quantity]);
            $this->loadCartItems();
        }
    }

    public function removeItem($id)
    {
        DB::table('shop_cart')->where('id', $id)->delete();
        $this->loadCartItems();
    }

    public function render()
    {
        return view('jiny-shop-order::shop.cart.cart-items', [
            'cartItems' => $this->cartItems
        ]);
    }
}
