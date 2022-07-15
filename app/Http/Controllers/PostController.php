<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\BlogPost;
// use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;


class PostController extends Controller
{


  public function __construct(){
    $this->middleware('auth')
          ->only('create', 'store', 'update', 'destroy', 'edit');
  }
  // private $posts = [
  //   1 => [
  //     'title' => 'Intro to Laravel',
  //     'content' => 'This is a short intro to Laravel',
  //     'is_new' => true,
  //     'has_comments' => true
  //   ],
  //   2 => [
  //     'title' => 'Intro to PHP',
  //     'content' => 'This is a short intro to PHP',
  //     'is_new' => false
  //   ],
  //   3 => [
  //     'title' => 'Intro to Javascript',
  //     'content' => 'This is a short intro to Javascript',
  //     'is_new' => false
    
  //   ]
  // ];
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // return view('posts.index', ['posts' => $this->posts]);
    // return view('posts.index', ['posts' => BlogPost::all()]);

    return view('posts.index', ['posts' => BlogPost::withCount('comments')->get()]);

    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
    return view('posts.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StorePost $request)
  {
    // dd($request);

    // Validation
    $validated = $request->validated();
      $post = new BlogPost();
      $post->title = $validated['title'];
      $post->content = $validated['content'];
      $post->save();

    // $post = BlogPost::created($validated);
  

    // Flash message
    $request->session()->flash('status', 'The blog post was created');

    return redirect()->route('posts.show', ['post' => $post->id]);
    // return redirect()->route('posts.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    // abort_if(!isset($this->posts[$id]), 404);

    //     // return 'Blog post '.$id;
        // return view('posts.show', ['post' => $this->posts[$id]]);
        return view('posts.show', ['post' => BlogPost::findOrFail($id)]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
     return view('posts.edit', ['post' => BlogPost::findOrFail($id)]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(StorePost $request, $id)
  {
    // Update
    $post = BlogPost::findOrFail($id);
    $validated = $request->validated();
    $post->fill($validated);
    $post->save();

    // Message
    $request->session()->flash('status', 'Blog post was updated!');

    // Redirect
    return redirect()->route('posts.show', ['post' => $post->id]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    // dd($id);
    $post = BlogPost::findOrFail($id);
    $post->delete();

    session()->flash('status', 'Blog post was deleted!');

    return redirect()->route('posts.index');
  }
}
