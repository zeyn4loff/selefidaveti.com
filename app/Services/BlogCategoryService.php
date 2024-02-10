<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\BlogCategory;

class BlogCategoryService
{
    public function index($parentSlug, $childSlug): array
    {
        $parentCategory = BlogCategory::where('slug', $parentSlug)->firstOrFail();

        $childCategoryIds = [$parentCategory->id];

        if ($parentCategory->children->isNotEmpty()) {
            $childCategoryIds = array_merge($childCategoryIds, $parentCategory->children->pluck('id')->toArray());
        }

        if ($childSlug) {
            $childCategory = BlogCategory::where('slug', $childSlug)
                ->where('parent_id', $parentCategory->id)
                ->firstOrFail();
            $childCategoryIds = [$childCategory->id];
        }

        $blogs = Blog::whereIn('blog_category_id', $childCategoryIds)->get();

        $category = ($childSlug)
            ? BlogCategory::where('slug', $childSlug)->firstOrFail()
            : $parentCategory;

        return compact('category', 'blogs');
    }

}
