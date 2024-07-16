<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * <배송 정보>
 * enable: 노출 여부
 * name: 상품 이름
 * price: 배송비
 * priod:
 * manager_name: 관리자 이름
 * manager_phone: 관리자 전화번호
 * depature: 출발지
 * arrive: 도착지
 * cost: 거리?
 * country: 국가
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

            $table->string('enable')->default(1);
            $table->string('name')->nullable();
            $table->string('price')->nullable();
            $table->string('priod')->nullable();

            $table->string('manager_name')->nullable();
            $table->string('manager_phone')->nullable();


            $table->string('depature')->nullable(); // 출발지
            $table->string('arrive')->nullable();
            $table->string('cost')->nullable();
            $table->string('country')->nullable();


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
