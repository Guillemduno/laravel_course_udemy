@extends('layouts.app')

@section('title', 'Books')

@section('content')
    <ul class="list-group">
        @forelse ($books as $book)
            @include('books.partials.book')
        @empty
            <p>No books registered</p>
        @endforelse
    </ul
@endsection