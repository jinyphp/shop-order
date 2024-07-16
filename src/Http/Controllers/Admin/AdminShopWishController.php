<?php
namespace Jiny\Shop\Order\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * 쇼핑몰 관리자: 관심상품
 * 라우트경로 : /admin/shop/wish
 */
use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
class AdminShopWishController extends WireTablePopupForms
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ##
        $this->actions['table'] = "shop_wish"; // 테이블 정보


        // 테이블을 출력하는 목록 blade입니다.
        $this->actions['view']['list'] = "jiny-shop-order::admin.shop_wish.list";

        // 신규 데이터 입력 및 수정폼 입니다.
        $this->actions['view']['form'] = "jiny-shop-order::admin.shop_wish.form";

        $this->actions['title'] = "쇼핑몰: 관심상품";
        $this->actions['subtitle'] = "사용자별 관심 등록된 상품을 관리합니다.";
    }
}
