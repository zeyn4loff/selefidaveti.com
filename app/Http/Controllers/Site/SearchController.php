<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\SearchService;
use Illuminate\View\View;

class SearchController extends Controller
{
    protected SearchService $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function index($key): View
    {
        $models = $this->searchService->index($key);
        return view('site.search', $models);
    }
}
