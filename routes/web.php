<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

$shop_prefix = "shop";

Route::middleware(['web'])
->name($shop_prefix)
->prefix($shop_prefix)->group(function () {

    Route::get('/orders', [
        \Jiny\Shop\Order\Http\Controllers\OrderListController::class,
        "index"]);

    // 장바구니, 관심상품
    Route::get('/cart', [
        \Jiny\Shop\Http\Controllers\CartController::class,
        "index"])->name('shop.cart');

    Route::get('/wishlist', [
        \jiny\Shop\Http\Controllers\WishController::class,
        "index"]);

    Route::get('/checkout', [
        \Jiny\Shop\Order\Http\Controllers\CheckoutController::class,
        "index"])->name('shop.checkout');

    Route::get('/thankyou', [
        \Jiny\Shop\Order\Http\Controllers\ThankyouController::class,
        "index"])->name('shop.thankyou');
});

//인증 없이 접속 가능한 경로 처리
Route::middleware(['web'])->group(function(){
    Route::get('/admin/shop/phone', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminUserPhoneController::class,
        "index"]);
});

//인증 없이 접속 가능한 경로 처리
Route::middleware(['web'])->group(function(){
    Route::get('/admin/shop/shop_address', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminShopAddressController::class,
        "index"]);
});

Route::middleware(['web'])->group(function(){
    Route::get('/admin/shop/shipping', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminShopShippingsController::class,
        "index"]);
});

Route::middleware(['web'])->group(function(){
    Route::get('/admin/shop_cart', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminShopCartController::class,
        "index"]);

});


Route::middleware(['web'])->group(function(){
    Route::get('/admin/order_items', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminOrderItemsController::class,
        "index"]);

});

Route::middleware(['web'])->group(function(){
    Route::get('/admin/shop/payment', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminShopPaymentController::class,
        "index"]);

});

Route::middleware(['web'])->group(function(){
    Route::get('/admin/user_point', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminUserPointController::class,
        "index"]);

});

Route::middleware(['web'])->group(function(){
    Route::get('/admin/user_point_history', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminUserPointHistoryController::class,
        "index"]);

});

Route::middleware(['web'])->group(function(){
    Route::get('/admin/user_money', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminUserMoneyController::class,
        "index"]);
});

Route::middleware(['web'])->group(function(){
    Route::get('/admin/user_money_history', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminUserMoneyHistoryController::class,
        "index"]);
});

Route::middleware(['web'])->group(function(){
    Route::get('/admin/user_cash', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminUserCashController::class,
        "index"]);
});

Route::middleware(['web'])->group(function(){
    Route::get('/admin/user_cash_history', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminUserCashHistoryController::class,
        "index"]);
});

Route::middleware(['web'])->group(function(){
    Route::get('/admin/order/status', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminShopOrderStatusController::class,
        "index"]);
});

Route::middleware(['web'])->group(function(){
    Route::get('/admin/shop_wish', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminShopWishController::class,
        "index"]);
});

Route::middleware(['web'])->group(function(){
    Route::get('/admin/shop_checkout_items', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminShopCheckoutItemsController::class,
        "index"]);
});

Route::middleware(['web'])->group(function(){
    Route::get('/admin/user_address', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminUserAddressController::class,
        "index"]);
});

Route::middleware(['web'])->group(function(){
    Route::get('/admin/shop_orders', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminOrdersController::class,
        "index"]);
});

Route::middleware(['web'])->group(function(){
    Route::get('/admin/shop_transactions', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminShopTransactionsController::class,
        "index"]);
});


/**
 * 관리자
 */
Route::middleware(['auth:sanctum','verified'])->group(function(){

    ## 주문관리
    // Route::get('/shop/admin/orders', [
    //     \Jiny\Shop\Http\Controllers\Admin\AdminOrdersController::class,"index"]);

    // Route::resource('/shop/admin/order/status',
    //     \Jiny\Shop\Http\Controllers\Admin\AdminOrderStatusController::class);

    Route::resource('/shop/admin/shipping',
        \Jiny\Shop\Http\Controllers\Admin\AdminShippingController::class);

    Route::resource('/shop/admin/shippingmethod',
        \Jiny\Shop\Http\Controllers\Admin\AdminShippingMethodController::class);

    ### 주문관리-분쟁조정
    Route::get('/shop/admin/orders/dispute', [
        \Jiny\Shop\Http\Controllers\Admin\Orders\DisputeController::class,
        "index"]);

    Route::get('/shop/admin/orders/dispute/history', [
        \Jiny\Shop\Http\Controllers\Admin\Orders\DisputeHistoryController::class,
        "index"]);


});

