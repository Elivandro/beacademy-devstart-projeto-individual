<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/users/login', [UserController::class, 'index'])->name('users.index');
Route::get('/users/register', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/admin', function (){

    $users = \App\Models\User::all();
    // $phones = \App\Models\Phone::all();
    // $addreses = \App\Models\Address::all();


    return view('admin.users', compact('users'));

});


Route::get('/account/', [AccountController::class, 'index'])->name('account.index');