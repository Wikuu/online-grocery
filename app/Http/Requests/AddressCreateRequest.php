<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressCreateRequest extends FormRequest
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
            "country" => "required|string",
            "city" => "required|string",
            "district" => "required|string",
            "zip_code" => "required|string",
            "user_id" => "required|integer"
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
            "country.required" => "Country is required",
            "city.required" => "City is required",
            "district.required" => "District is required",
            "zip_code.required" => "Zip Code is required",
            "user_id.required" => "User ID is required",
            "country.string" => "Country must be a string",
            "city.string" => "City must be a string",
            "district.string" => "District must be a string",
            "zip_code.string" => "Zip Code must be a string",
            "user_id.integer" => "User ID must be an integer"
        ];
    }
}
