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
    public $orders = [];
    public $viewfile;

    public function mount()
    {
        $this->loadOrders();
        if(!$this->viewfile){
            $this->viewfile = 'jiny-shop-order::cartzilla.orderlist.order-list';
        }
    }

    public function loadOrders()
    {
        $email = 'aaa'; // 이메일이 'aaa'인 사용자의 위시리스트 불러옴
        $this->orders = DB::table('shop_orders')
            ->where('email', $email)
            ->get();
    }

    public function render()
    {
        return view($this->viewfile, [
            'orders'=>$this->orders,
        ]);
    }
}
