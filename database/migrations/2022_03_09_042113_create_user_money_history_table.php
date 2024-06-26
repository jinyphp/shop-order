<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*
유저 현금 history 테이블
user_id: 유저 id
email: 유저 email
currency: 통화
balance: 잔고?
input: 입금액
output: 출금액
description: 설명
worker: 작업자
worker_id: 작업자 id
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
        Schema::create('user_money_history', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('ref')->default(0);
            $table->integer('level')->default(0);
            $table->integer('pos')->default(1);

            $table->bigInteger('user_id');
            $table->string('email');

            $table->string('currency')->nullable();
            $table->decimal('balance', $precision = 8, $scale = 2)->default(0.0);
            $table->decimal('input', $precision = 8, $scale = 2)->nullable();
            $table->decimal('output', $precision = 8, $scale = 2)->nullable();

            $table->text('description')->nullable();

            // 작업자
            $table->string('worker')->nullable();
            $table->bigInteger('worker_id')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_money_history');
    }
};
