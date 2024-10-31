<?php
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\DashboardController;

Route::group([
    'middleware'=>['auth'],
    'as' =>'dashboard.',
    'prefix' => 'dashboard'


], function () {
    Route::get('/', [DashboardController::class, 'index'])
        
        ->name('dashboard');

    Route::resource('/categories', CategoriesController::class);
       

});
//Route::middleware('auth')->as('dashboard.')->prefix('dashboard')->group(function(){

//});

