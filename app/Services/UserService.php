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
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }
    public function paginate()
    {
        $users = $this->userRepository->getAllPaginate();
        return $users;
    }
    public function delete($id) {
        if($id) {
            $user = $this->userRepository->deleteUser($id);
            return $user;
        }
        return false;
    }
    public function create($data) {
        $user = $this->userRepository->createUser($data);
        return $user;
    }
    public function update($id, $data) {
        $user = $this->userRepository->updateUser($id, $data);
        return $user;
    }
    public function find($id) {
        $user = $this->userRepository->findUser($id);
        return $user;
    }
}
