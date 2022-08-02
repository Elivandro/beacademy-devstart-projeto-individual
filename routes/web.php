<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AccountController,
    ProductController
};

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function (){
    Route::get('/dashboard', [AccountController::class, "index"])->name('account.index');
    Route::get('/new/address', [AccountController::class, "regAddress"])->name('regaddress.index');
    Route::get('/new/phone', [AccountController::class, "regPhone"])->name('regphone.index');
    Route::put('/photo/{id}/update', [AccountController::class, "updateImg"])->name('image.profile');
    Route::get('/update/{id}/address', [AccountController::class, "editaddress"])->name('editaddress.index');
    Route::get('/update/{id}/phone', [AccountController::class, "editphone"])->name('editphone.index');
    Route::put('/address/{id}/updated', [AccountController::class, "updateaddress"])->name('updateaddress.updated');
    Route::put('/phone/{id}/updated', [AccountController::class, "updatephone"])->name('updatephone.updated');
    Route::post('/address/{id}/registered', [AccountController::class, "storeaddress"])->name('create.address');
    Route::post('/phone/{id}/registered', [AccountController::class, "storephone"])->name('create.phone');
    Route::delete("/phone/{id}/delete", [AccountController::class, "phonedestroy"])->name("phone.destroy");
    Route::delete("/address/{id}/delete", [AccountController::class, "addressdestroy"])->name("address.destroy");
});

Route::controller(ProductController::class)->group(function (){
    Route::get('/', 'index')->name('products.index');
});