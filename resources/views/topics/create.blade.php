@extends('layout.forum')

@section('title')
    <title>Create a Topic</title>
@endsection

@section('content')
    <h2>Create a Topic</h2>

    {!! Form::open(['action' => 'TopicsController@store', 'method' => 'POST']) !!}


    {{Form::label('title', 'Title')}}
    {{Form::text('topicTitle', 'Enter Title Here')}}
    {{Form::label('titleLength', 'max 255 char.')}}


    {!! Form::close() !!}

@endsection