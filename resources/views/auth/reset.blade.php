@extends('home.master')

@section('title', 'reset password')

@section('content')
	<form method="POST" action="/password/reset">
	    <div>
		    {!! csrf_field() !!}
		    <input type="hidden" name="token" value="{{ $token }}">
	        <input type="email" name="email" placeholder="email" value="{{ old('email') }}">
        	<input type="password" name="password" placeholder="password">
	        <input type="password" name="password_confirmation">
	    </div>

        <button type="submit">reset password</button>
	</form>
@endsection