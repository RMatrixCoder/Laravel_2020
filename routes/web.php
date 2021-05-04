<?php

use App\Models\User;
use App\Mail\PostLiked;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Services\Notification\Notification;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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
Route::get('/',function(){
    return view('home');
})->name('home');

Route::prefix('dashboard')->middleware(['role:admin'])->group(function () {
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    Route::post('/sendemail',[NotificationController::class,'sendEmail'])->name('dashboard.send.email');
    Route::get('/users',[UserController::class,'index'])->name('dashboard.users');
    Route::get('/{user:name}/edit',[UserController::class,'edit'])->name('dashboard.user.edit');
    Route::post('/{user}/update',[UserController::class,'update'])->name('dashboard.user.update');
    Route::get('/dashboard/role',[RoleController::class,'index'])->name('dashboard.roles');
    Route::post('/role/store',[RoleController::class,'store'])->name('dashboard.role.store');
    Route::get('/role/{role}/edit',[RoleController::class,'edit'])->name('dashboard.role.edit');
    Route::post('/role/{role}/update',[RoleController::class,'update'])->name('dashboard.role.update');
});


Route::get('/users/{user:username}/posts',[UserPostController::class,'index'])->name('users.post');

Route::post('/logout',[LogoutController::class,'logout'])->name('logout');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);

Route::get('/posts',[PostController::class,'index'])->name('posts');
Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');
Route::post('/posts',[PostController::class,'store'])->middleware(['auth']);
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');

Route::post('/posts/{post}/likes',[PostLikeController::class,'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes',[PostLikeController::class,'destroy'])->name('posts.likes');

