<?php
namespace Jiny\Shop\Order\Http\Livewire;

use Illuminate\Support\Facades\Blade;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Webuni\FrontMatter\FrontMatter;
use Jiny\Pages\Http\Parsedown;
use \Jiny\Html\CTag;
use Jiny\Shop\Entities\ShopSliders;

//use Livewire\WithFileUploads;

class ShopOrders extends Component
{
    public $orders;

    public function render()
    {

        $this->orders = DB::table('shop_orders')->get();

        $viewFile = 'jiny-shop-order::shop.order.list';
        return view($viewFile, [
            'orders'=>$this->orders,
        ]);
    }
}
