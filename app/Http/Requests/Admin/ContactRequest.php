<?php

namespace App\Http\Requests\Admin;

class ContactRequest extends BaseFormRequest
{

    public function update(): array
    {
        return [
            'email' => 'required|email',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'youtube' => 'nullable',
            'telegram' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'E-poçt ünvanı tələb olunur.',
            'email.email' => 'Düzgün e-poçt ünvanı daxil edin.'
        ];
    }

}
