<?php

namespace Jiny\Shop\Order\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CartOffcanvas extends Component
{
    public $cartItems = [];
    public $total = 0;
    public $subtotal = 0;
    public $tax = 0;
    public $viewfile;

    protected $listeners = ['cartUpdated' => 'loadCartItems'];

    public function mount()
    {
        $this->loadCartItems();
        $this->calculateSummary();
        if(!$this->viewfile){
            $this->viewfile = 'jiny-shop-order::cartzilla.cart.cart-offcanvas';
        }
    }

    public function loadCartItems()
    {
        $email = 'aaa'; // 현재 사용자의 이메일 주소를 사용해야 합니다.
        $this->cartItems = DB::table('shop_cart')
            ->where('email', $email)
            ->get()
            ->toArray();
        $this->calculateSummary();
    }

    public function calculateSummary()
    {
        $this->subtotal = array_sum(array_map(function ($item) {
            return $item->price * $item->quantity;
        }, $this->cartItems));

        $this->tax = $this->subtotal * 0.1; // 예시로 세금을 10%로 계산
        $this->total = $this->subtotal + $this->tax;
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
            'cartItems' => $this->cartItems,
            'total' => $this->total,
            'subtotal' => $this->subtotal,
            'tax' => $this->tax
        ]);
    }
}
