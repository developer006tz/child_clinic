<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BabyUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255', 'string'],
            'gender' => ['required', 'in:male,female'],
            'birthdate' => ['required', 'date'],
            'weight_at_birth' => ['required', 'numeric'],
            'mother_id' => ['required', 'exists:mothers,id'],
            'father_id' => ['required', 'exists:fathers,id'],
        ];
    }
}
