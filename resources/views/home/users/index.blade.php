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
                        {{ trans('users.list') }} 
                        <a class="pull-right" href="{{ route('home.users.create') }}" title="{{ trans('users.create') }} ">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-users">
                                <thead>
                                    <tr>
                                        <th>{{ trans('users.table.name') }}</th>
                                        <th>{{ trans('users.table.email') }}</th>
                                        <th>{{ trans('common.table.created_at') }}</th>
                                        <th>{{ trans('common.table.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $key => $user)
                                        <tr class="{{ $key%2 != 0 ? 'odd' : 'even' }}">
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->created_at}}</td>
                                            <td class="text-center">
                                                <a href="{{ route('home.users.edit', ['id' => $user->id]) }}">edit</a>
                                                <a href="{{ route('home.users.delete', ['id' => $user->id]) }}">remove</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /#page-wrapper -->

    <!-- DataTables JavaScript -->
    <script src="{{ URL::asset('bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>

    <style type="text/css">
        #dataTables-users_filter
        {
            float: left;
            padding-bottom: 20px;
        }

        #dataTables-users_length
        {
            float: right;
            padding-top: 20px;
        }

        #dataTables-users_paginate
        {
            float: left;
        }

        #dataTables-users_info
        {
            float: right;
        }

        .table th {
            cursor: pointer;
        }
    </style>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-users').DataTable({
                responsive: true,
                "dom": 'fi<"top">rt<"bottom"lp>'
                
        });
    });
    </script>
@endsection

<!--     oTable = $('.license_table').dataTable({
      "dom": 't<"bottom"flpi>',
      "order": [[ 7, 'desc' ], [ 0, 'desc' ]]
    });

    $('.search_input').keyup(function(){
          oTable.fnFilter($(this).val()) ;
    })-->



