<?php

namespace Jiny\Shop\Order\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PaymentSelection extends Component
{

    public $paymentMethods;
    public $selectedPaymentMethod;

    public function mount()
    {
        $this->loadPaymentMethods();
    }

    public function loadPaymentMethods()
    {
        $this->paymentMethods = DB::table('shop_payment')
            ->where('enable', 1) ## 활성화 여부가 1인 결제수단 가져옴
            ->get();
    }

    public function selectPaymentMethod($id)
    {
        $this->selectedPaymentMethod = $id;
    }

    public function render()
    {
        return view('jiny-shop-order::shop.order.payment-selection', [
            'paymentMethods' => $this->paymentMethods,
            'selectedPaymentMethod' => $this->selectedPaymentMethod,
        ]);
    }
}
