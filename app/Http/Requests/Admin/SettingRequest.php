<?php

namespace App\Http\Requests\Admin;

class SettingRequest extends BaseFormRequest
{

    public function update(): array
    {
        return [
            'site_name' => 'required',
            'logo_white' => 'nullable|max:1000|mimes:jpg,jpeg,png',
            'logo_black' => 'nullable|max:1000|mimes:jpg,jpeg,png',
            'favicon' => 'nullable|max:1000|mimes:jpg,jpeg,png'
        ];
    }

    public function messages(): array
    {
        return [
            'site_name.required' => 'Sayt adı sahəsi tələb olunur.',
            'logo_white.max' => 'Loqo şəkli 1000 KB-dan böyük ola bilməz.',
            'logo_white.mimes' => 'Loqo şəkli yalnız JPG, JPEG və ya PNG formatında ola bilər.',
            'logo_black.max' => 'Loqo şəkli 1000 KB-dan böyük ola bilməz.',
            'logo_black.mimes' => 'Loqo şəkli yalnız JPG, JPEG və ya PNG formatında ola bilər.',
            'favicon.max' => 'Favicon şəkli 1000 KB-dan böyük ola bilməz.',
            'favicon.mimes' => 'Favicon şəkli yalnız JPG, JPEG və ya PNG formatında ola bilər.'
        ];
    }

}
