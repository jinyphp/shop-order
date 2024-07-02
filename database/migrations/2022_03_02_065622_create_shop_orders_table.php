<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;



/*
주문 관리 테입ㄹ
user_id: 주문한 유저의 id
subtotal: 부분합
discount: 할인
tax: 세금
total: 총 금액

firstname: 이름
lastname: 성
mobile: 핸드폰 번호
email: 이메일 주소
line1: 도로명, 구
line2: 도로명이하 주소 (아파트 동, 호수 등)
city: 도시
province: 주
country: 나라
zipcode: 우편번호
status: 주문 상태('ordered','delivered','canceled'), 디폴트는 ordered
is_shipping_different: 주소지와 실제 배송 주소지가 다른지 체크?
user에 user_id를 foreign키로 하여 조인
*/
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    # 주문 관리 테이블
    public function up()
    {
        Schema::create('shop_orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('ref')->default(0);
            $table->integer('level')->default(0);
            $table->integer('pos')->default(1);

            $table->bigInteger('user_id')->unsigned();
            $table->decimal('subtotal');
            $table->decimal('discount')->default(0);
            $table->decimal('tax');
            $table->decimal('total');

            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email');
            $table->string('line1')->nullable();
            $table->string('line2')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->nullable();
            $table->string('zipcode')->nullable();
            $table->enum('status',['ordered','delivered','canceled'])->default('ordered');
            $table->boolean('is_shipping_different')->default(false);



            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_orders');
    }
};
