@extends('layout.forum')

@section('title')
    <title>{{ $title }}</title>
@endsection

@section('content')
    <h1>{{ $title }}</h1>
    <h2>Welcome to {{ $title }}</h2>

    <p><a href="/login">Log In</a></p>
    <p><a href="/signup">Sign In</a></p>

    <h2>{{ $heading }}</h2>

    @if(count($topics) >= 1)
        @foreach($topics as $topic)
            <p>{{$topic->topicTitle}}</p>
        @endforeach
    @else
        <p>No topics found</p>
    @endif
@endsection