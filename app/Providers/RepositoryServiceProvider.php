<?php

namespace App\Providers;

use App\Interfaces\UserInterface;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public $bindings = [
        UserInterface::class=>UserRepository::class
    ];

    public function register()
    {
        $this->app->bind(UserInterface::class,UserRepository::class);
    }
}
