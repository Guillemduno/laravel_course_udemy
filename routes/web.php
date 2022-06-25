<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Iluminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request as HttpRequest;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;

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
Route::get('/', [HomeController::class, 'home'])
        ->name('home.index');
        // ->middleware('auth');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/single', AboutController::class)->name('home.single');


Route::resource('users', UserController::class);
Route::resource('books', BookController::class);
Route::resource('posts', PostController::class);
    // ->only(['index', 'show', 'create', 'store', 'edit', 'update']);


$users = [
    1 => [
        'name' => 'Guillem'
    ],
    2 => [
        'name' => 'Carol'
    ]
];

Route::prefix('/fun')->name('fun.')->group(function() use($users){

    Route::get('/responses', function() use($users){
        return response($users, 201)
            ->header('Content-Type', 'application/json')
            ->cookie('MY_COOKIE', 'Willy', 3600);
    })->name('responses');

    Route::get('/redirect', function(){
        return redirect('/contact');
    })->name('redirect');

    Route::get('/back', function(){
        return back();
    })->name('back');

    Route::get('/named-route', function(){
        return redirect()->route('users.userDetail', ['id'=>1]);
    })->name('named-route');

    Route::get('/away', function(){
        return redirect()->away('https://google.com');
    })->name('away');

    Route::get('/json', function() use($users){
        return response()->json($users);
    })->name('json');

    Route::get('/download', function(){
        return response()->download(public_path('/daniel.jpg'), 'face.jpg',);
    })->name('download');

});

Auth::routes();


Route::get('recent-posts/{days_ago?}', function ($days_ago = 20) {
    return 'Recent post form '.$days_ago.' days ago';
})->name('post.recent.index');
// ->middleware('auth');
 


