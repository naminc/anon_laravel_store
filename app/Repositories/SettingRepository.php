<?php

namespace App\Repositories;

use App\Models\Setting;
use App\Repositories\Interfaces\SettingRepositoryInterface;

class SettingRepository implements SettingRepositoryInterface
{
    public function find()
    {
        return Setting::find(1);
    }

    public function update(array $data)
    {
        $setting = Setting::findOrFail(1);
        $setting->update($data);
        return $setting;
    }
}
