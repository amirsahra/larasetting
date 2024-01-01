<?php

namespace Amirsahra\Larasetting;


use Amirsahra\Larasetting\Exceptions\SettingRecordNotFoundException;
use Amirsahra\Larasetting\Models\SettingRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Larasetting
{
    protected SettingRepository $settingRepository;

    public function __construct()
    {
        $this->settingRepository = new SettingRepository(new Models\Larasetting());
    }

    /**
     * @throws SettingRecordNotFoundException
     */
    public function getSetting($key = null, $default = null, $is_active = null)
    {
        if (is_null($key)) {
            return $this->getAllSettings($is_active);
        }

        if (is_null($default)) {
            return $this->findSetting($key, $is_active);
        }

        return $this->findOrAddSetting($key, $default, $is_active);
    }

    /**
     * @throws SettingRecordNotFoundException
     */
    public function setSetting($key, $value, $is_active = null)
    {
        if (is_null($key)) {
            return $this->getAllSettings($is_active);
        }

        if (is_null($value)) {
            return $this->findSetting($key, $is_active);
        }

        return $this->updateOrAddSetting($key, $value, $is_active);
    }

    private function getAllSettings($is_active)
    {
        return $this->settingRepository->all($is_active);
    }

    /**
     * @throws SettingRecordNotFoundException
     */
    private function findSetting($key, $is_active)
    {
        return $this->settingRepository->find($key, $is_active);
    }

    private function findOrAddSetting($key, $default, $is_active)
    {
        try {
            return $this->settingRepository->find($key, $is_active);
        } catch (SettingRecordNotFoundException $settingRecordNotFoundException) {
            return $this->settingRepository->create(['key' => $key, 'value' => $default, 'is_active' => $is_active]);
        }
    }

    /**
     * @throws SettingRecordNotFoundException
     */
    private function updateOrAddSetting($key, $default, $is_active)
    {
        $data = ['key' => $key, 'value' => $default, 'is_active' => $is_active ?? false];
        try {
            return $this->settingRepository->update($key, $data);
        } catch (ModelNotFoundException $exception) {
            return $this->settingRepository->create($data);
        }
    }
}
