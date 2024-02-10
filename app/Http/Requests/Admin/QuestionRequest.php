<?php

namespace App\Http\Requests\Admin;

class QuestionRequest extends BaseFormRequest
{

    public function update(): array
    {
        return [
            'answer' => 'required',
            'notification' => 'nullable',
            'status' => 'required|integer|in:0,1',
        ];
    }

    public function messages(): array
    {
        return [
            'answer.required' => 'Cavab sahəsi tələb olunur.',
            'status.required' => 'Status sahəsi tələb olunur.',
            'status.integer' => 'Status ancaq rəqəm olmalıdır.',
            'status.in' => 'Status yalnız 0 və ya 1 ola bilər.',
        ];
    }

}
