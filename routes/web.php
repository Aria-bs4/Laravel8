<?php

use App\Models\Post;
use Faker\Core\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
    return view('posts', [
        'posts' => Post::join('users', 'users.id', '=', 'posts.author')
                ->get(['users.name', 'posts.*'])
    ]);
});

Route::get('posts/{post}', function ($id) {
    return view('post', [
        'post' => Post::join('users', 'users.id', '=', 'posts.author')
            ->where('posts.id',$id)
            ->get(['users.name', 'posts.*'])
            ->first()
    ]);
});


