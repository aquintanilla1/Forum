@extends('layout.forum')

@section('title')
    <title>{{ $topic->topicTitle }}:</title>
@endsection

@section('content')
    <h2>{{ $topic->topicTitle }}</h2>
    <h3>Posted on {{$topic->created_at}}</h3>

    <p>{{ $topic->topicBody }}</p>
@endsection