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
                        {{ trans('settings.list') }} 
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-settings">
                                <thead>
                                    <tr>
                                        <th>{{ trans('settings.table.name') }}</th>
                                        <th>{{ trans('settings.table.value') }}</th>
                                        <th>{{ trans('common.table.created_at') }}</th>
                                        <th>{{ trans('common.table.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($settings as $key => $setting)
                                        <tr class="{{ $key%2 != 0 ? 'odd' : 'even' }}">
                                            <td>{{$setting->name}}</td>
                                            <td>{{$setting->value}}</td>
                                            <td>{{$setting->created_at}}</td>
                                            <td class="text-center">
                                                <a href="{{ route('home.settings.edit', ['id' => $setting->id]) }}">edit</a>
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
        #dataTables-settings_filter
        {
            float: left;
            padding-bottom: 20px;
        }

        #dataTables-settings_length
        {
            float: right;
            padding-top: 20px;
        }

        #dataTables-settings_paginate
        {
            float: left;
        }

        #dataTables-settings_info
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
        $('#dataTables-settings').DataTable({
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



