<?php

namespace App\Services;

use App\Models\Audio;
use App\Models\Blog;
use App\Models\Setting;

class HomeService
{
    public function index(): array
    {
        $blogs = Blog::where('status', config('constants.ACTIVE'))
            ->orderBy('id', 'desc')
            ->take(15)
            ->get();

        $audios = Audio::where('status', config('constants.ACTIVE'))
            ->orderBy('id', 'desc')
            ->take(15)
            ->get();

        $setting = Setting::where('id', config('constants.FIRST_ID'))->first();

        return compact('setting', 'blogs', 'audios');
    }

}
