@extends('layout.forum')

@section('title')
    <title>{{ $topic->topicTitle }}</title>
@endsection

@section('content')
    <h2>{{ $topic->topicTitle }}</h2>
    <h3>Posted on {{$topic->created_at}}</h3>

    <p>{{ $topic->topicBody }}</p>

    @if(Auth::User()->id == $topic->user_id)

        <p><a href="/topics/{{$topic->id}}/edit">Edit Topic</a></p>

        {!! Form::open(['action' => ['TopicsController@destroy', $topic->id], 'method' => 'POST']) !!}

        {{Form::hidden('_method', 'DELETE')}}

        {{Form::submit('Delete Topic')}}
        {!! Form::close() !!}
    @endif

@endsection