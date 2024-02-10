<?php

namespace App\Http\Requests\Admin;

class SliderRequest extends BaseFormRequest
{

    public function store(): array
    {
        return [
            'title' => 'required',
            'url' => 'required|url',
            'status' => 'required|integer|in:0,1',
            'image' => 'required|max:1000|mimes:jpg,jpeg,png'
        ];
    }

    public function update(): array
    {
        return [
            'title' => 'required',
            'url' => 'required|url',
            'status' => 'required|integer|in:0,1',
            'image' => 'nullable|max:1000|mimes:jpg,jpeg,png'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Slayd başlığı sahəsi tələb olunur.',
            'url.required' => 'URL sahəsi tələb olunur.',
            'url.url' => 'Düzgün URL formatında daxil edin.',
            'status.required' => 'Status sahəsi tələb olunur.',
            'status.integer' => 'Status ancaq rəqəm olmalıdır.',
            'status.in' => 'Status yalnız 0 və ya 1 ola bilər.',
            'image.required' => 'Şəkil sahəsi tələb olunur.',
            'image.max' => 'Şəkil 1000 KB-dan böyük ola bilməz.',
            'image.mimes' => 'Şəkil yalnız JPG, JPEG və ya PNG formatında ola bilər.'
        ];
    }

}
