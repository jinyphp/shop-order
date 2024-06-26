<?php
namespace Jiny\Shop\Order\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
class AdminShopAddressController extends WireTablePopupForms
{

    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ## 테이블 정보
        $this->actions['table'] = "shop_address";

        $this->actions['title'] = "관리자 : 배송지 정보 관리";
        $this->actions['subtitle'] = "배송지 정보를 관리합니다.";
        $this->actions['view']['title'] = "jiny-shop-order::admin.shop_address.title";


        // 목록 출력
        $this->actions['view']['list'] = "jiny-shop-order::admin.shop_address.list";

        $this->actions['view']['form'] = "jiny-shop-order::admin.shop_address.form";


        // $this->actions['view']['list'] = "jinyerp-base::admin.business.list";
        // $this->actions['view']['form'] = "jinyerp-base::admin.business.form";

        // $this->actions['title'] = "사업장관리";
        // $this->actions['subtitle'] = "HR 적용 사업장을 관리합니다.";

        // // 레이아웃 전환
        // //$this->setLayout('www');

        // // 테마를 적용합니다.
        // $this->setTheme("jinyerp/hr-admin");

    }

}
