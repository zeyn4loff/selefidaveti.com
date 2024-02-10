<?php

namespace App\Repositories\Admin\Slider;

use App\Helper\Custom;
use App\Models\Slider;
use Baro\PipelineQueryCollection\BooleanFilter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;

class SliderRepository implements SliderRepositoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return Slider::query()
            ->filter([
                new BooleanFilter('status'),
            ])
            ->paginate(config('constants.PAGINATION_COUNT'));
    }

    public function create($data): RedirectResponse
    {
        if (Arr::has($data, 'image') && !is_null($data['image'])) {
            $filename = Custom::uploadFile($data['image'], 'slider');

            if (!is_null($filename)) {
                $data['image'] = $filename;
            }
        }
        Slider::create($data);
        return redirect()->route('admin.slider.index')->with('success', '👍 Əlavə edildi.');
    }

    public function getById($data): Slider
    {
        return Slider::findOrFail($data);
    }

    public function update($data, $id): RedirectResponse
    {
        $slider = Slider::findOrFail($id);
        if (Arr::has($data, 'image') && !is_null($data['image'])) {
            $filename = Custom::uploadFile($data['image'], 'slider');

            if (!is_null($filename)) {
                Custom::deleteFile($slider->image);
                $data['image'] = $filename;
            }
        }
        $slider->update($data);
        return redirect()->route('admin.slider.index')->with('success', '👍 Dəyişilik edildi.');
    }

    public function status($data): JsonResponse
    {
        return Custom::changeStatusByAjax($data, Slider::class);
    }

    public function destroy($data): JsonResponse
    {
        $slider = Slider::findOrFail($data['id']);

        if (!is_null($slider->image)) {
            Custom::deleteFile($slider->image);
        }
        return Custom::deleteByAjax($data, Slider::class);
    }
}
