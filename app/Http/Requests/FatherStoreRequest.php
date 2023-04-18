<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FatherStoreRequest extends FormRequest
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
            'dob' => ['required', 'date'],
            'phone' => ['required', 'max:255', 'string'],
            'address' => ['required', 'max:255', 'string'],
            'occupation' => ['required', 'max:255', 'string'],
            'mother_id' => ['required', 'exists:mothers,id'],
        ];
    }
}
