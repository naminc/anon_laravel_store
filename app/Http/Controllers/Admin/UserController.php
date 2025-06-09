<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
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
    public function store(StoreUserRequest $request)
    {
        $this->userService->create($request->validated());
        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }
    public function destroy($id)
    {
        $result = $this->userService->delete($id);
        return redirect()->route('admin.users.index')->with(
            $result ? 'success' : 'error',
            $result ? 'User deleted successfully' : 'User delete failed'
        );
    }
}
