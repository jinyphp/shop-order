<?php

namespace Jiny\Shop\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if (session()->has('orderidx')) {
            // 서버 세션값 이용
            $order_idx = session()->get('orderidx');
            $order_status = "checkout";
        } else {
            // orderidx 생성
            $str = md5(microtime().mt_rand(1000,2000));
            $order_idx = date("Ymd")."_".substr($str,0,21); //30자
            $order_status = "checkout";

            // 세션 생성
            session()->put('orderidx', $order_idx);
        }

        return view('jiny-shop-order::checkout.main',[
            'orderidx'=>$order_idx
        ]);
    }


}
