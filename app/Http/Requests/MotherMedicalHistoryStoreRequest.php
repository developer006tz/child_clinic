<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MotherMedicalHistoryStoreRequest extends FormRequest
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
                'in:Other,Anaemia,Uti,Depression,Diabetes,Heart-conditions,Hypertension,Hyperemesis-gravidarum,Infections,Anxiety,Malaria,Cancer',
            ],
            'Description' => ['nullable', 'max:255', 'string'],
            'date' => ['nullable', 'date'],
            'status' => [
                'nullable',
                'in:Cured,illness,"continuous-illness",on-dose',
            ],
        ];
    }
}
