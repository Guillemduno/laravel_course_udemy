@extends('layouts.app')

@section('content')
    
    <form action="{{route('register')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="name" name="name" id="name" value="{{old('name')}}" required class="form-control {{$errors->has('name')?' is-invalid':''}}">
            @if($errors->has('name'))
                <span class="invalid-feedback">
                    {{ $errors->first('name')}}
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{old('email')}}" required class="form-control {{$errors->has('email')?' is-invalid':''}}">
            @if($errors->has('email'))
                <span class="invalid-feedback">
                    {{$errors->first('email')}}
                </span>  
            @endif
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required class="form-control {{$errors->has('password')? 'is-invalid':''}}">
            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    {{ $errors->first('password')}}
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="password_confirmation">Retyped Password</label>
            <input type="password_confirmation" name="password_confirmation" id="password_confirmation" required class="form-control">
        </div>

        <input type="submit" value="Register" class="btn btn-primary btn-block">
        
    </form>
@endsection