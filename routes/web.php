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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/friends', function () {
    return view('friends');
})->middleware(['auth', 'verified'])->name('friends');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/home/profile/index/{id}', 'ProfileController@index')->name('home.profile.index');
Route::get('/home/profile/edit/{id}','ProfileController@edit')->name('home.profile.edit');
Route::put('/home/profile/update/{id}','ProfileController@update')->name('profile.update');
Route::put('/home/profile/picture/{id}','ProfileController@updatePicture')->name('picture.update');
Route::get('/home/profile/friends','ProfileController@friendsList')->name('profile.friends');
Route::get('/home/profile/photos/{id}','ProfileController@photosList')->name('profile.photos');
Route::get('/home/profile/{id}','ProfileController@index')->name('search.friend');
Route::get('/home/profile/delete/{id}','ProfileController@userDelete')->name('user.delete');

Route::get('/home/index','PostController@indexPost')->name('user.index');
Route::post('/home/post','PostController@store')->name('user.post');

Route::get('/home/{id}/edit','PostController@editPost')->name('post.edit');
Route::put('/home/update/{id}','PostController@updatePost')->name('post.update');
Route::get('/home/delete/{id}','PostController@deletePost')->name('post.delete');
Route::put('/home/like/{id}','PostController@likePost')->name('post.like');


Route::post('/home/comment','CommentController@store')->name('comments.store');

Route::get('/home/comment/{id}/edit','CommentController@editComment')->name('comment.edit');
Route::put('/home/comment/update/{id}','CommentController@updateComment')->name('comment.update');
Route::get('/home/comment/delete/{id}','CommentController@deleteComment')->name('comment.delete');

// Route::get('search', 'SearchController@search')->name('search');
Route::get('/search','SearchController@search')->name('web.search');
Route::get('/find','SearchController@find')->name('web.find');

Route::get('/home/message/{id}','MessageController@index')->name('message.friend');
Route::post('/home/message','MessageController@store')->name('message.store');



require __DIR__.'/auth.php';
