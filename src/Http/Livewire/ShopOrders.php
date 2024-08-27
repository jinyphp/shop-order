<?php
namespace Jiny\Shop\Order\Http\Livewire;

use Illuminate\Support\Facades\Blade;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Webuni\FrontMatter\FrontMatter;
use Jiny\Pages\Http\Parsedown;
use \Jiny\Html\CTag;
use Jiny\Shop\Entities\ShopSliders;
use Illuminate\Support\Facades\Auth;


class ShopOrders extends Component
{
    public $orders = [];
    public $viewFile;

    public function mount()
    {
        $this->loadOrders();
        if(!$this->viewFile) {
            $this->viewFile = 'jiny-shop-order::shop.order.list';
        }
        // if(!$this->viewfile){
        //     $this->viewfile = 'jiny-shop-order::cartzilla.orderlist.order-list';
        // }
    }

    public function loadOrders()
    {
        if ($user = Auth::user()) {
            $email = $user->email;

            $this->orders = DB::table('shop_orders')
                ->where('email', $email)
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $this->orders = [];
        }
    }

    public function render()
    {
        return view($this->viewFile, [
            'orders' => $this->orders,
        ]);
    }
}
