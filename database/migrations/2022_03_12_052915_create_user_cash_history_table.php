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
        Schema::create('user_cash_history', function (Blueprint $table) {
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
        Schema::dropIfExists('user_cash_history');
    }
};
