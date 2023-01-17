<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            "name" => "required|string",
            "unit" => "required|string",
            "image" => "required|image",
            "weight" => "required|numeric",
            "price" => "required|numeric",
            "description" => "required|string",
            "manufacture_id" => "required|integer",
            "category_id" => "required|integer"
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
            "name.required" => "Name is required",
            "unit.required" => "Unit is required",
            "image.required" => "Image is required",
            "weight.required" => "Weight is required",
            "price.required" => "Price is required",
            "description.required" => "Description is required",
            "manufacture_id.required" => "Manufacture is required",
            "category_id.required" => "Category is required",

            "name.string" => "Name must be string",
            "unit.string" => "Unit must be string",
            "image.image" => "Image must be image",
            "weight.numeric" => "Weight must be numeric",
            "price.numeric" => "Price must be numeric",
            "description.string" => "Description must be string",
            "manufacture_id.integer" => "Manufacture must be integer",
            "category_id.integer" => "Category must be integer",
        ];
    }
}
