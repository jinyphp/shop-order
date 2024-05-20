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
        Schema::create('user_cash', function (Blueprint $table) {
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
        Schema::dropIfExists('user_cash');
    }
};
