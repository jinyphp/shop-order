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
        Schema::create('shop_payment', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('ref')->default(0);
            $table->integer('level')->default(0);
            $table->integer('pos')->default(1);

            $table->string('enable')->default(1); ## 결제 수단의 활성화 여부
            $table->string('name'); ## 결제 수단의 이름 (신용카드, 페이팔 등)

            $table->string('test')->nullable();
            $table->string('code')->nullable();
            $table->string('payment')->nullable();
            $table->string('pg_id')->nullable(); ## payment gateway id
            $table->string('pg_password')->nullable();
            $table->string('pg_key')->nullable();
            $table->string('pg_url')->nullable();
            $table->string('pg_url_test')->nullable();
            $table->string('descript')->nullable();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_payment');
    }
};
