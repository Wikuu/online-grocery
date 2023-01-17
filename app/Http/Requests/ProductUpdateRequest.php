<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "string",
            "unit" => "string",
            "image" => "image",
            "weight" => "numeric",
            "price" => "numeric",
            "description" => "string",
            "manufacture_id" => "integer",
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            "name.string" => "Name must be string",
            "unit.string" => "Unit must be string",
            "image.image" => "Image must be image",
            "weight.numeric" => "Weight must be numeric",
            "price.numeric" => "Price must be numeric",
            "description.string" => "Description must be string",
            "manufacture_id.integer" => "Manufactur must be integer",
        ];
    }
}
