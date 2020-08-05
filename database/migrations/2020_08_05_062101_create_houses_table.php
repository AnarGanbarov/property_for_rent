<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id");
            $table->string("address");
            $table->text("description");
            $table->integer("count_room");
            $table->integer("apartment_area");
            $table->double("x_coordinate")->nullable();
            $table->double("y_coordinate")->nullable();
            $table->boolean("rent")->default(false);
            $table->integer("cost");
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('houses');
    }
}
