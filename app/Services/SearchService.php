<?php

namespace App\Services;

use App\Models\Blog;

class SearchService
{
    public function index($key): array
    {
        $blogs = Blog::where('title', 'like', '%' . $key . '%')
            ->where('status', config('constants.ACTIVE'))
            ->when(config('constants.ACTIVE'), function ($query) {
                return $query->whereHas('category', function ($query) {
                    $query->where('status', config('constants.ACTIVE'));
                });
            })
            ->get();

        return compact('blogs');
    }

}
