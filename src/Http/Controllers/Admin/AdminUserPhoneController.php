<?php
namespace Jiny\Shop\Order\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
class AdminUserPhoneController extends WireTablePopupForms
{

    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ## 테이블 정보
        $this->actions['table'] = "user_phone";

        $this->actions['title'] = "관리자: 유저 전화번호 관리";
        $this->actions['subtitle'] = "유저의 전화번호를 관리합니다";

        $this->actions['view']['title'] = "jiny-shop-order::admin.user_phone.title"; //사용자지정 뷰

        //목록출력
        $this->actions['view']['list'] = "jiny-shop-order::admin.user_phone.list";

        $this->actions['view']['form'] = "jiny-shop-order::admin.user_phone.form";

        // $this->actions['title'] = "사업장관리";
        // $this->actions['subtitle'] = "HR 적용 사업장을 관리합니다.";

        // // 레이아웃 전환
        // $this->setLayout('www');

        // // 테마를 적용합니다.
        // $this->setTheme("jinyerp/hr-admin");

    }


}
