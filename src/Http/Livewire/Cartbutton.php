<?php
namespace Jiny\Shop\Order\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class CartButton extends Component
{
    public $count = 0;

    public function mount(){
        $this->countCartItems();
    }

    public function countCartItems(){
        if ($user = Auth::user()) {
            // 사용자의 카트 상품 종류 수 계산
            $this->count = DB::table('shop_cart')
                ->where('email', $user->email)
                ->count('id');
        }
    }

    protected $listeners = ['cartUpdated' => 'countCartItems'];

    public function render()
    {
        return view('jiny-shop-order::cartzilla.cart.cart-button', [
            'count' => $this->count,
        ]);
    }

}
