<?php

namespace Jiny\Shop\Order\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CheckoutOrderSummary extends Component
{
    public $total = 0;
    public $subtotal = 0;
    public $tax = 0;
    public $saving = 0;

    public $cartItems = [];

    public function mount()
    {
        $this->calculateSummary();
    }

    public function calculateSummary()
    {
        $email = 'aaa';
        $this->cartItems = DB::table('shop_checkout_items')
            ->where('email', $email)
            ->get();

        $this->subtotal = $this->cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        $this->saving = $this->cartItems->sum(function ($item) {
            return $item->discount ?? 0;
        });

        $this->tax = $this->subtotal * 0.1; // 예시로 세금을 10%로 계산
        $this->total = $this->subtotal - $this->saving + $this->tax;
    }

    public function render()
    {
        return view('jiny-shop-order::cartzilla.checkout.order-summary', [
            'subtotal' => $this->subtotal,
            'saving' => $this->saving,
            'tax' => $this->tax,
            'total' => $this->total,
            'cartItems' => $this->cartItems,
        ]);
    }
}
