<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\BlogCategoryService;
use Illuminate\View\View;

class BlogCategoryController extends Controller
{
    protected BlogCategoryService $blogCategoryService;

    public function __construct(BlogCategoryService $blogCategoryService)
    {
        $this->blogCategoryService = $blogCategoryService;
    }

    public function index($parentSlug, $childSlug = null): View
    {
        $models = $this->blogCategoryService->index($parentSlug, $childSlug);
        return view('site.blog.category', $models);
    }
}
