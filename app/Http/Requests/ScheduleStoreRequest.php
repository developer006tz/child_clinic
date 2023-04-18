<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleStoreRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'string'],
            'message' => ['required', 'max:255', 'string'],
            'date_start' => ['required', 'date'],
            'date_end' => ['required', 'date'],
            'time_start' => ['required', 'date_format:H:i:s'],
            'time_end' => ['required', 'date_format:H:i:s'],
        ];
    }
}
