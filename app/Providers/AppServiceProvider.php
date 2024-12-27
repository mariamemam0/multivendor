<?php

namespace App\Providers;

use App\Services\CurrencyConverter;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceResponse;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('currency.converter',function(){
           return new CurrencyConverter(config('services.currency_converter.api_key'));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        App::setLocale(request('locale','en'));
        JsonResource::withoutWrapping();
       Validator::extend('filter',function ($attribute, $value,$params){
        return ! in_array(strtolower($value), $params);
    }, 'The value is prohipted');


        Paginator::useBootstrapFour();
      //Paginator::defaultView('pagination.custom');
    }
}
