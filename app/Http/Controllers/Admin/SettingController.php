<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function update(Request $request)
    {
        $data = $request->only([
            'title', 'keyword', 'description', 'logo',
            'icon', 'domain', 'author', 'maintenance_mode',
            'phone', 'email', 'address'
        ]);
        $this->settingService->update($data);
        Cache::forget('site_setting');
        return redirect()->route('admin.settings.index')->with('success', 'Setting updated successfully');
    }
}
