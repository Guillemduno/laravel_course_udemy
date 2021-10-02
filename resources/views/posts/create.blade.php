@extends('layouts.app')

@section('title', 'Create a post!')

@section('content')
  <form action="{{route('posts.store')}}" method="post">
    @csrf
    @include('posts.partials.form')
    <input type="submit" class="btn btn-primary btn-block" value="Create">
  </form>
@endsection


