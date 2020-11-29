@extends('home.master')

@section('title', 'settings')

@section('content')


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans('settings.title') }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans("settings.{$mode}") }}
                    <a class="pull-right" href="{{ route('home.settings') }}" title="{{ trans('settings.list') }} ">
                        <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="post" action="{{ $mode == 'create' ? route('home.settings.store') : route('home.settings.update', ['id' => $setting->id]) }}">

                                {!! csrf_field() !!}

                                <div class="form-group">
                                    <label>{{ trans("settings.form.name") }}</label>
                                    <input class="form-control" 
                                    type="text" 
                                    name="name"
                                    placeholder="{{ trans('settings.form.name') }}" 
                                    value="{{ $mode == 'edit' ? $setting->name : '' }}" 
                                    required
                                    readonly="readonly">
                                </div>

                                <div class="form-group">
                                    <label>{{ trans("settings.form.description") }}</label>
                                    <input class="form-control" 
                                    type="text" 
                                    name="description"
                                    placeholder="{{ trans('settings.form.description') }}" 
                                    value="{{ $mode == 'edit' ? $setting->description : '' }}" 
                                    required
                                    readonly="readonly">
                                </div>

                                <div class="form-group">
                                    <label>{{ trans("settings.form.code") }}</label>
                                    <input class="form-control" 
                                    type="text" 
                                    name="code"
                                    placeholder="{{ trans('settings.form.code') }}" 
                                    value="{{ $mode == 'edit' ? $setting->code : '' }}" 
                                    required
                                    readonly="readonly">
                                </div>

                                <div class="form-group">
                                    <label>{{ trans("settings.form.value") }}</label>
                                    <input class="form-control" 
                                    type="text" 
                                    name="value"
                                    placeholder="{{ trans('settings.form.value') }}" 
                                    value="{{ $mode == 'edit' ? $setting->value : '' }}" 
                                    required>
                                </div>
                                
                                <button type="submit" class="btn btn-default">{{ trans('settings.form.submit') }}</button>
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


