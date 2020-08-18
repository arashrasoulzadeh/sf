<?php

namespace App\Rules;

use App\Ingredient;
use Illuminate\Contracts\Validation\Rule;

class HasIngredients implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Ingredient::hasIngredients($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Food is Finished.';
    }
}
