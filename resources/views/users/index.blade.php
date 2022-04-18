@extends('layouts.app')

@section('title', 'Users')

@section('content')

<a class="btn btn-primary" href="{{route('users.create')}}">Create user</a>
    @forelse ($users as $key => $user)
        @include('users.partials.user')
    @empty
        <div>
            No users found....
        </div>
    @endforelse
 
@endsection

{{-- Comments!!! --}}