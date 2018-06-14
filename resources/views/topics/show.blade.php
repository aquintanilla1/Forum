@extends('layout.forum')

@section('title')
    <title>{{ $topic->topicTitle }}</title>
@endsection

@section('content')
    <h2>{{ $topic->topicTitle }}</h2>
    <h3>Posted on {{$topic->created_at}} by {{ $topic->user['name'] }}</h3>

    <p>{{ $topic->topicBody }}</p>

    @guest
    @else
        @if(Auth::User()->id == $topic->user_id)

            <p><a href="/topics/{{$topic->id}}/edit">Edit Topic</a></p>

            {!! Form::open(['action' => ['TopicsController@destroy', $topic->id], 'method' => 'POST']) !!}

            {{Form::hidden('_method', 'DELETE')}}

            {{Form::submit('Delete Topic')}}
            {!! Form::close() !!}
        @endif
    @endguest

    <h3>{{ count($topic->comments)}} replies</h3>
    @guest
    @else
        {!! Form::open(['action' => 'CommentsController@store', 'method' => 'POST']) !!}
        <p> {{Form::label('commentBody', 'Post a Comment')}}
            {{Form::text('commentBody', '')}}
            {{Form::label('commentLength', 'max 255 char.')}}
            {{Form::hidden('topic_id', $topic->id)}}
            {{Form::submit('Submit Comment')}}

        </p>
        {!! Form::close() !!}
    @endguest

    @if(count($topic->comments) >= 1)
        @foreach($topic->comments as $comment)
            <p>{{$comment->commentBody}}</p>
            <small>Posted on {{ $comment->created_at }} by {{ $comment->user['name'] }}</small><br>
        @endforeach
    @else
        <p>No replies posted</p>
    @endif

@endsection