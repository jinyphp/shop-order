<?php

namespace Jiny\Shop\Order\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ShopWish extends Component
{
    public $wishes;

    public function mount()
    {
        $this->loadWishes();
    }

    public function loadWishes()
    {
        $email = 'aaa'; // 이메일이 'aaa'인 사용자의 위시리스트 불러옴
        $this->wishes = DB::table('shop_wish')
            ->where('email', $email)
            ->get();
    }


    public function render()
    {
        $viewFile = 'jiny-shop-order::shop.wish.grid';
        return view($viewFile, [
            'wishes' => $this->wishes
        ]);
    }
}
