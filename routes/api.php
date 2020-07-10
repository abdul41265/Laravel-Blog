<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Post;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



// Route::get('posts',function (Request $request) {
//     return Post::all();
// });

// Route::get('posts/{id}', function(Request $request, $id){
//     return Post::findorFail($id);
// });

// Route:: get('posts','Api\PostController@index');
// Route:: get('posts/{id}','Api\PostController@show');

Route::apiResource('posts', 'Api\PostController')->only(['index', 'show']);

Route::post('admin/create', [
    'uses' => 'Api\PostController@postAdminCreate',
    'as' => 'admin.create'
]);

Route::get('post/{id}/like', [
    'uses' => 'Api\PostController@getLikePost',
    'as' => 'blog.post.like'
]);

Route::post('admin/edit', [
    'uses' => 'Api\PostController@postAdminUpdate',
    'as' => 'admin.update'
]);