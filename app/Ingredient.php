<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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

}
