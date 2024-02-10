<?php

namespace App\Services;

use App\Models\Blog;
use Jorenvh\Share\Share;

class BlogService
{
    public function detail($slug): array
    {

        $blog = Blog::where('slug', $slug)->where('status', config('constants.ACTIVE'))
            ->firstOrFail();

        $blog->increment('views');

        $otherBlogs = Blog::where('id', '!=', $blog->id)
        ->where('status', config('constants.ACTIVE'))
            ->inRandomOrder()
            ->limit(7)
            ->get();

        $share = new Share();

        $shareLinks = $share->page(route('site.blog.slug.get', $blog->slug))
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp()
            ->telegram()
            ->getRawLinks();
        return compact('blog', 'otherBlogs', 'shareLinks');
    }

}
