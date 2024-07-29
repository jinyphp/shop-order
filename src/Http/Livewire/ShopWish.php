<?php

namespace Jiny\Shop\Order\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ShopWish extends Component
{
    public $wishes;
    public $viewfile;

    public function mount()
    {
        $this->loadWishes();
        if(!$this->viewfile){
            $this->viewfile = 'jiny-shop-order::cartzilla.wishlist.wish-items';
        }
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
        return view($this->viewfile, [
            'wishes' => $this->wishes
        ]);
    }
}
