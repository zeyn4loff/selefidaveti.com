<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\AudioCategoryService;
use Illuminate\View\View;

class AudioCategoryController extends Controller
{
    protected AudioCategoryService $audioCategoryService;

    public function __construct(AudioCategoryService $audioCategoryService)
    {
        $this->audioCategoryService = $audioCategoryService;
    }

    public function index($slug): View
    {
        $models = $this->audioCategoryService->index($slug);
        return view('site.audio-category', $models);
    }
}
