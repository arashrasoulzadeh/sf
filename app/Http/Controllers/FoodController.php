<?php

namespace App\Http\Controllers;

use App\Food;
use App\Http\Requests\FoodOrderRequest;
use App\UserOrders;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

/**
 * Class FoodController
 * @package App\Http\Controllers
 */
class FoodController extends Controller
{
    public function menu()
    {
        return Food::available();
    }

}
