<?php
namespace Jiny\Shop\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use Cart;
use Illuminate\Support\Facades\Auth;
use Jiny\Site\Http\Controllers\SiteController;
class OrderListController extends SiteController
{

    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ## actions 기본설정 동작처리
        $this->setActions();
    }

    private function setActions()
    {
        $actions['title'] = "주문내역";
        $actions['subtitle'] = "";

        // 레이아웃을 커스텀 변경합니다.
        $actions['view']['layout'] = "account-orders";

        $this->setReflectActions($actions);
    }

    public function index(Request $request)
    {
        return parent::index($request);
    }

}
