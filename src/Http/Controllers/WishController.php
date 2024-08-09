<?php
namespace Jiny\Shop\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use Jiny\Site\Http\Controllers\SiteController;
class WishController extends Controller
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
        $actions['title'] = "찜목록";
        $actions['subtitle'] = "";

        // 레이아웃을 커스텀 변경합니다.
        $actions['view']['layout'] = "wish";

        $this->setReflectActions($actions);
    }

    public function index(Request $request)
    {
        return parent::index($request);
    }

}
