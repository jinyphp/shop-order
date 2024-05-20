<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_cart', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('ref')->default(0);
            $table->integer('level')->default(0);
            $table->integer('pos')->default(1);

            $table->string('cartidx'); // 카트 생성번호

            $table->string('email')->nullable(); //주문자정보

            ## 상품정보
            $table->bigInteger('product_id'); // 제품 번호
            $table->string('product'); // 제품명
            $table->string('image')->nullable();

            ## 상품 구성
            $table->string('option')->nullable();

            $table->string('price')->nullable();
            $table->string('quantity')->default(1);
            $table->text('content')->nullable();    // 주문 추가정보 text

            ##
            $table->string('expire')->nullable();   // 만료일자시 삭제
            $table->string('later')->nullable();



            /*
            $table->string('identifier');
            $table->string('instance');
            $table->longText('content');
            $table->nullableTimestamps();

            $table->primary(['identifier', 'instance']);
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_cart');
    }
};
