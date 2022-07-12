<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    IndexController,
    LoginController,
    UserController,
    AccountController
};

Route::controller(IndexController::class)->group(function ()
{
    Route::get('/contact', 'contact')->name('index.contact');
});

Route::controller(LoginController::class)->group(function ()
    {
        Route::post('/login',"login")->name("login.index");
        Route::post('/logout',"logout")->name("logout.index");
    });

Route::controller(UserController::class)->group(function ()
{
    Route::get('/', 'login')->name('users.login');
    Route::get('/users/register', 'create')->name('users.create');
    Route::post('/users/registered', 'store')->name('users.store');
});

Route::controller(AccountController::class)->group(function (){
    Route::get('/dashboard', "index")->name('account.index');
});

Route::get('/admin', function (){

    $users = \App\Models\User::with('phones', 'addresses')->get();

    return view('dashboard.users', compact('users'));

});


Route::get('/account/user', [UserController::class, 'show'])->name('users.show');

Route::group(['middleware' => 'auth'], function (){
        
});