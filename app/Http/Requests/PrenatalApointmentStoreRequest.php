<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrenatalApointmentStoreRequest extends FormRequest
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
            'pregnant_id' => ['required', 'exists:pregnants,id'],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i'],
        ];
    }
}
