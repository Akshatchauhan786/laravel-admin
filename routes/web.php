<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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
    return view('welcome');
});

// Admin Route 
Route::get('admin/login', [AdminController::class, 'login']);
Route::post('admin/login', [AdminController::class, 'check'])->name('admin.login');
Route::get('admin/forgot-password',[AdminController::class,'forgotpassword'])->name('admin.forgotpassword');
Route::post('admin/forgot-password',[AdminController::class,'sendPasswordResetToken'])->name('admin.sendPasswordResetToken');
Route::get('admin/forgot-password/{email}/{token}',[AdminController::class,'getPassword'])->name('admin.getPassword');
Route::post('admin/forgot-password/{email}/{token}',[AdminController::class,'updaterestpassword'])->name('admin.updaterestpassword');
// Admin login Middleware 
Route::group(['middleware'=>'admin_auth'],function(){
    // Admin login Url
    Route::get('admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('admin/edit-profile',[AdminController::class,'editprofile'])->name('admin.editprofile');
    Route::post('admin/update-profile',[AdminController::class,'updateprofile'])->name('admin.updateprofile');
    Route::get('admin/change-password',[AdminController::class,'changepassword'])->name('admin.changepassword');
    Route::post('admin/update-password',[AdminController::class,'updatepassword'])->name('admin.updatepassword');
    Route::get('admin/logout',[AdminController::class,'adminlogout'])->name('admin.logout');
});