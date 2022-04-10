@extends('layouts.app')

@section('title', 'Create a user family')


@section('content')

    <form action="{{route('users.store')}}" method="post">
        @csrf

        <div>
            <label for="user">User name</label>
            <input type="text" name="user" id="user">
        </div>
        <div>
            <label for="age">Age</label>
            <input type="number" name="age" id="age">
        </div>
        <div>
            <label for="has_money">Has money?</label>
            <input type="checkbox" name="has_money" id="has_money" value="true">
        </div>
        <div>
            <label for="has_friends">Has friends?</label>
            <input type="checkbox" name="has_friends" id="has_friends" value="true">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>

        <div>
            <input type="submit" value="Create user">
        </div>

    </form>


@endsection