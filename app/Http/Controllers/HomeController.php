<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;

class HomeController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        $data = [
            'title' => 'Trang chủ',
            'content' => 'Trang chủ',
        ];

        $users = $this->userService->paginate();
        return view('home', $data, compact('users'));
    }

    public function deleteUser($id)
    {
        $user = $this->userService->find($id);
        if($user){
            $this->userService->delete($id);
            return redirect()->route('home.page')->with('success', 'Tài khoản đã được xoá thành công.');
        }else{
            return redirect()->route('home.page')->with('error', 'Tài khoản không tồn tại.');
        }
    }

}