<?php

namespace App\Repositories\Admin\Blog;

use App\Helper\Custom;
use App\Models\Blog;
use Baro\PipelineQueryCollection\BooleanFilter;
use Baro\PipelineQueryCollection\RelativeFilter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;

class BlogRepository implements BlogRepositoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return Blog::query()
            ->filter([
                new RelativeFilter('title'),
                new BooleanFilter('status'),
            ])
            ->paginate(config('constants.PAGINATION_COUNT'));
    }

    public function create($data): RedirectResponse
    {
        if (Arr::has($data, 'image') && !is_null($data['image'])) {
            $filename = Custom::uploadFile($data['image'], 'blog');

            if (!is_null($filename)) {
                $data['image'] = $filename;
            }
        }
        Blog::create($data);
        return redirect()->route('admin.blog.index')->with('success', '👍 Əlavə edildi.');
    }

    public function getById($data): Blog
    {
        return Blog::findOrFail($data);
    }

    public function update($data, $id): RedirectResponse
    {
        $blog = Blog::findOrFail($id);
        if (Arr::has($data, 'image') && !is_null($data['image'])) {
            $filename = Custom::uploadFile($data['image'], 'blog');

            if (!is_null($filename)) {
                Custom::deleteFile($blog->image);
                $data['image'] = $filename;
            }
        }
        $blog->update($data);
        return redirect()->route('admin.blog.index')->with('success', '👍 Dəyişilik edildi.');
    }

    public function status($data): JsonResponse
    {
        return Custom::changeStatusByAjax($data, Blog::class);
    }

    public function destroy($data): JsonResponse
    {
        $blog = Blog::findOrFail($data['id']);

        if (!is_null($blog->image)) {
            Custom::deleteFile($blog->image);
        }
        return Custom::deleteByAjax($data, Blog::class);
    }
}
