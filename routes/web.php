<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Post\ShowController;
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

Route::get('/',[IndexController::class,'index'])->name('main.index');
Route::get('/search',[\App\Http\Controllers\Search\IndexController::class,'index'])->name('search.index');
Route::get('/category/{category}/posts',[\App\Http\Controllers\Category\Post\ShowController::class,'show'])->name('category.posts.show');
Route::prefix('post')->group(function(){
    Route::get('/{post}',[ShowController::class,'show'])->name('post.show');
    Route::post('/{post}/comment',[\App\Http\Controllers\Post\Comment\StoreController::class,'store'])->name('post.comment.store');
    Route::post('/{post}/like',[\App\Http\Controllers\Post\Like\StoreController::class,'store'])->name('post.like.store');
});



Route::prefix('personal')->group(function(){
    Route::get('/login',[\App\Http\Controllers\Personal\Login\IndexController::class,'index'])->name('personal.login.index');
    Route::get('/register',[\App\Http\Controllers\Personal\Register\IndexController::class,'index'])->name('personal.register.index');

    Route::group(['middleware'=>['auth','verified']],function(){
       Route::get('/',[\App\Http\Controllers\Personal\Main\IndexController::class,'index'])->name('personal.main.index');
       Route::get('/liked',[\App\Http\Controllers\Personal\Liked\IndexController::class,'index'])->name('personal.liked.index');
       Route::get('/comment',[\App\Http\Controllers\Personal\Comment\IndexController::class,'index'])->name('personal.comment.index');
       Route::get('/comment/{comment}/edit',[\App\Http\Controllers\Personal\Comment\EditController::class,'edit'])->name('personal.comment.edit');
       Route::patch('/comment/{comment}',[\App\Http\Controllers\Personal\Comment\UpdateController::class,'update'])->name('personal.comment.update');
    });
});

Route::group(['middleware'=>['auth','admin','verified']],function(){
    Route::get('admin/',[\App\Http\Controllers\Admin\Main\IndexController::class,'index'])->name('admin.main.index');

    Route::resources([
        'admin/categories'=>\App\Http\Controllers\Admin\Category\CategoryController::class,
        'admin/tags'=>\App\Http\Controllers\Admin\Tag\TagController::class,
        'admin/posts'=>\App\Http\Controllers\Admin\Post\PostController::class,
        'admin/users'=>\App\Http\Controllers\Admin\User\UserController::class,
    ]);
});


Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


