<?php

namespace App\Services;

use App\Services\Interfaces\UserServiceInterface;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
/**
 * Class UserService
 * @package App\Services
 */
class UserService implements UserServiceInterface
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function getAll()
    {
        return $this->userRepository->all();
    }
    
}
