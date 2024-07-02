<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*
상품별 주문 관리 테이블
product_id: 상품 id
order_id: 주문 id
price: 가격
quantity: 재고
product_id를 foreign키로 하여 shop_products테이블과 조인
order_id를 foreign키로 하여 shop_orders테이블과 조인
*/

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_order_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('ref')->default(0);
            $table->integer('level')->default(0);
            $table->integer('pos')->default(1);

            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table->decimal('price');
            $table->integer('quantity');



            // $table->foreign('product_id')->references('id')->on('shop_products')->onDelete('cascade');
            // $table->foreign('order_id')->references('id')->on('shop_orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_order_items');
    }
};
