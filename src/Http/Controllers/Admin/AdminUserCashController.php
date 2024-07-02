<?php
namespace Jiny\Shop\Order\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * 라우트경로 : /admin/user_cash
 */
use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
class AdminUserCashController extends WireTablePopupForms
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ##
        $this->actions['table'] = "user_cash"; // 테이블 정보
        $this->actions['title'] = "관리자: 유저 캐쉬 관리";
        $this->actions['subtitle'] = "유저 캐쉬 관리 페이지입니다.";

        // 테이블을 출력하는 목록 blade입니다.
        $this->actions['view']['list'] = "jiny-shop-order::admin.user_cash.list";

        // 신규 데이터 입력 및 수정폼 입니다.
        $this->actions['view']['form'] = "jiny-shop-order::admin.user_cash.form";
    }
}