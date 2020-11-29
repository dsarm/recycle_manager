@extends('home.master')

@section('title', 'login')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">sign in</h3>
                    </div>
                    <div class="panel-body">

                        @include('common.errors')

                        @include('common.messages')
                                                
                        <form role="form" method="POST" action="/auth/login">
                            <fieldset>
                                {!! csrf_field() !!}

                                <div class="form-group">
                                    <input class="form-control" placeholder="email" name="email" type="email" value="{{ old('email') }}" autofocus>
                                </div>
                                <div class="form-group">
                                    <input id="password" class="form-control" placeholder="password" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <div class="col-xs-6">
                                            <label>
                                                <input name="remember" type="checkbox" value="Remember Me">remember Me
                                            </label>
                                        </div>
                                        <div class="col-xs-6">
                                            <a href="{{ route('password.reset') }}">password reset</a>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection