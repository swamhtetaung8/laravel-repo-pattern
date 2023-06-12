<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\User;

class UserRepository implements UserInterface
{
    public function getUsers(){
        return User::all();
    }

    public function getUser($id)
    {
        return User::find($id);
    }
}
