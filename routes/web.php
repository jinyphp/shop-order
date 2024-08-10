<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

$shop_prefix = "shop";

include(__DIR__.DIRECTORY_SEPARATOR."cartzilla.php");

Route::middleware(['web'])->group(function () {
    ## 장바구니

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
