<?php

namespace App\Providers;

use App\Repositories\ClassroomRepositoryInterface;
use App\Repositories\Eloquent\ClassroomRepository;
use App\Repositories\Eloquent\MentorRepository;
use App\Repositories\Eloquent\SchoolRepository;
use App\Repositories\Eloquent\StudentRepository;
use App\Repositories\MentorRepositoryInterface;
use App\Repositories\SchoolRepositoryInterface;
use App\Repositories\StudentRepositoyInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SchoolRepositoryInterface::class, SchoolRepository::class);
        $this->app->bind(ClassroomRepositoryInterface::class, ClassroomRepository::class);
        $this->app->bind(MentorRepositoryInterface::class, MentorRepository::class);
        $this->app->bind(StudentRepositoyInterface::class, StudentRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
