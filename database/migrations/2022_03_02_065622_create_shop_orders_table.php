<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;



/**
 * 주문 관리 테이블
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
        Schema::create('shop_orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('ref')->default(0);
            $table->integer('level')->default(0);
            $table->integer('pos')->default(1);

            $table->bigInteger('user_id')->unsigned(); // 주문한 유저의 id
            $table->decimal('subtotal'); // 주문의 총 금액에서 세금과 할인을 제외한 금액
            $table->decimal('discount')->default(0); // 할인 금액
            $table->decimal('tax'); // 세금
            $table->decimal('total'); // 총 주문 금액

            $table->string('firstname'); // 이름
            $table->string('lastname')->nullable(); // 성
            $table->string('mobile')->nullable(); // 핸드폰 번호
            $table->string('email'); // 이메일 주소
            $table->string('line1')->nullable(); // 도로명, 구
            $table->string('line2')->nullable(); // 도로명이하 주소 (아파트 동, 호수 등)
            $table->string('city')->nullable(); // 도시
            $table->string('province')->nullable(); // 주
            $table->string('country')->nullable(); // 나라
            $table->string('zipcode')->nullable(); // 우편번호
            $table->enum('status',['ordered','delivered','canceled'])->default('ordered'); // 주문 상태
            $table->boolean('is_shipping_different')->default(false); // 주소지와 실제 배송 주소지가 다른지 체크?



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
