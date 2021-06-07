@extends('layouts.app')

@section('title', $post['title'])

@if ($post['is_new'])
    <div>A new blog post! Using if</div>
@else
    <div>Blog post is old! Using else if / else</div>
@endif

@unless ($post['is_new'])
<div>It is an old post... using unless</div>

@endunless

@isset($post['has_comments'])
    <div>The post has comments... using isset</div>
@endisset

@empty($post['is_new'])
    
@endempty

@section('content')
    <h1>{{ $post['title'] }}</h1>
    <p>{{ $post['content'] }}</p>
@endsection
