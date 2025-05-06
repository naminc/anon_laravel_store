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
    public function getAllPaginate() {
        return User::paginate(12);
    }
    public function deleteUser($id) {
        return User::find($id)->delete();
    }
    public function createUser($data) {
        return User::create($data);
    }
    public function updateUser($id, $data) {
        return User::find($id)->update($data);
    }
    public function findUser($id) {
        return User::find($id);
    }

}
