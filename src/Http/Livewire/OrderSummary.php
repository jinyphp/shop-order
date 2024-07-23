<?php

namespace Jiny\Shop\Order\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class OrderSummary extends Component
{
    public $total = 0;
    public $subtotal = 0;
    public $tax = 0;
    public $saving = 0;

    public $viewfile;

    public function mount()
    {
        $this->calculateSummary();
        if(!$this->viewfile){
            $this->viewfile = 'jiny-shop-order::shop.cart.order-summary';
        }
    }

    public function calculateSummary()
    {
        $email = 'aaa';
        $cartItems = DB::table('shop_cart')
            ->where('email', $email)
            ->get();

        $this->subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        $this->saving = $cartItems->sum(function ($item) {
            return $item->discount ?? 0;
        });

        $this->tax = $this->subtotal * 0.1; // 예시로 세금을 10%로 계산
        $this->total = $this->subtotal - $this->saving + $this->tax;
    }

    public function render()
    {
        return view($this->viewfile);
    }
}
