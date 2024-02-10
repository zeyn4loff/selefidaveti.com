<?php

namespace App\Repositories\Admin\Setting;

interface SettingRepositoryInterface
{
    public function getData();

    public function update($data);

}
