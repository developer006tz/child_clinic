<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PregnantStoreRequest extends FormRequest
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
            'mother_id' => ['required', 'exists:mothers,id'],
            'due_date' => ['required', 'date'],
            'date_of_delivery' => ['nullable', 'date'],
            'time_of_delivery' => ['nullable', 'date_format:H:i:s'],
            'number_of_weeks_lasted' => ['nullable', 'numeric'],
            'weight_at_birth' => ['nullable', 'numeric'],
            'height_at_birth' => ['nullable', 'numeric'],
            'gender' => ['nullable', 'in:male,female'],
            'pregnant_defects' => ['nullable', 'max:255', 'string'],
        ];
    }
}
