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

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
