<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BabyProgressHealthReportStoreRequest extends FormRequest
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
            'age_per_month' => ['required', 'numeric'],
            'height' => ['nullable', 'numeric'],
            'weight' => ['required', 'numeric'],
            'head_circumference' => ['nullable', 'numeric'],
            'bmi' => ['nullable', 'numeric'],
        ];
    }
}
