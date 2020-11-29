@extends('home.master')

@section('title', 'register')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">register</h3>
                    </div>
                    <div class="panel-body">

                        @include('common.errors')

                        @include('common.messages')

                        <form role="form" method="POST" action="/auth/register">
                            <fieldset>
                                {!! csrf_field() !!}

                                <div class="form-group">
                                    <input class="form-control" placeholder="name" name="name" type="name" autofocus>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" placeholder="email" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input id="password" class="form-control" placeholder="password" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <input id="password_confirmation" class="form-control" placeholder="password_confirmation" name="password_confirmation" type="password" value="">
                                </div>
                                
                                <button type="submit" class="btn btn-lg btn-success btn-block">register</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection