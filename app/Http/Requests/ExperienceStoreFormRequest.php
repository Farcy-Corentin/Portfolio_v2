<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceStoreFormRequest extends FormRequest {

    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required', 'string',
            'descriptions' => 'required','string',
            'started_at' => 'required', 'date',
            'finished_at' => 'required', 'date',
            'missions' => 'required', 'string',
            'languages' => 'required', 'string',
            'pictures' => 'required', 'string',
            'links' => 'required', 'string',
        ];
    }
}