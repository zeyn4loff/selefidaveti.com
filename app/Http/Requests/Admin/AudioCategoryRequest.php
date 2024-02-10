<?php

namespace App\Http\Requests\Admin;

class AudioCategoryRequest extends BaseFormRequest
{

    public function store(): array
    {
        return [
            'name' => 'required',
            'status' => 'required|integer|in:0,1'
        ];
    }

    public function update(): array
    {
        return [
            'name' => 'required',
            'status' => 'required|integer|in:0,1'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Ad sahəsi tələb olunur.',
            'status.required' => 'Status sahəsi tələb olunur.',
            'status.integer' => 'Status ancaq rəqəm olmalıdır.',
            'status.in' => 'Status yalnız 0 və ya 1 ola bilər.'
        ];
    }

}
