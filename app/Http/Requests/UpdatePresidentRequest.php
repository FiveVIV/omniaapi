<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePresidentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'birth_date' => 'sometimes|required|date',
            'death_date' => 'nullable|date',
            'party' => 'sometimes|required|string|max:255',
            'term_start_year' => 'sometimes|required|integer',
            'term_end_year' => 'nullable|integer',
        ];
    }
}
