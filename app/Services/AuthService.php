<?php

namespace App\Services;

use App\Services\Interfaces\AuthServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\UserRepositoryInterface;
/**
 * Class AuthService
 * @package App\Services
 */
class AuthService implements AuthServiceInterface
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function register(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'user';
        $data['status'] = 'active';
        return $this->userRepository->create($data);
    }
    
    public function login(array $credentials) : bool
    {
        $user = $this->userRepository->findByEmail($credentials['email']);
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            return true;
        }
        return false;
    }
}