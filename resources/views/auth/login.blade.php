@extends('layouts.app')

@section('content')
    
    <form action="{{route('login')}}" method="post">
        @csrf
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
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="remember" value="{{old('remember')?'checked':''}}">
                <label for="remember" class="form-check-label">Remember me</label>
            </div>

        </div>

        <input type="submit" value="Log in" class="btn btn-primary btn-block">
        
    </form>
@endsection