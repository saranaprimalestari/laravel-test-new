<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckOngkirController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Faker\Guesser\Name;
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
	return view('home', [
		"title" => "Home",
		"active" => "Home",
	]);
});

Route::get('/about', function () {
	return view('about', [
		"title" => "About",
		"active" => "About",
		"name" => "Riduan",
		"email" => "riduan@saranaprimalestari.com",
		"jabatan" => "IT STAFF"
	]);
});

//  get = method 
// /posts = halaman / url yg dituju
// PostController::class = merujuk ke controller post yg merupakan class
// 'index' = nama method

Route::get('/posts', [PostController::class, 'index']);

//untuk redirect dimana bukan pakai ID maka menggunakan :slug
Route::get('posts/{post:slug}', [PostController::class, 'show']);

// Route::get('/categories', [CategoryController::class, 'index']);

// Route::get('/categories/{category:slug}', [CategoryController::class, 'showCategory']);

// Route::get('/author/{author:username}', function (User $author) {
// 	return view('posts', [
// 		'title' => "Post By Author : $author->name",
// 		"active" => "posts",
// 		'posts' => $author->posts->load('category', 'author'),
// 	]);
// });

Route::get('/login', [LoginController::class, 'index'])->Name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard',function(){
	return view('dashboard.index',[
		'title' => 'Dashboard',
		// 'active' => 'dashboard'
	]);
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::name('simpan')->post('/dashboard/postssss', [DashboardPostController::class,'simpan'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::get('/ongkir', [CheckOngkirController::class, 'index']);
Route::post('/ongkir', [CheckOngkirController::class, 'check_ongkir']);
Route::get('/cities/{province_id}',[CheckOngkirController::class, 'getCities']);