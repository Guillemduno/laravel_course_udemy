<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Iluminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\PostController;

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



Route::get('/', [HomeController::class, 'home'])->name('home.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/single', AboutController::class)->name('home.single');

// Route::get('/welcome/{name?}', fn ($name='user')=>'<h1>Welcome '.$name.'!!!</h1>')->name('home.welcome');
// Route::get('/welcome', fn()=>view('home.welcome'));
$users = [
    1 => [
        'name' => 'Guillem',
        'age' => 43,
        'has_money' => true,
        'has_friends' => true

    ],
    2 => [
        'name' => 'Carol',
        'age' => 42,
        'has_money' => false
    ]
];

Route::get('/users', function() use($users){
    return view('users.index', ['users' => $users]);
});

Route::get('/userDetail/{id}', function($id) use($users){
    abort_if(!isset($users[$id]), 404);
 return view('users.userDetail  ', ['user'=>$users[$id]]);
});
// Route::get('/welcome', [HomeController::class, 'welcome'])->name('home.welcome');



// ===========
// POST ROUTES
// ===========

// Route::resource('posts', PostController::class);
Route::resource('posts', PostController::class);
    // ->only(['index', 'show', 'create', 'store', 'edit', 'update']);


// Route::get('/posts', function () use ($posts) {
//     // compact($post) it's the same ['post' => $posts]
//     return view('posts.index', ['posts' => $posts]);
// });

// Route::get('/posts', function () use ($posts) {
//     // dd(request()->all()); // dd() is a shortcut for dump and die.
//     dd((int)request()->input('page', 1)); // For query parameters, Data center, forms, json.
//     // dd((int)request()->query('page', 1)); // Specific for query parameters 
//     // compact($post) it's the same ['post' => $posts]
//     return view('posts.index', ['posts' => $posts]);
// });




// Route::get('/posts/{id}', function ($id) use ($posts) {
//     abort_if(!isset($posts[$id]), 404);
//     // return 'Blog post '.$id;
//     return view('posts.show', ['post' => $posts[$id]]);
// })
// // ->where([
// //     'id' => '[0-9]+'x
// //     ])
// ->name('posts.show');

Route::get('recent-posts/{days_ago?}', function ($days_ago = 20) {
    return 'Recent post form '.$days_ago.' days ago';
})->name('post.recent.index');
// ->middleware('auth');
 

// // Grouping Routes
// Route::prefix('/fun')->name('fun.')->group(function() use($posts){

//     //  Responses, Codes, Headers, and Cookies
//     Route::get('/responses', function () use($posts) {
//       return response($posts, 201)
//         ->header('Content-Type', 'application/json')
//         ->cookie('MY_COOKIE', 'Guillem Duñó', 3600);
//     })->name('responses');
  
//     // Redirect
//     Route::get('/redirect', function () {
//         return redirect('/contact');
//     })->name('redirect');
  
//     // Back
//     Route::get('/back', function () {
//         return back();
//     })->name('back');
  
//     // Name route
//     Route::get('/route_name', function () {
//         return redirect()->route('posts.show', ['id' => 1]);
//     })->name('route_name');
  
//     // Away
//     Route::get('/away', function () {
//         return redirect()->away('https://google.com');
//     })->name('away');
  
//     // Return a json
//     Route::get('/json', function () use ($posts) {
//         return response()->json($posts);
//     })->name('json');
  
//     // Download a file, and renamed.
//     Route::get('/download', function () {
//         return response()->download(public_path('/daniel.jpg'), 'face.jpg');
//     })->name('download');
// });

// Request Input
// $archived = $request->boolean('archived'); // Returns true, 'true', 1, '1', 'on', 'yes' or false.
// $input = $request->only(['username', 'password']);
// $input = $request->only('username', 'password');
// $input = $request->except(['credit_card']);
// $input = $request->except('credit_card');

// if ($request->has('name')) {
//   # code...
// }
// if ($request->has(['name', 'email'])) {
//   # code...
// }

// $request->whenHas('name', function($input){
//   //
// });

// // The opposite method of whenHas i missing
// $request->missing('name', function($input){
//   //
// });

// if ($request->hasAny(['name', 'email'])) {
//   # code...
// }

// if ($request->filled('name')) {
//   // Return true if value is present
// }

// $request->whenFilled('name', function($input){
//   //
// });
