<?php

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Attachment;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
    return view('welcome',[
        'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(9)->withQueryString(),
    ]);
})->name('home');

Route::get('/dashboard', function (User $user, Category $category, Post $post) {
    $user_count = $user->count();
    $category_count= $category->count();
    $post_count= $post->count();
    return view('dashboard', [
        'user' => $user_count,
        'category'=> $category_count,
        'post'=>$post_count
    ]);
})->middleware(['admin', 'auth'])->name('dashboard');

//PORTFOLIO
Route::get('/portfolio', function () {
    return view('portfolio');
            })->name('portfolio');

Route::get('post/{post:uuid}',[PostController::class,'show'])->name('post.show');

//PORTFOLIO
Route::middleware(['auth','admin'])->prefix('session')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/pr,ofile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Post Route
    Route::get('posts',[PostController::class,'index'])->name('post.index');
    Route::get('post/create',[PostController::class,'create'])->name('post.create');
    Route::get('post/edit/{post:uuid}',[PostController::class,'edit'])->name('post.edit');
    Route::post('post/store',[PostController::class,'store'])->name('post.store');
    Route::put('post/update/{post:uuid}',[PostController::class,'update'])->name('post.update');
    Route::delete('photo/delete/{attachment:uuid}',[AttachmentController::class,'destroy'])->name('photo.delete');

    //Categories Route
    Route::get('categories', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('category/edit/{category:slug}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::patch('category/update/{category:slug}', [CategoryController::class, 'update'])->name('category.update');

    //Categories Route
    Route::get('users/', [ProfileController::class, 'index'])->name('users.index');
    Route::get('users/create', [ProfileController::class, 'create'])->name('users.create');
    Route::post('users/store', [ProfileController::class, 'store'])->name('users.store');
    Route::get('users/edit/{user:uuid}', [ProfileController::class, 'userEdit'])->name('users.edit');
    Route::patch('users/update/{user:uuid}', [ProfileController::class, 'userUpdate'])->name('users.update');
});

require __DIR__.'/auth.php';
