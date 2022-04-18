@extends('layouts.app')

@section('title', 'Edit Books')
    

@section('content')
    <form action="{{route('books.update', ['book' => $book->id])}}" method="POST">
        @csrf
        @method('PUT')
       @include('books.partials.form')
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="edit">
        </div>
    </form>
@endsection