<?php

namespace App\Http\Requests\Admin;

class BlogCategoryRequest extends BaseFormRequest
{

    public function store(): array
    {
        return [
            'parent_id' => 'nullable|exists:blog_categories,id',
            'name' => 'required',
            'status' => 'required|integer|in:0,1',
        ];
    }

    public function update(): array
    {
        return [
            'parent_id' => 'nullable|exists:blog_categories,id',
            'name' => 'required',
            'status' => 'required|integer|in:0,1',
        ];
    }

    public function messages(): array
    {
        return [
            'parent_id.exists' => 'Seçilmiş bloq kateqoriya ID-si mövcud deyil.',
            'name.required' => 'Ad sahəsi tələb olunur.',
            'status.required' => 'Status sahəsi tələb olunur.',
            'status.integer' => 'Status ancaq rəqəm olmalıdır.',
            'status.in' => 'Status yalnız 0 və ya 1 ola bilər.',
        ];
    }

}
