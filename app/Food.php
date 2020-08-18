<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Food extends Model
{
    protected $fillable = ["title"];

    public function ingredients()
    {
        return $this->hasManyThrough(Ingredient::class, FoodIngredients::class, "food_id", "id", "id", "ingredient_id");
    }

    public static function available()
    {
        $ttl = 60;
        return Cache::remember("available_foods", $ttl, function () {
            $foods = Food::cursor();
            $available_foods = [];
            foreach ($foods as $food) {
                if (Ingredient::hasIngredients($food->id)) {
                    $ingredients = $food->ingredients()->orderBy("best_before", "desc")->get();
                    $available_foods[] = ["food" => $food, "age" => $ingredients[0]->best_before, "ingredients" => $ingredients];
                }
            }
            usort($available_foods, function ($item1, $item2) {
                return $item2['age'] <=> $item1['age'];
            });

            return $available_foods;
        });

    }


}
