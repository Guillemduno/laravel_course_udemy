@extends('layouts.app')

@section('title', 'Show Books')
    
@section('content')
    <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $book->title }}</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <p class="card-text">Year: {{ $book->year }} </p>
          <p class="card-text">Pages: {{ $book->pages }}</p>
          <a href="{{route('books.index')}}" class="btn btn-primary">Return to book list</a>
        </div>
      </div>
@endsection