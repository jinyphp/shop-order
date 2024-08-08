<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

$cartzilla_prefix = "shop/electronics";

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
