<?php

namespace App\Http\Requests\Admin;

class BlogRequest extends BaseFormRequest
{

    public function store(): array
    {
        return [
            'blog_category_id' => 'required|exists:blog_categories,id',
            'title' => 'required',
            'text' => 'required',
            'status' => 'required|integer|in:0,1',
            'image' => 'required|max:1000|mimes:jpg,jpeg,png'
        ];
    }

    public function update(): array
    {
        return [
            'blog_category_id' => 'required|exists:blog_categories,id',
            'title' => 'required',
            'text' => 'required',
            'status' => 'required|integer|in:0,1',
            'image' => 'nullable|max:1000|mimes:jpg,jpeg,png'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Bu sahə tələb olunur.',
            'text.required' => 'Bu sahə tələb olunur.',
            'status.required' => 'Bu sahə tələb olunur.',
            'status.integer' => 'Bu sahə ancaq rəqəm olmalıdır.',
            'status.in' => 'Status yalnız 0 və ya 1 ola bilər.',
            'image.required' => 'Şəkil sahəsi tələb olunur.',
            'image.max' => 'Şəkil 1000 KB-dan böyük ola bilməz.',
            'image.mimes' => 'Şəkil yalnız JPG, JPEG və ya PNG formatında ola bilər.'
        ];
    }

}
