<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 특정 주문에 속하는 개별 상품 정보를 저장하는 테이블
 * 즉, 각 주문에 포함된 상품들의 세부 정보 관리
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

            $table->bigInteger('product_id')->unsigned(); // 주문한 상품의 id
            $table->bigInteger('order_id')->unsigned(); // 관련 주문의 id
            $table->decimal('price'); // 상품 단가
            $table->integer('quantity'); // 주문 상품 수량


            // $table->foreign('product_id')->references('id')->on('shop_products')->onDelete('cascade'); // product_id를 foreign키로 하여 shop_products테이블과 조인
            // $table->foreign('order_id')->references('id')->on('shop_orders')->onDelete('cascade'); // order_id를 foreign키로 하여 shop_orders테이블과 조인
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
