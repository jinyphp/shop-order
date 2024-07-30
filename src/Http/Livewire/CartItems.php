<?php

namespace Jiny\Shop\Order\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CartItems extends Component
{
    public $cartItems = [];
    public $viewfile;

    public function mount()
    {
        $this->loadCartItems();
        if(!$this->viewfile){
            $this->viewfile = 'jiny-shop-order::cartzilla.cart.cart-items';
        }
    }

    public function loadCartItems()
    {
        $email = 'aaa';
        $this->cartItems = DB::table('shop_cart')
            ->where('email', $email)
            ->get()
            ->toArray();
    }

    public function removeFromCart($id)
    {
        DB::table('shop_cart')
            ->where('id', $id)
            ->delete();

        $this->loadCartItems();
        $this->dispatch('cartUpdated');
    }

    public function incrementQuantity($id)
    {
        DB::table('shop_cart')->where('id', $id)->increment('quantity');
        $this->loadCartItems();
        $this->dispatch('cartUpdated');
    }

    public function decrementQuantity($id)
    {
        $item = DB::table('shop_cart')->where('id', $id)->first();
        if ($item->quantity > 1) {
            DB::table('shop_cart')->where('id', $id)->decrement('quantity');
            $this->loadCartItems();
            $this->dispatch('cartUpdated');
        }
    }

    public function updateQuantity($id, $quantity)
    {
        if ($quantity > 0) {
            DB::table('shop_cart')->where('id', $id)->update(['quantity' => $quantity]);
            $this->loadCartItems();
            $this->dispatch('cartUpdated');
        }
    }

    public function removeItem($id)
    {
        DB::table('shop_cart')->where('id', $id)->delete();
        $this->loadCartItems();
        $this->dispatch('cartUpdated');
    }

    public function clearCart()
    {
        DB::table('shop_cart')->where('email', 'aaa')->delete();
        $this->loadCartItems();
        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        return view($this->viewfile, [
            'cartItems' => $this->cartItems
        ]);
    }
}
