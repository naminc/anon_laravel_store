<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        $users = $this->userService->getAll();
        return view('admin.users.index', compact('users'));
    }
}
