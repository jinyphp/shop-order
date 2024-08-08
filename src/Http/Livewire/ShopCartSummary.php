<?php
namespace Jiny\Shop\Order\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

/**
 * 카트 주문 합계
 */
class ShopCartSummary extends Component
{
    public $viewfile;
    public $cartItems = [];

    public $subtotal = 0;
    public $saving = 0;

    public $tax = 0;
    public $tax_rate = 10;

    public $total = 0;
    public $estimated_total = 0;

    public $delivery = 0;

    public function mount()
    {
        // $this->calculateSummary();

        if(!$this->viewfile){
            //$this->viewfile = 'jiny-shop-order::cartzilla.cart.order-summary';
            $this->viewfile = 'jiny-shop-order::shop.cart.summary';
        }

        // Shop-cart-item 에서 카트 정보를 배열로 가지고 옴
        $cartItems = $this->dispatch('requestCartItem');
    }

    public function render()
    {
        // return view($this->viewfile, [
        //     'subtotal' => $this->subtotal,
        //     'saving' => $this->saving,
        //     'tax' => $this->tax,
        //     'total' => $this->total,
        // ]);

        return view($this->viewfile,[

        ]);
    }

    protected $listeners = [
        'cartUpdated',
        'updatedCartItem'
    ];

    public function updatedCartItem($value)
    {
        $this->calculateSummary($value);
        foreach($value as $item) {
            $this->cartItems []= $item;
        }
    }


    public function cartUpdated($item)
    {
        //dd($item);
        foreach($this->cartItems as $i => $cart) {

            // 동일한 카트를 찾아 갱신
            if($cart['id'] == $item['id']) {
                $this->cartItems[$i] = $item;
            }
        }

        // 다시 계산
        $this->calculateSummary($this->cartItems);
        //dd($this->cartItems);
    }


    public function calculateSummary($cart)
    {
        $this->saving = 0;
        $this->subtotal = 0;
        $this->total = 0;
        $this->tax = 0;
        $this->estimated_total = 0;

        foreach($cart as $item) {

            // 할인금액
            $this->saving += $item['discount'] * $item['quantity'];

            $this->subtotal += $item['price'] * $item['quantity'];
        }

        $this->total = $this->subtotal - $this->saving;

        $this->tax = ($this->total / 100) * $this->tax_rate;

        $this->estimated_total = $this->total + $this->tax;


        //dd($this->estimated_total);
    }


}
