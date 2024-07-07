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
    public $admin;
    public $user_id;

    public function mount($user_id, $admin)
    {
        $this->admin = $admin;
        $this->user_id = $user_id;
    }

    public function render()
    {

        if (is_numeric($this->user_id)) {
            $this->orders = DB::table('shop_orders')->where('user_id', $this->user_id)->get();
        } else {
            $this->orders = [];
        }


        $viewFile = 'jiny-shop-order::shop.order.list';
        return view($viewFile, [
            'orders'=>$this->orders,
            'admin'=>$this->admin
        ]);
    }
}
