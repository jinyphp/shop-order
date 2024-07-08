<?php
namespace Jiny\Shop\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
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
        return view('www::slot1.shop.transactionList', [
            'admin' => $this->admin
        ]);
    }
}
