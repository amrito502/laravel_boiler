<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('admin.dashboard');
});
// =================================================
// admin-routes=====================================

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){

    // admin login
    Route::match(['get','post'],'login','AdminController@admin_login')->name('admin.login');
    

    Route::group(['middleware'=>['admin']], function(){
        Route::get('dashboard','AdminController@admin_dashboard')->name('admin.dashboard');
        Route::get('logout','AdminController@admin_logout')->name('admin.logout');
        Route::match(['get','post'],'update-admin-password','AdminController@update_admin_password')->name('update_admin.password');
        Route::post('check-current-password','AdminController@checkAdminPassword');

    });


    
});








// =================================================

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
