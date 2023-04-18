<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BirthCertificateStoreRequest extends FormRequest
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
            'baby_id' => ['required', 'exists:babies,id'],
            'date_of_birth' => ['nullable', 'date'],
            'Hospital' => ['nullable', 'max:255', 'string'],
            'mother_id' => ['nullable', 'exists:mothers,id'],
            'father_id' => ['nullable', 'exists:fathers,id'],
            'father_ocupation' => ['nullable', 'max:255', 'string'],
            'Mother_ocupation' => ['nullable', 'max:255', 'string'],
            'father_address' => ['nullable', 'max:255', 'string'],
            'Mother_address' => ['nullable', 'max:255', 'string'],
        ];
    }
}
