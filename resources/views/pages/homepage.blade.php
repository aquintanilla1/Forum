@extends('layout.forum')

@section('title')
    <title>{{ $title }}</title>
@endsection

@section('content')
    <h2>Welcome to {{ $title }}</h2>

    <p><a href="/login">Log In</a></p>
    <p><a href="/signup">Sign In</a></p>

    {{--Cookie stuff right here?--}}
@endsection

