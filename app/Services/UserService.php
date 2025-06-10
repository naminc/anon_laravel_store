<?php

namespace App\Services;

use App\Services\Interfaces\UserServiceInterface;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use Illuminate\Support\Facades\Hash;
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
    public function create(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->userRepository->create($data);
    }
    public function update($id, array $data)
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        return $this->userRepository->update($id, $data);
    }
    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }
}