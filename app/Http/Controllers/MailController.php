<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\DefaultMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    private $mail;
    private $content;

    public function __construct($mail, $content)
    {
        $this->mail = $mail;
        $this->content = $content;
    }

    public function sendMail()
    {
        Mail::to($this->mail)->send(new DefaultMail($this->content));
    }
}
