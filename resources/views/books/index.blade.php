@extends('layouts.app')

@section('title', 'Books')

@section('content')
<h1>List of books</h1>
    <ul class="list-group">
        @forelse ($books as $book)
            @include('books.partials.book')
        @empty
            <p>No books registered</p>
        @endforelse
    </ul
@endsection