<?php

namespace App\Repositories;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;
/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository implements UserRepositoryInterface
{
    public function __construct() {

    }
    public function findByEmail(string $email) {
        return User::where('email', $email)->first();
    }
    public function create(array $data) {
        return User::create($data);
    }
}
