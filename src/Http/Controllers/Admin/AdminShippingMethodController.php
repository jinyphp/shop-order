<?php
namespace Jiny\Shop\Order\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
class AdminShippingMethodController extends WireTablePopupForms
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ##
        $this->actions['table'] = "shop_shipping_method"; // 테이블 정보

        $this->actions['view']['list'] = "jiny-shop-order::admin.shipping_method.list";
        $this->actions['view']['form'] = "jiny-shop-order::admin.shipping_method.form";

        $this->actions['title'] = "배송방법";
        $this->actions['subtitle'] = "다양한 형태로 배송방식을 선택할 수 있습니다.";
    }
}
