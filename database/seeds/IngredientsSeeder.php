<?php

use Illuminate\Database\Seeder;

class IngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredients = json_decode(file_get_contents(realpath(__DIR__ . '/../../storage/ingredients.json')), true);

        foreach ($ingredients['ingredients'] as $ingredient) {
            \App\Ingredient::create([
                'stock' => $ingredient['stock'],
                'title' => $ingredient['title'],
                'expires_at' => key_exists("expires-at", $ingredient) ? $ingredient['expires-at'] : $ingredient['use-by'],
                'best_before' => $ingredient['best-before'],
            ]);
        }
    }
}
