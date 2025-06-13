<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use App\Services\Interfaces\SettingServiceInterface;
use Illuminate\Support\Facades\Log;

class CheckMaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    protected $settingService;
    public function __construct(SettingServiceInterface $settingService)
    {
        $this->settingService = $settingService;
    }
    public function handle(Request $request, Closure $next)
    {
        try {
            if (Schema::hasTable('settings')) {
                $setting = $this->settingService->get();
                if ($setting && $setting->maintenance_mode === 'on') {
                    if (!Auth::check() || Auth::user()->role !== 'admin') {
                        return response()->view('maintenance');
                    }
                }
            }
        } catch (\Throwable $e) {
            Log::error('[MaintenanceModeMiddleware] ' . $e->getMessage());
        }
        return $next($request);
    }
}