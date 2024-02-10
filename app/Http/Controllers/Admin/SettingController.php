<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SettingRequest;
use App\Repositories\Admin\Setting\SettingRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SettingController
{
    private SettingRepositoryInterface $settingRepository;

    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function index(): View
    {
        $result = $this->settingRepository->getData();
        return view('admin.setting.index')->with(['result' => $result]);
    }

    public function update(SettingRequest $request): RedirectResponse
    {
        return $this->settingRepository->update($request->validated());
    }
}
