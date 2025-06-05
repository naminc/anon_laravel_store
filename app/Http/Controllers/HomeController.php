<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Services\Interfaces\SettingServiceInterface;

class HomeController extends Controller
{
    protected $settingService;
    public function __construct(SettingServiceInterface $settingService)
    {
        $this->settingService = $settingService;
    }
    public function index()
    {
        $setting = $this->settingService->get();
        return view('home', compact('setting'));
    }
}