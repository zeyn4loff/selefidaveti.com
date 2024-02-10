<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AudioRequest;
use App\Models\AudioCategory;
use App\Repositories\Admin\Audio\AudioRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AudioController extends Controller
{
    private AudioRepositoryInterface $audioRepository;

    public function __construct(AudioRepositoryInterface $audioRepository)
    {
        $this->audioRepository = $audioRepository;
    }

    public function index(): View
    {
        $results = $this->audioRepository->getAll();
        return view('admin.audio.index')->with(['results' => $results]);
    }

    public function create(): View
    {
        $audio_categories = AudioCategory::where("status", config('constants.ACTIVE'))->get();
        return view('admin.audio.create')->with(["audio_categories" => $audio_categories]);
    }

    public function store(AudioRequest $request): RedirectResponse
    {
        return $this->audioRepository->create($request->validated());
    }

    public function edit(int $id): View
    {
        $result = $this->audioRepository->getById($id);
        $audio_categories = AudioCategory::where("status", config('constants.ACTIVE'))->get();
        return view('admin.audio.edit')->with(['result' => $result, "audio_categories" => $audio_categories]);
    }

    public function update(AudioRequest $request, int $id): RedirectResponse
    {
        return $this->audioRepository->update($request->validated(), $id);
    }

    public function status(Request $request): JsonResponse
    {
        return $this->audioRepository->status($request);
    }

    public function destroy(Request $request): JsonResponse
    {
        return $this->audioRepository->destroy($request);
    }
}
