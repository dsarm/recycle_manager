@extends('home.master')

@section('title', 'users')

@section('content')


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans('users.title') }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans("users.{$mode}") }}
                    <a class="pull-right" href="{{ route('home.users') }}" title="{{ trans('users.list') }} ">
                        <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="post" action="{{ $mode == 'create' ? route('home.users.store') : route('home.users.update', ['id' => $user->id]) }}">

                                {!! csrf_field() !!}

                                <div class="form-group">
                                    <label>{{ trans("users.form.name") }}</label>
                                    <input class="form-control" 
                                    type="text" 
                                    name="name"
                                    placeholder="{{ trans('users.form.name') }}" 
                                    value="{{ old('name') ? old('name') : ($mode == 'edit' ? $user->name : '') }}" 
                                    required>
                                </div>

                                <div class="form-group">
                                    <label>{{ trans("users.form.email") }}</label>
                                    <input class="form-control" 
                                    type="email" 
                                    name="email"
                                    placeholder="{{ trans('users.form.email') }}" 
                                    value="{{ old('email') ? old('email') : ($mode == 'edit' ? $user->email : '') }}" 
                                    required>
                                </div>

                                <div class="form-group">
                                    <label>{{ trans("users.form.password") }}</label>
                                    <input class="form-control" 
                                    type="password" 
                                    name="password"
                                    placeholder="{{ trans('users.form.password') }}" 
                                    value="{{ $mode == 'edit' ? $user->password : '' }}" 
                                    required>
                                </div>

                                <div class="form-group">
                                    <label>{{ trans("users.form.password_confirm") }}</label>
                                    <input class="form-control" 
                                    type="password" 
                                    name="password_confirmation"
                                    placeholder="{{ trans('users.form.password_confirm') }}" 
                                    value="{{ $mode == 'edit' ? $user->password : '' }}" 
                                    required>
                                </div>
                                <button type="submit" class="btn btn-default">{{ trans('users.form.submit') }}</button>
                            </form>
                        </div>

                    </div>
                    <!-- /.row (nested) -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
<!-- /#page-wrapper -->

@endsection


