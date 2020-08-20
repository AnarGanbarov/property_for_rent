<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConvenienceHouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenience_house', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("convenience_id");
            $table->unsignedBigInteger("house_id");
            $table->timestamps();

            $table->foreign("convenience_id")->references("id")->on("conveniences");
            $table->foreign("house_id")->references("id")->on("houses");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('convenience_house');
    }
}
