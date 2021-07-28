@extends('layouts.app')

@section('title', 'Blog post')

@section('content')
  {{-- @if (count($posts))
      @foreach ($posts as $key => $post)
      <h1>{{ $key }} . {{ $post['title'] }}</h1>
      <p>{{ $post['content'] }}</p> 
      @endforeach
  @else
      <p>No posts found!</p>
  @endif --}}

  @forelse ($posts as $key => $post)
    @include('posts.partials.post')
  @empty
      <p>No posts found</p>
  @endforelse
@endsection
