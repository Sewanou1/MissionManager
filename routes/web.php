<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

Route::group(['namespace' => 'App\Http\Controllers','prefix'=>'admin', 'as'=>'admin.'],function(){
    Route::get('/',function(){
        return redirect()->route('admin.auth.login');
    });

    Route::group(['prefix'=>'auth','as'=>'auth.'], function(){
        Route::get('login','LoginController@index')->name('login');
        Route::post('login', 'LoginController@submit');
        Route::get('logout','LoginController@logout')->name('logout');
    });

    Route::middleware([AdminMiddleware::class])->group(function () {
        Route::get('/', 'DashboardController@index')->name('accueil');
        Route::get('/drivers', 'DriversController@index')->name('drivers');
        Route::get('/create', 'DriversController@create')->name('drivers_create');
        Route::post('/store', 'DriversController@store')->name('drivers_store');
    });

});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
