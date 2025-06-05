<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\SettingServiceInterface;

class SettingController extends Controller
{
    protected $settingService;
    public function __construct(SettingServiceInterface $settingService)
    {
        $this->settingService = $settingService;
    }
    public function index()
    {
        $setting = $this->settingService->get();
        return view('admin.settings.index', compact('setting'));
    }
}
