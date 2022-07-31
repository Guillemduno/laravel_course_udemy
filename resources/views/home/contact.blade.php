@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <h1>Contact</h1>
    @can('secret')    
        <a href="{{route('secret')}}">
            Go to the secret contact...
        </a>
    @endcan
@endsection
