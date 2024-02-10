<?php

namespace App\Repositories\Admin\Audio;

use App\Helper\Custom;
use App\Models\Audio;
use Baro\PipelineQueryCollection\BooleanFilter;
use Baro\PipelineQueryCollection\RelativeFilter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;

class AudioRepository implements AudioRepositoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return Audio::query()
            ->filter([
                new RelativeFilter('title'),
                new BooleanFilter('status'),
            ])
            ->paginate(config('constants.PAGINATION_COUNT'));
    }

    public function create($data): RedirectResponse
    {
        if (Arr::has($data, 'audio') && !is_null($data['audio'])) {
            $filename = Custom::uploadFile($data['audio'], 'audio');

            if (!is_null($filename)) {
                $data['audio'] = $filename;
            }
        }
        Audio::create($data);
        return redirect()->route('admin.audio.index')->with('success', '👍 Əlavə edildi.');
    }

    public function getById($data): Audio
    {
        return Audio::findOrFail($data);
    }

    public function update($data, $id): RedirectResponse
    {
        $audio = Audio::findOrFail($id);
        if (Arr::has($data, 'audio') && !is_null($data['audio'])) {
            $filename = Custom::uploadFile($data['audio'], 'audio');

            if (!is_null($filename)) {
                Custom::deleteFile($audio->audio);
                $data['audio'] = $filename;
            }
        }
        $audio->update($data);
        return redirect()->route('admin.audio.index')->with('success', '👍 Dəyişilik edildi.');
    }

    public function status($data): JsonResponse
    {
        return Custom::changeStatusByAjax($data, Audio::class);
    }

    public function destroy($data): JsonResponse
    {
        $audio = Audio::findOrFail($data['id']);

        if (!is_null($audio->audio)) {
            Custom::deleteFile($audio->audio);
        }
        return Custom::deleteByAjax($data, Audio::class);
    }
}
