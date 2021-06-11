@extends('layouts.app')

@section('title', 'Create a post!')



@section('content')
  <form action="{{route('posts.store')}}" method="post">
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" value="{{old('title')}}">
    @error('title')
        <div>
          {{$message}}
        </div>
    @enderror
    <label for="content">Description:</label>
    <textarea name="content" id="content" cols="30" rows="10">{{old('content')}}</textarea>

    <input type="submit" value="Create">

    <!-- Display all the errors -->
    <div>
      <ul>
        @if ($errors->any())
          @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
          @endforeach
        @endif

      </ul>
    </div>
  
    
  </form>
@endsection


