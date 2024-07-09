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
        $this->wishes = DB::table('shop_wish')->get();
    }


    public function render()
    {
        $viewFile = 'jiny-shop-order::shop.wish.list';
        return view($viewFile, [
            'wishes' => $this->wishes
        ]);
    }
}
