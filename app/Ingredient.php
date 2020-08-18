<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * @property int id
 * @property string title
 * @property int stock
 * @property int expires_at
 * @property int best_before
 */
class Ingredient extends Model
{
    protected $fillable = ["title", "stock", "expires_at", "best_before"];

    public static function getIngredientIdByTitle($title)
    {
        $row = self::where("title", $title);
        if ($row->count()) {
            return $row->first()->id;
        } else {
            // cause some ingredients does not exist in ingredients seeder
            $ingredient = new Ingredient();
            $ingredient->title = $title;
            $ingredient->expires_at = Carbon::now();
            $ingredient->best_before = Carbon::now();
            $ingredient->stock = 0;
            $ingredient->save();
            return $ingredient->id;
        }
    }

    public static function hasIngredients($food_id)
    {
        $food_required_ingredients = FoodIngredients::where("food_id", $food_id)->count();
        $food_available_ingredients = DB::table("food_ingredients")
            ->select(DB::raw("count(ingredient_id) as acnt, food_id"))
            ->join("ingredients", "food_ingredients.ingredient_id", "=", "ingredients.id")
            ->whereDate("ingredients.expires_at", ">=", Carbon::now())
            ->where("ingredients.stock", ">", 0)
            ->where("food_id", $food_id)
            ->groupBy("food_ingredients.food_id");
        if (!$food_available_ingredients->count())
            return false;


        return $food_required_ingredients == $food_available_ingredients->first()->acnt;
    }

}
