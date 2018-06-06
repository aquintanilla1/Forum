@extends('layout.forum')

@section('title')
    <title>{{ $title }}</title>
@endsection

@section('content')
    <h1><a href="/">{{ $title }}</a></h1>
    <h2>{{ $heading }}</h2>
@endsection