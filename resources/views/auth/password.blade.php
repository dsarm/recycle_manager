@extends('home.master')

@section('title', 'reset password')

@section('content')
    <form method="POST" action="/password/email">
        <div>
            {!! csrf_field() !!}
            <input type="email" name="email" placeholder="email" value="{{ old('email') }}">
        </div>

        <button type="submit">send password reset link</button>
    </form>
@endsection