<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MotherMedicalHistoryUpdateRequest extends FormRequest
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
            'illnes' => [
                'required',
                'in:other,anaemia,uti,depression,diabetes,heart-conditions,hypertension,hyperemesis-gravidarum,infections,uit,anxiety,malaria,cancer',
            ],
            'Description' => ['nullable', 'max:255', 'string'],
            'date' => ['nullable', 'date'],
            'status' => [
                'nullable',
                'in:cured,illness,continuous-illness,on-dose',
            ],
        ];
    }
}
