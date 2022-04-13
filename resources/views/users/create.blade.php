@extends('layouts.app')

@section('title', 'Create a user family')


@section('content')

    <form action="{{route('users.store')}}" method="post">
        @csrf

        <div>
            <label for="user">User name</label>
            <input type="text" name="user" id="user">
        </div>
        @error('user')
            <div>{{$message}}</div>
        @enderror
        <div>
            <label for="age">Age</label>
            <input type="number" name="age" id="age">
        </div>
        @error('age')
            <div>{{$message}}</div>
        @enderror
        <div>
            <label for="has_money">Has money?</label>
            <input type="checkbox" name="has_money" id="has_money">
        </div>
        @error('has_money')
            <div>{{$message}}</div>
        @enderror
        <div>
            <label for="has_friends">Has friends?</label>
            <input type="checkbox" name="has_friends" id="has_friends">
        </div>
        @error('has_friends')
            <div>{{$message}}</div>
        @enderror
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>
        @error('email')
            <div>{{$message}}</div>
        @enderror
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        @error('password')
            <div>{{$message}}</div>
        @enderror
        

        <div>
            <input type="submit" value="Create user">
        </div>

    </form>


@endsection