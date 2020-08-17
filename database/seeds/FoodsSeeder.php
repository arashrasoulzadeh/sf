<?php

use Illuminate\Database\Seeder;

class FoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods = json_decode(file_get_contents(realpath(__DIR__ . '/../../storage/foods.json')), true);

        foreach ($foods['recipes'] as $food) {
            $created_food_id = \App\Food::create([
                'title' => $food['title'],
            ])->id;
            foreach ($food['ingredients'] as $item) {
                \App\FoodIngredients::create([
                    'food_id' => $created_food_id,
                    'ingredient_id' => \App\Ingredient::getIngredientIdByTitle($item)
                ]);
            }
        }
    }
}
