@extends('layout.forum')

@section('title')
    <title>{{ $title }}</title>
@endsection

@section('content')
    <h2>Welcome to {{ $title }}</h2>

    <p><a href="/login">Log In</a></p>
    <p><a href="/signup">Sign In</a></p>

    <h2>{{ $heading }}</h2>

    @if(count($topics) >= 1)
        @foreach($topics as $topic)
            <h3><a href="/topics/{{$topic->id}}">{{$topic->topicTitle}}</a></h3>
            <small>Posted on {{ $topic->created_at }}</small>
        @endforeach
        {{$topics->links()}}
    @else
        <p>No topics found</p>
    @endif
@endsection