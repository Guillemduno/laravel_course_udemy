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

    @unless($user['has_money'])
    <div>
        Pooorr from unlesssss.....
    </div>  
    @endunless

    @isset($user['has_friends'])
    <div>
        {{$user['name']}} has friends!!!!
    </div>   
    @endisset

    @foreach ($_POST['users'] as $user)
        {{$user}}
    @endforeach
@endsection