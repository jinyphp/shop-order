<?php
namespace Jiny\Shop\Order\Http\Controllers\Cartzilla;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Jiny\Site\Http\Controllers\SiteController;

use Illuminate\Support\Facades\Auth;

class WishlistController extends SiteController
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $viewFile = "www::shop-electronics.account-wishlist";
        return view($viewFile);
    }
}
