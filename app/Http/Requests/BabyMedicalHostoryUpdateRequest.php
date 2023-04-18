<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BabyMedicalHostoryUpdateRequest extends FormRequest
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
            'desease_id' => ['required', 'exists:deseases,id'],
            'level_of_illness' => [
                'required',
                'in:normal,medium,serious,very-serious,icu',
            ],
            'description' => ['required', 'max:255', 'string'],
            'date' => ['required', 'date'],
        ];
    }
}
