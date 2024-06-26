<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

$shop_prefix = "shop";



Route::middleware(['web'])
->name($shop_prefix)
->prefix($shop_prefix)->group(function () {

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

// 인증 없이 접속 가능한 경로 처리
Route::middleware(['web'])->group(function(){
    Route::get('/admin/shop/address', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminShopAddressController::class,
        "index"]);
});

// 인증 없이 접속 가능한 경로 처리
Route::middleware(['web'])->group(function(){
    Route::get('/admin/shop/user_phone', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminUserPhoneController::class,
        "index"]);
});

/**
 * 관리자
 */
Route::middleware(['auth:sanctum','verified'])->group(function(){

    ## 주문관리
    Route::get('/shop/admin/orders', [
        \Jiny\Shop\Http\Controllers\Admin\AdminOrdersController::class,"index"]);

    Route::resource('/shop/admin/order/status',
        \Jiny\Shop\Http\Controllers\Admin\AdminOrderStatusController::class);

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

