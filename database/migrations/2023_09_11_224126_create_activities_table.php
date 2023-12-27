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
        Schema::dropIfExists('activities');
        Schema::create('activities', function (Blueprint $table) {
            $table->id();

            //Set Logged User
            $table->unsignedBigInteger('model_id');
            $table->string('model_type');


            $table->string('type')->default('info')->nullable();
            $table->json('log');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
};
