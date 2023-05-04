<?php

namespace App\Http\Requests\Car;

use Illuminate\Foundation\Http\FormRequest;

class CarCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name"  => "required|string|max:255",
            "brand" => "required|string|max:255",
            "color" => "required|string|max:255",
            "image_url" => "required|string",
            "year"  => "required|numeric|digits:4",
            "price" => "required|numeric|min:1",
            "description" => "required|string",
        ];
    }
}
