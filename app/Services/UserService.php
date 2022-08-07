<?php


namespace App\Services;


use App\Interfaces\CategoryServiceInterface;
use App\Interfaces\UserServiceInterface;
use App\Models\Ads;
use App\Models\User;

class UserService implements UserServiceInterface
{

    /**
     *
     * @param int $id
     * @return User
     */
    public function getUserById(int $id): User
    {
        return User::query()->findOrFail($id);
    }

    /**
     *
     * @return User
     */
    public function getFirstUser(): User
    {
        return User::query()->firstOrFail();
    }

    /**
     *
     * @param array $user
     * @return User
     */
    public function createUser(array $user): User
    {
        return User::query()->create($user);
    }


}
