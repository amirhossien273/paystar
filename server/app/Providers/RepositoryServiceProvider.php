<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repository\EloquentRepositoryInterface; 
use App\Repository\Eloquent\BaseRepository; 
use App\Repository\Products\ProductsRepositoryInterface; 
use App\Repository\Products\ProductsRepository; 
use App\Repository\factors\FactorRepositoryInterface; 
use App\Repository\factors\FactorRepository; 

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
       $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
       $this->app->bind(ProductsRepositoryInterface::class, ProductsRepository::class);
       $this->app->bind(FactorRepositoryInterface::class, FactorRepository::class);
    }

    public function boot() {}
}
