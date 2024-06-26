<?php
/**
 * 회원 예치금
 */
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*
유저 현금 관리 테이블
user_id: 유저 id
email: 유저 email
currency: 통화
balance: 잔고?

bank_name: 은행명
bank_user: 예금주
bank_account: 계좌번호
bank_swift: 은행 swift 코드
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
        Schema::create('user_money', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('ref')->default(0);
            $table->integer('level')->default(0);
            $table->integer('pos')->default(1);

            $table->bigInteger('user_id');
            $table->string('email');

            $table->string('currency')->nullable();
            $table->decimal('balance', $precision = 8, $scale = 2)->default(0.0);

            // 환불 계좌정보
            $table->string('bank_name')->nullable();
            $table->string('bank_user')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('bank_swift')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_money');
    }
};
