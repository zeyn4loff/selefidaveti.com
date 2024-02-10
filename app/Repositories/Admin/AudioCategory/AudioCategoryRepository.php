<?php

namespace App\Repositories\Admin\AudioCategory;

use App\Helper\Custom;
use App\Models\AudioCategory;
use Baro\PipelineQueryCollection\BooleanFilter;
use Baro\PipelineQueryCollection\RelativeFilter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\LengthAwarePaginator;

class AudioCategoryRepository implements AudioCategoryRepositoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return AudioCategory::query()
            ->filter([
                new RelativeFilter('name'),
                new BooleanFilter('status'),
            ])
            ->paginate(config('constants.PAGINATION_COUNT'));
    }

    public function create($data): RedirectResponse
    {
        AudioCategory::create($data);
        return redirect()->route('admin.audio-category.index')->with('success', '👍 Əlavə edildi.');
    }

    public function getById($data): AudioCategory
    {
        return AudioCategory::findOrFail($data);
    }

    public function update($data, $id): RedirectResponse
    {
        $audioCategory = AudioCategory::findOrFail($id);
        $audioCategory->update($data);
        return redirect()->route('admin.audio-category.index')->with('success', '👍 Dəyişilik edildi.');
    }

    public function status($data): JsonResponse
    {
        return Custom::changeStatusByAjax($data, AudioCategory::class);
    }

    public function destroy($data): JsonResponse
    {
        return Custom::deleteByAjax($data, AudioCategory::class);
    }
}
