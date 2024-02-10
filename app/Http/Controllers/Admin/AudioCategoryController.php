<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AudioCategoryRequest;
use App\Repositories\Admin\AudioCategory\AudioCategoryRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AudioCategoryController extends Controller
{
    private AudioCategoryRepositoryInterface $audioCategoryRepository;

    public function __construct(AudioCategoryRepositoryInterface $audioCategoryRepository)
    {
        $this->audioCategoryRepository = $audioCategoryRepository;
    }

    public function index(): View
    {
        $results = $this->audioCategoryRepository->getAll();
        return view('admin.audio-category.index')->with(['results' => $results]);
    }

    public function create(): View
    {
        return view('admin.audio-category.create');
    }

    public function store(AudioCategoryRequest $request): RedirectResponse
    {
        return $this->audioCategoryRepository->create($request->validated());
    }

    public function edit(int $id): View
    {
        $result = $this->audioCategoryRepository->getById($id);
        return view('admin.audio-category.edit')->with(['result' => $result]);
    }

    public function update(AudioCategoryRequest $request, int $id): RedirectResponse
    {
        return $this->audioCategoryRepository->update($request->validated(), $id);
    }

    public function status(Request $request): JsonResponse
    {
        return $this->audioCategoryRepository->status($request);
    }

    public function destroy(Request $request): JsonResponse
    {
        return $this->audioCategoryRepository->destroy($request);
    }
}
