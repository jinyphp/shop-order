<?php

namespace Jiny\Shop\Order\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PaymentSelection extends Component
{

    public $paymentMethods;
    public $selectedPaymentMethod;
    public $viewfile;

    public function mount()
    {
        $this->loadPaymentMethods();
        if(!$this->viewfile){
            $this->viewfile = 'jiny-shop-order::cartzilla.checkout.payment-selection';
        }
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
        return view($this->viewfile, [
            'paymentMethods' => $this->paymentMethods,
            'selectedPaymentMethod' => $this->selectedPaymentMethod,
        ]);
    }
}
