<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceResponse;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        JsonResource::withoutWrapping();
       Validator::extend('filter',function ($attribute, $value,$params){
        return ! in_array(strtolower($value), $params);
    }, 'The value is prohipted');


        Paginator::useBootstrapFour();
      //Paginator::defaultView('pagination.custom');
    }
}
