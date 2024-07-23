<?php

namespace Jiny\Shop\Order\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class OrderItems extends Component
{
    public $orderItems;

    public function mount()
    {
        $this->loadOrderItems();
    }

    public function loadOrderItems()
    {
        $this->orderItems = DB::table('shop_checkout_items')
            ->where('orderidx', '1234')
            ->get();
    }

    public function render()
    {
        return view('jiny-shop-order::shop.order.order-items', [
            'orderItems' => $this->orderItems
        ]);
    }
}
