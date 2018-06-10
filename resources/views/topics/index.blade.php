@extends('layout.forum')

@section('title')
    <title>{{ $title }}</title>
@endsection

@section('content')
    @guest
    <h2>Welcome to {{ $title }}</h2>

    <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
    <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
    @else
        <h2>Welcome, {{Auth::user()->name}}</h2>
        <li>
            <a href="{{ route('logout') }}">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
        <li><a href="/topics/create">Create a Topic</a></li>
    @endguest

    {{--<p><a href="/login">Log In</a></p>--}}
    {{--<p><a href="/register">Register</a></p>--}}

    <h2>{{ $heading }}</h2>

    @if(count($topics) >= 1)
        @foreach($topics as $topic)
            <h3><a href="/topics/{{$topic->id}}">{{$topic->topicTitle}}</a></h3>
            <small>Posted on {{ $topic->created_at }}</small>
        @endforeach
        {{ $topics->links() }}
    @else
        <p>No topics found</p>
    @endif
@endsection