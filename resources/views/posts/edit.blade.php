@extends('layouts.app')

@section('title', 'Update a post!')

@section('content')
  <form action="{{route('posts.update', ['post' => $post->id])}}" method="post">
    @csrf
    @method('PUT')
    @include('posts.partials.form')
    <input type="submit" class="btn btn-primary btn-block" value="Update">
  </form>
@endsection


