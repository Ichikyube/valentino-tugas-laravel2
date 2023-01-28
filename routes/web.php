<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\ProductsController;
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

Route::view('/', 'welcome')->name('welcome');
Route::name('auth.')->group(function(){
    Route::get('/login',[AuthController::class, 'login'])->name('login');
    Route::get('/register',[AuthController::class, 'register'])->name('register');
    Route::post('/login',[AuthController::class, 'login'])->name('userLogin');
    Route::post('/register',[AuthController::class, 'register'])->name('storeUser');
    Route::post('/logout',[AuthController::class, 'logout'])->middleware('auth')->name('logout');
});
Route::get('/dashboard', [AuthController::class, 'dash'])->middleware('auth')->name('dashboard');

//Route::get('/dashboard', [PostsController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix("brands")
    ->name("products.")
    ->controller(ProductsController::class)
    ->group(function(){
        Route::get("/", "index")->name("list");
        Route::get("/{id}", "show")->name("show");
        Route::get("/create", "create")->name("create");
        Route::post("/store", "store")->name("store");
        Route::put("/edit/{id}", "update")->name("update");
        Route::delete("/destroy/{id}", "destroy")->name("destroy");
});

Route::prefix("blogs")
    ->name("posts.")
    ->controller(PostsController::class)
    ->group(function(){
        Route::get("/", "index")->name("list");
        Route::get("/create", "create")->name("create");
        Route::get("/{slug}", "show")->name("show");
        Route::post("/store", "store")->name("store");
        Route::put("/edit/{id}", "update")->name("update");
        Route::delete("/destroy/{id}", "destroy")->name("destroy");
});

Route::prefix("files")
    ->name("files.")
    ->controller(FilesController::class)
    ->group(function(){
        Route::get("/list", "index")->name("list");
        Route::get("/{id}", "show")->name("show");
        Route::get("/create", "create")->name("create");
        Route::post("/store", "store")->name("store");
        Route::put("/edit/{id}", "update")->name("update");
        Route::delete("/destroy/{id}", "destroy")->name("destroy");
});
