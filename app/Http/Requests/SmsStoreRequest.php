<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SmsStoreRequest extends FormRequest
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
            'body' => ['required', 'max:255', 'string'],
            'phone' => ['required', 'max:255', 'string'],
            'status' => ['required', 'in:0,1,2,3'],
        ];
    }
}
