<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserControllerlist;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ApiController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\Admin\FrontpageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FlightController;
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


Route::get('/clear', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
    });

// Route::get('/', [FrontController::class, 'index']);

// Admin Route 
Route::get('/', [FrontController::class, 'index']);
Route::get('admin/login', [AdminController::class, 'login']);
Route::post('admin/login', [AdminController::class, 'check'])->name('admin.login');
Route::get('admin/forgot-password',[AdminController::class,'forgotpassword'])->name('admin.forgotpassword');
Route::post('admin/forgot-password',[AdminController::class,'sendPasswordResetToken'])->name('admin.sendPasswordResetToken');
Route::get('admin/forgot-password/{email}/{token}',[AdminController::class,'getPassword'])->name('admin.getPassword');
Route::post('admin/forgot-password/{email}/{token}',[AdminController::class,'updaterestpassword'])->name('admin.updaterestpassword');
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->middleware('auth')->name('admin.dashboard');
// Admin login Middleware 
Route::group(['middleware'=>'admin_auth'],function(){

    // Admin login Url
    Route::get('/admin/dashboard', [FrontpageController::class, 'dashboard'])->name('admin.dashboard');
      Route::get('admin/edit-profile',[AdminController::class,'editprofile'])->name('admin.profile');
      Route::post('admin/update-profile',[AdminController::class,'updateprofile'])->name('admin.profile.store');
      Route::get('admin/change-password',[AdminController::class,'changepassword'])->name('admin.change.password');
      Route::post('admin/update-password',[AdminController::class,'updatepassword'])->name('update.password');
      Route::get('admin/logout',[AdminController::class,'adminlogout'])->name('admin.logout');
    
    // Blog Url
    // Route::get('admin/blog-listing', [BlogsController::class, 'blog'])->name('admin.blogs');
    // Route::get('admin/add-blog', [BlogsController::class, 'blog'])->name('admin.addblogs');
    // Route::post('/admin/blog/store', [BlogsController::class, 'store'])->name('store.blog');
    // Route::post('admin/edit-blog/{id}', [BlogsController::class, 'update'])->name('update.blog');
    // Route::delete('admin/update-blog/{id}', [BlogsController::class, 'destroy'])->name('delete.blog');
    // Route::get('admin/blog/{id}/edit', [BlogsController::class, 'edit'])->name('edit.blog');

    // blog Controller
    Route::get('admin/view-blog',[BlogsController::class,'viewblog'])->name('admin.viewblog');
    Route::get('admin/add-blog',[BlogsController::class,'addblog'])->name('admin.addblog');
    Route::post('admin/add-blog',[BlogsController::class,'insertdata'])->name('admin.insertdata');
    Route::get('admin/edit-blog/{id}',[BlogsController::class,'editblog'])->name('admin.editblog');
    Route::put('admin/update-blog/{id}',[BlogsController::class,'updateblog'])->name('admin.updateblog');
    Route::get('admin/delete-blog/{id}',[BlogsController::class,'delete'])->name('admin.delete');
    Route::get('admin/blog/approved/{id}', [BlogsController::class, 'approved'])->name('approved');
    
});

// Route::prefix('/admin')->name('admin.')->group(function() {
  Route::get('/front/blogs', [FrontpageController::class, 'viewblog'])->name('viewblog');
  Route::get('/front/blogs/{slug}', [FrontpageController::class, 'viewBlogBySlug'])->name('viewBlogBySlug');
 Route::get('/front/blogs/{id}', [FrontpageController::class, 'viewBlogById'])->name('viewBlogById');
// });

















