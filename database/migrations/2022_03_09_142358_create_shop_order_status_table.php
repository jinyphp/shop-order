<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


/*
주문 상태 테이블
code: 주문 상태 코드
name: 주문 상태 이름
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
        Schema::create('shop_order_status', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('ref')->default(0);
            $table->integer('level')->default(0);
            $table->integer('pos')->default(1);

            $table->string('enable')->default(1);
            $table->string('code');
            $table->string('name');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_order_status');
    }
};
