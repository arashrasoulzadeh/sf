<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodIngredients extends Model
{
    protected $fillable = ["ingredient_id", "food_id"];
}
