<?php

namespace App\Providers;

use App\Repositories\Contracts\CategoriesRepository;
use App\Repositories\Contracts\ProductsRepository;
use App\Repositories\Contracts\UsersRepository;
use App\Repositories\Eloquents\CategoriesEloquentRepository;
use App\Repositories\Eloquents\ProductsEloquentRepository;
use App\Repositories\Eloquents\UsersEloquentRepository;
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
        $this->app->bind(UsersRepository::class          , UsersEloquentRepository::class);
        $this->app->bind(CategoriesRepository::class     , CategoriesEloquentRepository::class);
        $this->app->bind(ProductsRepository::class       , ProductsEloquentRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
