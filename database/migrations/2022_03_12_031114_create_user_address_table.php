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
        Schema::create('user_address', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('ref')->default(0);
            $table->integer('level')->default(0);
            $table->integer('pos')->default(1);

            $table->string('enable')->default(1);

            $table->bigInteger('user_id');
            $table->string('email');

            $table->string('country')->nullable();

            //$table->string('firstname');
            //$table->string('lastname');
            //$table->string('mobile')->nullable();
            //$table->string('save_phone')->nullable(); // 안심전화

            $table->string('addr1')->nullable();
            $table->string('addr2')->nullable();

            $table->string('city')->nullable();
            $table->string('province')->nullable();

            $table->string('zipcode')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_address');
    }
};
