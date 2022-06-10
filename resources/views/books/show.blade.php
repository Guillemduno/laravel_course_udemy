@extends('layouts.app')

@section('title', 'Show Books')
    
@section('content')
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{ $book->title }}</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <p class="card-text">Year: {{ $book->year }} </p>
        <p class="card-text">Pages: {{ $book->pages }}</p>
        <a href="{{route('books.index')}}" class="btn btn-primary">Return to book list</a>
      </div>
    </div>
    <div class="card mt-3">
      <div class="card-body">
        <h4 class="card-title">Comments</h4>
        @forelse ($book->comments as $comment)
            <p class="card-text">{{$comment->comment}}</p>
            <p class="text-muted">comment added {{$comment->created_at->diffForHumans()}}</p>
        @empty
            <p class="card-text">No comments yet!</p>
        @endforelse
      </div>
    </div>
@endsection