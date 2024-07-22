<?php

namespace Jiny\Shop\Order\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AddressForm extends Component
{
    public $country, $addr1, $addr2, $city, $province, $zipcode;

    protected $rules = [
        'country' => 'required|string|max:255',
        'addr1' => 'required|string|max:255',
        'addr2' => 'nullable|string|max:255',
        'city' => 'required|string|max:255',
        'province' => 'required|string|max:255',
        'zipcode' => 'required|string|max:255',
    ];

    public function submit()
    {
        $this->validate();

        // 여기 수정해야한다. user에서 불러오게?
        $user = User::where('email', 'aaa')->first();

        UserAddress::create([
            'user_id' => $user->id,
            'email' => $user->email,
            'country' => $this->country,
            'addr1' => $this->addr1,
            'addr2' => $this->addr2,
            'city' => $this->city,
            'province' => $this->province,
            'zipcode' => $this->zipcode,
        ]);

        $this->reset();

        // Emit an event to update the address list
        $this->emit('addressAdded');
    }

    public function render()
    {
        return view('jiny-shop-order::shop.order.address-form');
    }
}
