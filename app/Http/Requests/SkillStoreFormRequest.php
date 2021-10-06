<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillStoreFormRequest extends FormRequest {

    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => 'required',
            'name' => 'required','string',
            'skills' => 'required','string',
        ];
    }
}