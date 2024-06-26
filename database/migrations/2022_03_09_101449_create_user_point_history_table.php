<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*
유저 point history 테이블
user_id: 유저 id
email: 유저 email
balance: 유저 포인트 잔액
input: 포인트 적립
output: 포인트 차감
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
        Schema::create('user_point_history', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('ref')->default(0);
            $table->integer('level')->default(0);
            $table->integer('pos')->default(1);

            $table->bigInteger('user_id');
            $table->string('email');


            $table->integer('balance')->default(0);
            $table->integer('input')->nullable();
            $table->integer('output')->nullable();

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
        Schema::dropIfExists('user_point_history');
    }
};
