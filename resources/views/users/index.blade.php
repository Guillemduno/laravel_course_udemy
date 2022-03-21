@extends('layouts.app')

@section('title', 'Users')

@section('content')
    @forelse ($users as $key => $user)
        @include('users.partials.user')
    @empty
        <div>
            No users found....
        </div>
    @endforelse
 
@endsection

{{-- Comments!!! --}}