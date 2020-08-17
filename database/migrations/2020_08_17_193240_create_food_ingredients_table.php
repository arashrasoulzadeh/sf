<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_ingredients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ingredient_id");
            $table->unsignedBigInteger("food_id");
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
            $table->foreign('food_id')->references('id')->on('food');
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
        Schema::dropIfExists('food_ingredients');
    }
}
