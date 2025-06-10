<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSettingRequest;
use Illuminate\Http\Request;
use App\Services\Interfaces\SettingServiceInterface;
use Illuminate\Support\Facades\Cache;
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
    public function update(UpdateSettingRequest $request)
    {
        $this->settingService->update($request->validated());
        Cache::forget('site_setting');
        return redirect()->route('admin.settings.index')->with('success', 'Setting updated successfully');
    }
}
