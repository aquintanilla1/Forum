@extends('layout.forum')

@section('title')
    <title>Editing: {{ $topic->topicTitle }}</title>
@endsection

@section('content')
    <h2>Editing {{ $topic->topicTitle }}</h2>
    <h3>Posted on {{$topic->created_at}}</h3>

    {!! Form::open(['action' => ['TopicsController@update', $topic->id], 'method' => 'POST']) !!}

    <p> {{Form::label('topicTitle', 'Title')}}
        {{Form::text('topicTitle', '$topic->topicTitle')}}
        {{Form::label('titleLength', 'max 255 char.')}}
    </p>
    <p>
        {{Form::label('topicBody', 'Body')}}
        {{Form::textarea('topicBody', '$topic->topicBody')}}
        {{Form::label('bodyLength', 'max 1000 char.')}}
    </p>
    {{Form::hidden('_method', 'PUT')}}

    {{Form::submit('Edit Topic')}}

    {!! Form::close() !!}
@endsection