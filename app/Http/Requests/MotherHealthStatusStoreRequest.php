<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MotherHealthStatusStoreRequest extends FormRequest
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
            'height' => ['nullable', 'numeric'],
            'weight' => ['nullable', 'numeric'],
            'hiv_status' => ['nullable', 'in:negative-,positive+'],
            'desease_id' => ['nullable', 'exists:deseases,id'],
            'health_status' => ['nullable', 'in:Normal,Illness'],
        ];
    }
}
