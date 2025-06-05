<?php

namespace App\Services;

use App\Services\Interfaces\SettingServiceInterface;
use App\Repositories\Interfaces\SettingRepositoryInterface;
/**
 * Class SettingService
 * @package App\Services
 */
class SettingService implements SettingServiceInterface
{
    protected $settingRepository;

    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function get()
    {
        return $this->settingRepository->find();
    }

    public function update(array $data)
    {
        return $this->settingRepository->update($data);
    }
}
