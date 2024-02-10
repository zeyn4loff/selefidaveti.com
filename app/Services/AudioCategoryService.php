<?php

namespace App\Services;

use App\Models\Audio;
use App\Models\AudioCategory;

class AudioCategoryService
{
    public function index($slug): array
    {

        $category = AudioCategory::where('status', config('constants.ACTIVE'))
            ->where('slug', $slug)
            ->firstOrFail();

        $audios = Audio::where('status', config('constants.ACTIVE'))
            ->where('audio_category_id', $category->id)
            ->orderBy('id', 'desc')
            ->get();

        return compact('audios', 'category');
    }

}
