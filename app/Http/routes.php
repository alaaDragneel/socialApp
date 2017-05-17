<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/signup', [
     'uses' => 'userController@postSignUp',
     'as' => 'signup'
]);

Route::post('/signin', [
     'uses' => 'userController@postSignIn',
     'as' => 'signin'
]);

Route::get('/logout', [
     'uses' => 'userController@getLogOut',
     'as' => 'logout'
]);

Route::get('/account', [
     'uses' => 'userController@getAcount',
     'as' => 'account'
]);

Route::post('/updateAccout', [
     'uses' => 'userController@postSaveAccount',
     'as' => 'account.save'
]);

Route::get('/dashboard', [
     'uses' => 'postController@getDashBoard',
     'as' => 'dashboard',
     'middleware' => 'auth'
]);

Route::post('/createPost', [
     'uses' => 'postController@postCreatePost',
     'as' => 'postCreate',
     'middleware' => 'auth'
]);

Route::get('/deletePost/{post_id}', [
     'uses' => 'postController@getDeletePost',
     'as' => 'post.delete',
     'middleware' => 'auth'
]);
//
// Route::post('/edit', function(\Illuminate\Http\Request $request){
//      return response()->json(['message' => $request['body']]);
// })->name('edit');
Route::post('/edit', [
     'uses' => 'postController@postEditPost',
     'as' => 'edit'
]);

Route::post('/like', [
     'uses' => 'postController@postLikePost',
     'as' => 'like'
]);
