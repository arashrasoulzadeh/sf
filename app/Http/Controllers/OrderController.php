<?php

namespace App\Http\Controllers;

use App\Food;
use App\Http\Requests\FoodOrderRequest;
use App\Http\Resources\OrderList;
use App\UserOrders;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function orders()
    {
        return OrderList::collection(new OrderList(UserOrders::where("user_id", auth()->id())->get()));
    }

    public function order(FoodOrderRequest $request)
    {
        /** @var Food $food */
        $food = Food::find($request->food_id);
        DB::table('ingredients')
            ->whereIn("id", $food->ingredients()->pluck("ingredients.id"))
            ->update([
                'stock' => DB::raw('stock -1'),
            ]);
        Cache::forget("available_foods");
        UserOrders::order($request->food_id);
        return $food;
    }
}
