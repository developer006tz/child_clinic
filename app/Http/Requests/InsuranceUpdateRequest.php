<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsuranceUpdateRequest extends FormRequest
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
            'provider_name' => ['required', 'max:255', 'string'],
            'insurance_name' => ['required', 'max:255', 'string'],
            'policy_number' => ['required', 'max:255', 'string'],
            'contact' => ['required', 'max:255', 'string'],
        ];
    }
}
