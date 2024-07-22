<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 체크아웃 과정에서 고객이 선택한 상품 정보를 임시로 저장하는 테이블
 * 사용자가 주문을 최종 제출하기 전에 저장되는 정보
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
        Schema::create('shop_checkout_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('ref')->default(0);
            $table->integer('level')->default(0);
            $table->integer('pos')->default(1);

            $table->string('orderidx'); // 주문 생성번호

            $table->string('email')->nullable(); //주문자 email

            ## 상품정보
            $table->bigInteger('product_id')->nullable(); // 제품 id
            $table->string('product')->nullable(); // 제품명
            $table->string('image')->nullable(); // 제품 이미지

            ## 상품 구성
            $table->json('options')->nullable();
            $table->string('option')->nullable();

            $table->string('price')->nullable();
            $table->string('quantity')->default(1);
            $table->text('content')->nullable();    // 주문 추가정보 text

            ##
            $table->string('expire')->nullable();   // 만료일자시 삭제
            $table->string('later')->nullable();

            $table->string('coupon')->nullable();
            $table->string('coupon_value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_checkout_items');
    }
};
