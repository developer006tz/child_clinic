<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BabyVaccinationStoreRequest extends FormRequest
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
            'vacination_id' => ['required', 'exists:vacinations,id'],
            'date_of_vaccine' => ['required', 'date'],
            'reaction_occured' => ['nullable', 'max:255', 'string'],
            'is_vaccinated' => ['required', 'in:Yes,No'],
        ];
    }
}
