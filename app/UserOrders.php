<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserOrders extends Model
{
    protected $fillable = ["user_id", "food_id"];

    //
    public static function order($food_id)
    {
        self::create(["user_id" => auth()->id(), "food_id" => $food_id]);
    }

    public function food()
    {
        return $this->hasOne(Food::class, "id", "food_id");
    }
}
