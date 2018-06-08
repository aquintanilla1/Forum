@extends('layout.forum')

@section('title')
    <title>Create a Topic</title>
@endsection

@section('content')
    <h2>{{ $heading }}</h2>

    {!! Form::open(['action' => 'TopicsController@store', 'method' => 'POST']) !!}

    {{Form::label('topicTitle', 'Title')}}
    {{Form::text('topicTitle', 'Enter Title')}}
    {{Form::label('titleLength', 'max 255 char.')}}

    <br>

    {{Form::label('topicBody', 'Body')}}
    {{Form::textarea('topicBody', 'Enter Body')}}
    {{Form::label('bodyLength', 'max 1000 char.')}}


    {!! Form::close() !!}
@endsection