<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


/*
거래 정보 저장 테이블
user_id: 사용자 id
order_id: 주문 id
mode: 결제 수단('cash','card','paypal','bank')
status: 결제 상태('pending','approved','declined','refunded'), 디폴트는 pending
user_id를 foreign키로 하여 users와 조인
order_id를 foreign키로 하여 shop_order와 조인
*/
class CreateShopTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('ref')->default(0);
            $table->integer('level')->default(0);
            $table->integer('pos')->default(1);

            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table->enum('mode',['cash','card','paypal','bank']);
            $table->enum('status',['pending','approved','declined','refunded'])->default('pending');



            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('shop_transactions');
    }
};
