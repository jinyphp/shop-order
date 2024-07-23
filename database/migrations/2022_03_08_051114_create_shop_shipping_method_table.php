<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 배송 방법 테이블
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
        Schema::create('shop_shipping_method', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('ref')->default(0);
            $table->integer('level')->default(0);
            $table->integer('pos')->default(1);

            $table->string('enable')->default(1); // 배송 방법의 활성화 여부
            $table->string('name')->nullable(); // 배송 방법 이름
            $table->string('price')->nullable(); // 배송 비용
            $table->string('priod')->nullable(); // 배송 기간

            // 배송 관리자 정보
            $table->string('manager_name')->nullable();
            $table->string('manager_phone')->nullable();


            $table->string('depature')->nullable(); // 출발지
            $table->string('arrive')->nullable(); // 도착지
            $table->string('cost')->nullable(); // 배송 비용?
            $table->string('country')->nullable(); // 국가


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_shipping_method');
    }
};
