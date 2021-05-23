<?php

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

use App\Blog;
use Illuminate\Http\Request;

Route::get('/', 'MainController@mainPage');
Route::get('/about', 'MainController@about');



Route::get('/blog/{id}', function ($id){
    $post = DB::table('blogs')->where('id', '=', $id)->first();
    return view('post',['post'=>$post]);
});

Route::get('addPost',function (){
    return view('addPost');
});
Route::post('addPost',function (Request $request){
    $input = $request->all();
    $blog = new Blog();
    $blog->title = $input['title'];
    $blog->content = $input['content'];
    $blog->bgImage = 'post-bg.jpg';
    $blog->save();
    return 'success';
});