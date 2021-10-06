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
            'started_at' => 'required|date|date_format:Y-m-d',
            'finished_at' => 'required|date|date_format:Y-m-d',
            'missions' => 'required', 'string',
            'languages' => 'required', 'string',
            'pictures' => 'required', 'file',
            'links' => 'required', 'string',
        ];
    }
}