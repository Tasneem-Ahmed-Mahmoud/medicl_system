<?php

use App\Http\Controllers\Patient_ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


Route::prefix('patient')->name('patient.')->group(function () {

Route::middleware(['guest:patient'])->group(function(){
    Route::get('/login',[LoginController::class,'login_form'])->name('login_form');

    Route::post('/login',[LoginController::class,'login'])->name('login');
    
});
Route::get('/logout',[LoginController::class,'logout'])->name('logout');


Route::controller(Patient_ProfileController::class)->middleware(['isPatient'])
->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{specialty}', 'edit')->name('edit');
    Route::put('/update/{patient}', 'update')->name('update');
    Route::delete('/destroy/{specialty}', 'destroy')->name('destroy');

Route::put('/reset_password','reset_password')->name('reset_password');
Route::get('/dashboard','dashboard')->name('dashboard');
Route::get('/edit_profile','edit_profile')->name('edit_profile');
Route::put('/update_image/{patient}', 'update_image')->name('update_image');
});


});