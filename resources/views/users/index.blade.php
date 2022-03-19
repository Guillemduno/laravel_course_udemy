@extends('layouts.app')

@section('title', 'Welcome')

@section('content')

    @foreach ($users as $key => $user)
        <div>
         {{$key}}. {{$user['name']}} has
            {{$user['age']}} years old 
        </div>
    @endforeach
@endsection