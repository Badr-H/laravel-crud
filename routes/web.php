<?php

use App\Http\Controllers\AuthController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\userController;
use Psy\Readline\Hoa\_Protocol;

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
    return redirect('/home');
});

Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::get('/register', [AuthController::class, 'showRegisterationForm']);


Route::get('/home', function () {
    $allPosts = Post::all();
    $userPosts = [];
    if (auth()->check()) {
        $userPosts = auth()->user()->usersPosts()->latest()->get();
    }
    return view('home', ['userPosts' => $userPosts, 'allPosts' => $allPosts]);
});

Route::post('register', [userController::class, 'register']);
Route::post('logout', [userController::class, 'logout']);
Route::post('login', [userController::class, 'login']);

// blog post related routs

Route::post('/create-post', [postController::class, 'createPost']);