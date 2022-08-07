<?php

namespace App\Interfaces;

use App\Models\User;

interface UserServiceInterface
{
    public function getUserById(int $id):User;

    public function getFirstUser():User;

    public function createUser(array $user):User;
}
