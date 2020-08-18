<?php

namespace App\Http\Requests;

use App\Rules\HasIngredients;
use Illuminate\Foundation\Http\FormRequest;

class FoodOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "food_id" => ['exists:food,id', 'required', new HasIngredients()]
        ];
    }
}
