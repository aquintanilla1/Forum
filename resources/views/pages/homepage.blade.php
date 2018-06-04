@extends('layout.forum')

@section('title')
    <title>{{ $title }}</title>
@endsection

@section('content')
    <h1>{{ $title }}</h1>
    <h2>Welcome to {{ $title }}</h2>

    {{--Cookie stuff right here?--}}
@endsection

