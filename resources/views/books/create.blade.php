@extends('layouts.app')

@section('title', 'Create a Book')
    
@section('content')
    <form action="{{route('books.store')}}" method="POST">
        @csrf
        @include('books.partials.form')
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Create">
        </div>
    </form>
@endsection