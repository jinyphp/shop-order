<?php

namespace Jiny\Shop\Order\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AddressList extends Component
{

    public $addresses;

    public function mount()
    {
        $this->loadAddresses();
    }

    public function loadAddresses()
    {
        $email = 'aaa';
        $this->addresses = DB::table('user_address')
            ->where('email', $email)
            ->get();
    }

    public function render()
    {
        return view('jiny-shop-order::shop.order.address-list', [
            'addresses' => $this->addresses
        ]);
    }
}
