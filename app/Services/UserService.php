<?php

namespace App\Services;

use App\Services\Interfaces\UserServiceInterface;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
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
        return Cache::rememberForever('all_users', function () {
            return $this->userRepository->all();
        });
    }
    public function create(array $data)
    {
        Cache::forget('all_users');
        $data['password'] = Hash::make($data['password']);
        return $this->userRepository->create($data);
    }
    public function update($id, array $data)
    {
        Cache::forget('all_users');
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        return $this->userRepository->update($id, $data);
    }
    public function delete($id)
    {
        Cache::forget('all_users');
        return $this->userRepository->delete($id);
    }
    public function findById($id)
    {
        return $this->userRepository->find($id);
    }
}