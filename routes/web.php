<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

$shop_prefix = "shop";

include(__DIR__.DIRECTORY_SEPARATOR."cartzilla.php");

<<<<<<< HEAD
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

     Route::get('/account-wishlist', [
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
=======
Route::middleware(['web'])->group(function () {
    ## 장바구니
>>>>>>> 9a9537a7bbadeed18456e32314f4ec54f01697ea

    Route::get('/cart', [
        \Jiny\Shop\Order\Http\Controllers\CartController::class,
        "index"]);

    Route::get('/order', [
        \Jiny\Shop\Order\Http\Controllers\OrderController::class,
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

    // Route::get('/wishlist', [
    //     \Jiny\Shop\Order\Http\Controllers\WishController::class,
    //     "index"]);

    Route::get('/wish', [
            \Jiny\Shop\Order\Http\Controllers\WishController::class,
            "index"]);

    Route::get('/checkout', [
        \Jiny\Shop\Order\Http\Controllers\CheckoutController::class,
        "index"])->name('shop.checkout');

    Route::get('/thankyou', [
        \Jiny\Shop\Order\Http\Controllers\ThankyouController::class,
        "index"])->name('shop.thankyou');
});


include(__DIR__.DIRECTORY_SEPARATOR."admin.php");
