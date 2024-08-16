<?php
namespace Jiny\Shop\Order;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;
use Livewire\Livewire;

class JinyShopOrderServiceProvider extends ServiceProvider
{
    private $package = "jiny-shop-order";
    public function boot()
    {
        // 모듈: 라우트 설정
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', $this->package);

        // 데이터베이스
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // 설정파일 복사
        $this->publishes([
            __DIR__.'/../config/setting.php' => config_path('jiny/shop/order.php'),
        ]);



    }

    public function register()
    {
        /* 라이브와이어 컴포넌트 등록 */
        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component('shop-cart-item', \Jiny\Shop\Order\Http\Livewire\ShopCartItem::class);

            Livewire::component('shop-cart-summary', \Jiny\Shop\Order\Http\Livewire\ShopCartSummary::class);
        });

        /* 라이브와이어 컴포넌트 등록 */
        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component('ShopOrders', \Jiny\Shop\Order\Http\Livewire\ShopOrders::class);
        });

        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component('ShopWish', \Jiny\Shop\Order\Http\Livewire\ShopWish::class);
        });

        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component('ShopTransactions', \Jiny\Shop\Order\Http\Livewire\ShopTransactions::class);
        });

        // $this->app->afterResolving(BladeCompiler::class, function () {
        //     Livewire::component('CartItems', \Jiny\Shop\Order\Http\Livewire\CartItems::class);
        // });

        // $this->app->afterResolving(BladeCompiler::class, function () {
        //     Livewire::component('OrderSummary', \Jiny\Shop\Order\Http\Livewire\OrderSummary::class);
        // });

        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component('AddressForm', \Jiny\Shop\Order\Http\Livewire\AddressForm::class);
        });

        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component('AddressList', \Jiny\Shop\Order\Http\Livewire\AddressList::class);
        });

        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component('PaymentSelection', \Jiny\Shop\Order\Http\Livewire\PaymentSelection::class);
        });

        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component('OrderItems', \Jiny\Shop\Order\Http\Livewire\OrderItems::class);
        });

        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component('CartOffcanvas', \Jiny\Shop\Order\Http\Livewire\CartOffcanvas::class);
        });

        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component('CheckoutOrderSummary', \Jiny\Shop\Order\Http\Livewire\CheckoutOrderSummary::class);
        });

        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component('PaymentSelection', \Jiny\Shop\Order\Http\Livewire\PaymentSelection::class);
        });

        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component('CartButton', \Jiny\Shop\Order\Http\Livewire\CartButton::class);
        });


    }
}
