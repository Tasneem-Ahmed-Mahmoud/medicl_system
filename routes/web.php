<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin/dashboard', function () {
    return view('admin.welcome');
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
Route::match(['get', 'post'], 'register', function(){
    return redirect('/');
    });
// #########################################################################################
  
// ##############################################################################################//

Route::controller(UserController::class)
->prefix('users')
->as('users.')
->group(function () {
    Route::get('/editPassword/{user}', 'editPassword')->name('editPassword');
    Route::put('/changePassword/{user}', 'changePassword')->name('changePassword');
    Route::get('/edit_password/{user}', 'edit_password')->name('edit_password');
    Route::put('/update_password/{user}', 'update_password')->name('update_password');
    Route::delete('/destroy/{user}', 'destroy')->name('destroy');
});

Route::controller(AdminController::class)
->prefix('admins')
->as('admins.')
->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{admin}', 'edit')->name('edit');
    Route::put('/update/{admin}', 'update')->name('update');
   
});

Route::controller(DoctorController::class)
->prefix('doctors')
->as('doctors.')
->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{doctor}', 'edit')->name('edit');
    Route::put('/update/{doctor}', 'update')->name('update');
    Route::get('/search', 'search');
});
Route::controller(PatientController::class)
->prefix('patients')
->as('patients.')
->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{patient}', 'edit')->name('edit');
    Route::put('/update/{patient}', 'update')->name('update');
    Route::get('/edit_password/{patient}', 'edit_password')->name('edit_password');
    Route::put('/update_password/{patient}', 'update_password')->name('update_password');
    Route::delete('/destroy/{patient}', 'destroy')->name('destroy');
    Route::get('/search', 'search');
    Route::get('/patient_search', 'patient_search');
  
});

Route::controller(ExaminationController::class)
->prefix('examinations')
->as('examinations.')
->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{examination}', 'edit')->name('edit');
    Route::put('/update', 'update')->name('update');
    Route::delete('/destroy/{examination}', 'destroy')->name('destroy');
    Route::get('/show_file/{examination}', 'show_file')->name('show_file');
    Route::get('/download_file/{examination}', 'download_file')->name('download_file');
});

Route::controller(SpecialtyController::class)
->prefix('specialties')
->as('specialties.')
->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{specialty}', 'edit')->name('edit');
    Route::put('/update/{specialty}', 'update')->name('update');
    Route::delete('/destroy/{specialty}', 'destroy')->name('destroy');
});


// ##########################################

require __DIR__.'/user.php';
// #################################3333

Route::controller(HomeController::class)
->prefix('frontend')
->as('frontend.')
->group(function () {
   
   
});
Route::get('/', [HomeController::class,'index'])->name('frontend.index');

// ###############################################33
// feedback


Route::controller(FeedbackController::class)
->prefix('feedbacks')
->as('feedbacks.')
->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::post('/store', 'store')->name('store');
    Route::delete('/destroy/{feedback}', 'destroy')->name('destroy');
});

// ########################################
// setting




Route::controller(SettingController::class)
->prefix('settings')
->as('settings.')
->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{setting}', 'edit')->name('edit');
    Route::put('/update/{setting}', 'update')->name('update');
    Route::delete('/destroy/{setting}', 'destroy')->name('destroy');
});