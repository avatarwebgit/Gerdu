<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function createUser($data)
    {
        return User::create($data);
    }

    public function getUserById($id)
    {
        return User::findOrFail($id);
    }
}
