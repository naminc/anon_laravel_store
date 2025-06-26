<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\UserServiceInterface;
use App\Services\Interfaces\OrderServiceInterface;
use App\Http\Requests\UpdateAccountRequest;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected $userService;
    protected $orderService;
    public function __construct(UserServiceInterface $userService, OrderServiceInterface $orderService)
    {
        $this->userService = $userService;
        $this->orderService = $orderService;
    }
    public function profile()
    {
        $user = $this->userService->findById(auth()->user()->id);
        $orders = $this->orderService->getByUserId(auth()->user()->id);
        return view('user.profile', compact('user', 'orders'));
    }
    public function update(UpdateAccountRequest $request)
    {
        $this->userService->updateProfile(auth()->user()->id, $request->validated());
        return redirect()->route('user.profile')->with('success', 'User updated successfully');
    }
    public function changePassword(ChangePasswordRequest $request)
    {
        $result = $this->userService->changePassword($request->validated());
        return redirect()->route('user.profile')->with(
            $result ? 'success' : 'error',
            $result ? 'Password changed successfully.' : 'Old password is incorrect.'
        );
    }
    public function showOrder($id)
    {
        $order = $this->orderService->findById($id);
        return view('user.order', compact('order'));
    }
}