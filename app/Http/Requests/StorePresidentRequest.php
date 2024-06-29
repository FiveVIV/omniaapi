<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePresidentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'death_date' => 'nullable|date',
            'party' => 'required|string|max:255',
            'term_start_year' => 'required|integer',
            'term_end_year' => 'nullable|integer',
        ];
    }
}
