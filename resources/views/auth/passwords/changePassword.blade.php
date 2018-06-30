@extends('layout.forum')

@section('title')
    <title>{{ $title }}: Change Password</title>
@endsection

@section('content')
    <h2>{{ $heading }}</h2>

    {!! Form::open(['action' => 'PagesController@updatePassword', 'method' => 'post']) !!}
    <table>
        <tr>
            <td>
                {{Form::label('currentPassword', 'Enter Current Password')}}
            </td>
            <td>
                {{Form::password('currentPassword')}}
            </td>
        </tr>
        <tr>
            <td>
                {{Form::label('newPassword', 'Enter New Password')}}
            </td>
            <td>
                {{Form::password('newPassword')}}
            </td>
        </tr>
        <tr>
            <td>
                {{Form::label('newPassword_confirmation', 'Re-Enter Password')}}
            </td>
            <td>
                {{Form::password('newPassword_confirmation')}}
            </td>
        </tr>
        <tr>
            <td>
                {{Form::submit('Change Password')}}
            </td>
        </tr>
    </table>
    {!! Form::close() !!}
@endsection