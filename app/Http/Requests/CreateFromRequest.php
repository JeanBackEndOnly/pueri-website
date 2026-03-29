<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateFromRequest extends FormRequest
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
            'fname' => 'required|string|max:255',
            'mname' => 'nullable|string|max:255',  // Made nullable
            'lname' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:50',
            'email' => 'required|email|max:255',
            'contact' => 'required|string|max:15',
            'sex' => 'required|in:male,female',
            'address' => 'required|string',
            'work_experience' => 'nullable|array',
            'work_experience.*.position' => 'required_with:work_experience|string',
            'work_experience.*.years' => 'required_with:work_experience|string',
            'work_experience.*.company_name' => 'required_with:work_experience|string',
            'work_experience.*.company_address' => 'required_with:work_experience|string',
            'work_experience.*.company_contact' => 'required_with:work_experience|string',
            'files' => 'nullable|array',
            'files.*.file' => 'nullable|file|mimes:jpg,jpeg,png,gif,pdf,doc,docx|max:5120',
            'files.*.file_name' => 'nullable|string|max:255',
        ];
    }
}
