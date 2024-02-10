<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\BlogService;
use Illuminate\View\View;

class BlogController extends Controller
{
    protected BlogService $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function detail($slug): View
    {
        $models = $this->blogService->detail($slug);
        return view('site.blog.detail', $models);
    }
}
