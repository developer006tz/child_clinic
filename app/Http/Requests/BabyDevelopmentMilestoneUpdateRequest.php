<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BabyDevelopmentMilestoneUpdateRequest extends FormRequest
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
            'first_smile' => ['required', 'date'],
            'first_word' => ['required', 'date'],
            'first_step' => ['required', 'date'],
        ];
    }
}
