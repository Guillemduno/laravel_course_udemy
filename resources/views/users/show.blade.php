@extends('layouts.app')

@section('title', 'User detail')

@section('content')

    <h1>{{$user['name']}}</h1>
    <p>{{$user['age']}}</p>

    @if($user['has_money'])
        <div>
            Has a lot of money!!!!
        </div>
    @else
        <div>
            Pooorr.....
        </div>   
    @endif
    @if($user['has_friends'])
        <div>
            Has a lot of friends!!!!
        </div>
    @else
        <div>
            Hasn't got friends....
        </div>   
    @endif

    <a class="btn btn-primary" href="{{route('users.index')}}">Return to users list</a>
    <a class="btn btn-primary" href="{{route('users.edit', ['user' => $user->id])}}">Edit this user</a>
    
    <form action="{{route('users.destroy', ['user' => $user->id])}}" method="post">
        @csrf
        @method('DELETE')
        <input class="btn btn-danger" type="submit" value="Delete user">
    </form>
    

@endsection