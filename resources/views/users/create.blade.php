@extends('layouts.app')

@section('title', 'Create a user family')


@section('content')

    <form action="{{route('users.store')}}" method="post">
        @csrf
        @include('users.partials.form')
        <div>
            <input type="submit" value="Create user">
        </div>

    </form>


@endsection