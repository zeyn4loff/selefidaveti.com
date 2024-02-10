<?php

namespace App\Mail;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DefaultMail extends Mailable
{
    use Queueable, SerializesModels;

    public $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function build(): DefaultMail
    {
        $setting = Setting::findOrFail(config('constants.FIRST_ID'));
        return $this->subject($setting->site_name)
            ->view('emails.default-mail');
    }
}
