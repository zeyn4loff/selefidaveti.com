<?php

namespace App\Http\Requests\Admin;

class AudioRequest extends BaseFormRequest
{

    public function store(): array
    {
        return [
            'audio_category_id' => 'required|exists:audio_categories,id',
            'title' => 'required',
            'status' => 'required|integer|in:0,1',
            'audio' => 'required|max:10000|mimes:mp3'
        ];
    }

    public function update(): array
    {
        return [
            'audio_category_id' => 'required|exists:audio_categories,id',
            'title' => 'required',
            'status' => 'required|integer|in:0,1',
            'audio' => 'nullable|max:10000|mimes:mp3'
        ];
    }

    public function messages(): array
    {
        return [
            'audio_category_id.exists' => 'Seçilmiş audio kateqoriya ID-si mövcud deyil.',
            'title.required' => 'Başlığ sahəsi tələb olunur.',
            'status.required' => 'Status sahəsi tələb olunur.',
            'status.integer' => 'Status ancaq rəqəm olmalıdır.',
            'status.in' => 'Status yalnız 0 və ya 1 ola bilər.',
            'audio.required' => 'Audio sahəsi tələb olunur.',
            'audio.max' => 'Audio 10000 KB-dan böyük ola bilməz.',
            'audio.mimes' => 'Audio yalnız MP3 formatında ola bilər.'
        ];
    }

}
