<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MotherStoreRequest extends FormRequest
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
            'clinic_id' => ['nullable', 'max:255', 'string'],
            'name' => ['required', 'max:255', 'string'],
            'blood_type_id' => ['required', 'exists:blood_types,id'],
            'dob' => ['required', 'date'],
            'phone' => ['nullable', 'max:255', 'string'],
            'address' => ['nullable', 'max:255', 'string'],
            'insurance_info' => ['nullable', 'in:No,Yes'],
            'occupation' => ['nullable', 'max:255', 'string'],
        ];
    }
}
