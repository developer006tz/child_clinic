<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardUpdateRequest extends FormRequest
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
            'issue_number' => ['required', 'max:255', 'string'],
            'weight' => ['required', 'numeric'],
            'height' => ['required', 'numeric'],
            'head_circumference' => ['required', 'numeric'],
            'apgar_score' => ['required', 'numeric'],
            'birth_defects' => ['required', 'max:255', 'string'],
            'blood_type_id' => ['required', 'exists:blood_types,id'],
        ];
    }
}
