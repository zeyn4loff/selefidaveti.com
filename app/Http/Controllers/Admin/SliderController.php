<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Repositories\Admin\Slider\SliderRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SliderController extends Controller
{
    private SliderRepositoryInterface $sliderRepository;

    public function __construct(SliderRepositoryInterface $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }

    public function index(): View
    {
        $results = $this->sliderRepository->getAll();
        return view('admin.slider.index')->with(['results' => $results]);
    }

    public function create(): View
    {
        return view('admin.slider.create');
    }

    public function store(SliderRequest $request): RedirectResponse
    {
        return $this->sliderRepository->create($request->validated());
    }

    public function edit(int $id): View
    {
        $result = $this->sliderRepository->getById($id);
        return view('admin.slider.edit')->with(['result' => $result]);
    }

    public function update(SliderRequest $request, int $id): RedirectResponse
    {
        return $this->sliderRepository->update($request->validated(), $id);
    }

    public function status(Request $request): JsonResponse
    {
        return $this->sliderRepository->status($request);
    }

    public function destroy(Request $request): JsonResponse
    {
        return $this->sliderRepository->destroy($request);
    }
}
