<?php

use Illuminate\Routing\Route as RoutingRoute;
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

// Route::get('/', function () {
//     return view('home.index');
// })->name('home.index');

// Route::get('contact', function () {
//     return 'Contact';
// })->name('home.contact');

Route::view('/', 'home.index')
    ->name('home.index');
Route::view('/contact', 'home.contact')
    ->name('home.contact');

$posts = [
        1 => [
            'title' => 'Intro to Laravel',
            'content' => 'This is a short intro to Laravel',
            'is_new' => true,
            'has_comments' => true
        ],
        2 => [
            'title' => 'Intro to PHP',
            'content' => 'This is a short intro to PHP',
            'is_new' => false
        ],
        3 => [
            'title' => 'Intro to Javascript',
            'content' => 'This is a short intro to Javascript',
            'is_new' => false
        ]
];

Route::get('/posts', function () use ($posts) {
    // compact($post) it's the same ['post' => $posts]
    return view('posts.index', ['posts' => $posts]);
});

Route::get('posts/{id}', function ($id) use ($posts) {
    abort_if(!isset($posts[$id]), 404);
    // return 'Blog post '.$id;
    return view('posts.show', ['post' => $posts[$id]]);
})
// ->where([
//     'id' => '[0-9]+'x
//     ])
->name('posts.show');

Route::get('recent-posts/{days_ago?}', function ($days_ago = 20) {
    return 'Recent post form '.$days_ago.' days ago';
})->name('post.recent.index');