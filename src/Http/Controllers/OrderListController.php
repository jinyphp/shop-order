<?php
namespace Jiny\Shop\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use Cart;
use Illuminate\Support\Facades\Auth;

class OrderListController extends Controller
{

    public $admin;
    public function __construct()
    {
        $this->admin = true;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $user_id = $request->user_id;

        // if (is_numeric($user_id)) {
        //     $rows = DB::table('shop_orders')->where('user_id', $user_id)->get();
        // } else {
        //     $rows = DB::table('shop_orders')->get();
        // }

        // 배열 변환
        // $orders = [];

        // foreach($rows as $key => $value) {
        //     $orders[$key] = $value;
        // }


        $viewFile = "www::slot1.shop.orderList";
        return view($viewFile, [
            'admin'=>$this->admin,
            'user_id' => $user_id
            // 'orders'=>$orders
        ]);
    }

}
