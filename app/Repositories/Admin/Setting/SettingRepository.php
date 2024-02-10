<?php

namespace App\Repositories\Admin\Setting;

use App\Helper\Custom;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;

class SettingRepository implements SettingRepositoryInterface
{

    public function getData(): Setting
    {
        return Setting::findOrFail(config('constants.FIRST_ID'));
    }

    public function update($data): RedirectResponse
    {
        $setting = Setting::findOrFail(config('constants.FIRST_ID'));

        if (Arr::has($data, 'logo_white') && !is_null($data['logo_white'])) {
            $filename = Custom::uploadFile($data['logo_white'], 'setting');

            if (!is_null($filename)) {
                Custom::deleteFile($setting->logo);
                $data['logo_white'] = $filename;
            }
        }

        if (Arr::has($data, 'logo_black') && !is_null($data['logo_black'])) {
            $filename = Custom::uploadFile($data['logo_black'], 'setting');

            if (!is_null($filename)) {
                Custom::deleteFile($setting->logo);
                $data['logo_black'] = $filename;
            }
        }

        if (Arr::has($data, 'favicon') && !is_null($data['favicon'])) {
            $filename = Custom::uploadFile($data['favicon'], 'setting');

            if (!is_null($filename)) {
                Custom::deleteFile($setting->favicon);
                $data['favicon'] = $filename;
            }
        }

        $setting->update($data);
        return redirect()->route('admin.setting.index')->with('success', '👍 Düzəliş edildi.');
    }
}
