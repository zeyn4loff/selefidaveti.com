<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class QuestionCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'text' => 'required'
        ];
    }
}
