@extends('layouts.app')

@section('content')
    
    <form action="{{route('register')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="name" name="name" id="name" value="{{old('name')}}" required class="form-control {{$errors->has('name')?' is-invalid':''}}">
        </div>

        @if($errors->has('name'))
            <span class="invalid-feedback">
                {{ $errors->first('name')}}
            </span>
        @endif

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{old('email')}}" required class="form-control">
        </div>

        @if ($errors->has('email'))
            <span class="invalid-feedback">
                {{ $errors->first('email')}}
            </span>
        @endif

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required class="form-control">
        </div>

        @if ($errors->has('password'))
            <span class="invalid-feedback">
                {{ $errors->first('password')}}
            </span>
        @endif

        <div class="form-group">
            <label for="retyped">Retyped Password</label>
            <input type="password" name="retyped" id="retyped" required class="form-control">
        </div>

        @if ($errors->has('retyped'))
            <span class="invalid-feedback">
                {{ $errors->first('retyped')}}
            </span>
        @endif

        <input type="submit" value="Register" class="btn btn-primary btn-block">
        
    </form>
@endsection