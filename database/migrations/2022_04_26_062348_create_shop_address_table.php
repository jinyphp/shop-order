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
        Schema::create('shop_address', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('ref')->default(0);
            $table->integer('level')->default(0);
            $table->integer('pos')->default(1);

            $table->string('enable')->default(1);

            // 비회원: 주문id
            $table->string('orderidx')->nullable(); // 주문 생성번호

            // 인증 사용자
            $table->unsignedBigInteger('user_id')->nullable();

            // 이름
            $table->string('name')->nullable(); // 중간이름으로 대체 가능, 또는 단일 이름
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();


            $table->string('mobile')->nullable();
            $table->string('safenum')->nullable(); // 안심번호
            $table->string('phone')->nullable();
            $table->string('tel')->nullable();
            $table->string('fax')->nullable();


            $table->string('email')->nullable();
            $table->string('email2')->nullable(); // 보조이메일

            // 국가
            $table->string('country')->nullable();

            $table->string('zipcode')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('line1')->nullable();
            $table->string('line2')->nullable();

            $table->string('default')->nullable();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_address');
    }
};
