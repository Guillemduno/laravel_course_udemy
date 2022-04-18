@extends('layouts.app')

@section('title', 'Edit a user family')


@section('content')

    <form action="{{route('users.update', ['user' => $user->id])}}" method="post">
        @csrf
        @method('PUT')
        @include('users.partials.form')
        <div>
            <input class="btn btn-primary" type="submit" value="Edit user">
        </div>
    </form>
<div style="margin-top:2em;">
    <a class="btn btn-primary" href="{{route('users.show', ['user' => $user->id])}}">Show user</a>
</div>
@endsection