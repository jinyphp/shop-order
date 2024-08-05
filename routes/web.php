<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

$shop_prefix = "shop";

$cartzilla_prefix = "cartzilla";

// 카트질라 테스트용
Route::middleware(['web'])
->name($cartzilla_prefix)
->prefix($cartzilla_prefix)->group(function () {

    Route::get('/home/grocery',[
        \Jiny\Shop\Order\Http\Controllers\Cartzilla\GroceryController::class,
        "index"]);

    Route::get('/shop/product/grocery',[
        \Jiny\Shop\Order\Http\Controllers\Cartzilla\ShopProductController::class,
        "index"]);

    Route::get('/shop/catalog/grocery',[
        \Jiny\Shop\Order\Http\Controllers\Cartzilla\ShopCatalogController::class,
        "index"]);


    Route::get('/404/grocery',[
        \Jiny\Shop\Order\Http\Controllers\Cartzilla\Shop404Controller::class,
        "index"]);

    Route::get('/cart', [
        \Jiny\Shop\Order\Http\Controllers\Cartzilla\CartController::class,
         "index"]);

     Route::get('/wish', [
        \Jiny\Shop\Order\Http\Controllers\Cartzilla\WishlistController::class,
            "index"]);

    Route::get('/order', [
        \Jiny\Shop\Order\Http\Controllers\Cartzilla\OrderController::class,
            "index"]);

    Route::get('/delivery', [
        \Jiny\Shop\Order\Http\Controllers\Cartzilla\DeliveryController::class,
            "index"]);

    Route::get('/shipping', [
        \Jiny\Shop\Order\Http\Controllers\Cartzilla\ShippingController::class,
            "index"]);

     Route::get('/payment', [
         \Jiny\Shop\Order\Http\Controllers\Cartzilla\PaymentController::class,
            "index"]);


});

Route::middleware(['web'])
->name($shop_prefix)
->prefix($shop_prefix)->group(function () {

    Route::get('/order', [
        \Jiny\Shop\Order\Http\Controllers\OrderController::class,
        "index"]);

    Route::get('/cart', [
        \Jiny\Shop\Order\Http\Controllers\CartController::class,
        "index"]);

    Route::get('/transactions', [
        \Jiny\Shop\Order\Http\Controllers\TransactionController::class,
        "index"]);

    Route::get('/orderList', [
        \Jiny\Shop\Order\Http\Controllers\OrderListController::class,
        "index"]);

    // 장바구니, 관심상품
    // Route::get('/cart', [
    //     \Jiny\Shop\Http\Controllers\CartController::class,
    //     "index"])->name('shop.cart');

    Route::get('/wishlist', [
        \Jiny\Shop\Order\Http\Controllers\WishController::class,
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
    ## 관심상품
    Route::get('/admin/shop/wish', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminShopWishController::class,
        "index"]);

    ## 장바구니
    Route::get('/admin/shop/cart', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminShopCartController::class,
        "index"]);

    ## 주문내역
    Route::get('/admin/shop/orders', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminOrdersController::class,
        "index"]);

    ## 주문상태
    Route::get('/admin/shop/order/status', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminShopOrderStatusController::class,
        "index"]);

    ## 배송정보
    Route::get('/admin/shop/shipping', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminShopShippingsController::class,
        "index"]);

    ## 배송방식 지정
    Route::get('/admin/shop/shipping/method', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminShippingMethodController::class,
        "index"]);

    ## 결제내역
    Route::get('/admin/shop/payment', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminShopPaymentController::class,
        "index"]);

    ## 배송주소록
    Route::get('/admin/shop/address', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminShopAddressController::class,
        "index"]);



    Route::get('/admin/shop/phone', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminUserPhoneController::class,
        "index"]);







    Route::get('/admin/order/items', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminOrderItemsController::class,
        "index"]);








    Route::get('/admin/shop/checkoutItems', [
        \Jiny\Shop\Order\Http\Controllers\Admin\AdminShopCheckoutItemsController::class,
        "index"]);




    Route::get('/admin/shop/transactions', [
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

