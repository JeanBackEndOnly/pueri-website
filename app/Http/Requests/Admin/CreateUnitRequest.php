<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateunitRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'unit_name' => 'required|string|max:255|unique:unit,unit_name',
            'unit_code' => 'required|string|max:255|unique:unit,unit_code',
            'unit_description' => 'required|string|min:20',
            'unit_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ];
    }
}
