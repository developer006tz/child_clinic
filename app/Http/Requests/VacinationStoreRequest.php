<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacinationStoreRequest extends FormRequest
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
            'name' => ['nullable', 'max:255', 'string'],
            'type' => [
                'required',
                'in:inactivated,live-attenuated,mrna,subunit,toxoid,viral-vector,other',
            ],
        ];
    }
}
