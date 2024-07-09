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
        $viewFile = "www::slot1.shop.orderList";
        return view($viewFile, [
            'admin'=>$this->admin,
        ]);
    }

}
