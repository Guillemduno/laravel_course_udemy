<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBook;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('books.index', ['books' => Book::all()->sortByDesc('id')]);
        return view('books.index', ['books' => Book::withCount('comments')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBook $request)
    {
        $validated = $request->validated();
        $book = new Book();

        $book->title    = $validated['title'];
        $book->year     = $validated['year'];
        $book->pages    = $validated['pages'];

        $book->save();
        $request->session()->flash('status', "The book '$book->title' was created");
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('books.show', ['book' => Book::findOrFail($id)]);
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
        return view('books.edit', ['book' => Book::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBook $request, $id)
    {
        $book = Book::findOrFail($id);
        $validated = $request->validated();

        $book->title    = $validated['title'];
        $book->year     = $validated['year'];
        $book->pages    = $validated['pages'];

        $book->save();
        $request->session()->flash('status', "The book '$book->title' was edited");
        return redirect()->route('books.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        session()->flash('status', "The book '$book->title' was deleted!");
        $book->delete();
        return redirect()->route('books.index');
    }
}
