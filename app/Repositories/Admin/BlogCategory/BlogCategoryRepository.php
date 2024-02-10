<?php

namespace App\Repositories\Admin\BlogCategory;

use App\Helper\Custom;
use App\Models\BlogCategory;
use Baro\PipelineQueryCollection\BooleanFilter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\LengthAwarePaginator;

class BlogCategoryRepository implements BlogCategoryRepositoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return BlogCategory::with('parent', 'children')
            ->filter([
                new BooleanFilter('status'),
            ])
            ->paginate(config('constants.PAGINATION_COUNT'));
    }

    public function create($data): RedirectResponse
    {
        BlogCategory::create($data);
        return redirect()->route('admin.blog-category.index')->with('success', '👍 Əlavə edildi.');
    }

    public function getById($data): BlogCategory
    {
        return BlogCategory::findOrFail($data);
    }

    public function update($data, $id): RedirectResponse
    {
        $blogCategory = BlogCategory::findOrFail($id);
        $blogCategory->update($data);
        return redirect()->route('admin.blog-category.index')->with('success', '👍 Dəyişilik edildi.');
    }

    public function status($data): JsonResponse
    {
        return Custom::changeStatusByAjax($data, BlogCategory::class);
    }

    public function destroy($data): JsonResponse
    {
        return Custom::deleteByAjax($data, BlogCategory::class);
    }
}
