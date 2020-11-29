@extends('home.master')

@section('title', 'recycles')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ trans('recycles.title') }}</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('recycles.list') }} 
                        <a class="pull-right" href="{{ route('home.recycles.create') }}" title="{{ trans('recycles.create') }} ">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-recycles">
                                <thead>
                                    <tr>
                                        <th class="col-xs-2">{{ trans('common.table.name') }}</th>
                                        <th class="col-xs-1">{{ trans('common.table.active') }}</th>
                                        <th class="col-xs-1">{{ trans('recycles.table.lat') }}</th>
                                        <th class="col-xs-1">{{ trans('recycles.table.lng') }}</th>
                                        <th class="col-xs-4">{{ trans('recycles.table.address') }}</th>
                                        <th class="col-xs-1">{{ trans('common.table.created_at') }}</th>
                                        <th class="col-xs-1">{{ trans('common.table.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recycles as $key => $recycle)
                                        <tr class="{{ $key%2 != 0 ? 'odd' : 'even' }}">
                                            <td>{{ isset($recycle->recycle_info->name) ? $recycle->recycle_info->name : '' }}</td>
                                            <td>{{ $recycle->active ? trans('common.table.active') : trans('common.table.inactive') }}</td>
                                            <td>{{ isset($recycle->recycle_location->lat) ? $recycle->recycle_location->lat : '' }}</td>
                                            <td>{{ isset($recycle->recycle_location->lng) ? $recycle->recycle_location->lng : '' }}</td>
                                            <td>{{ isset($recycle->recycle_location->address) ? $recycle->recycle_location->address : '' }}</td>
                                            <td>{{ $recycle->created_at }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('home.recycles.edit', ['id' => $recycle->id]) }}">edit</a>
                                                <br>
                                                <a href="{{ route('home.recycles.delete', ['id' => $recycle->id]) }}">remove</a>
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
        #dataTables-recycles_filter
        {
            float: left;
            padding-bottom: 20px;
        }

        #dataTables-recycles_length
        {
            float: right;
            padding-top: 20px;
        }

        #dataTables-recycles_paginate
        {
            float: left;
        }

        #dataTables-recycles_info
        {
            float: right;
        }

        .table {
          table-layout:fixed;
        }

        .table td {
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
        }

        .table th {
            cursor: pointer;
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables-recycles').DataTable({
                responsive: true,
                "dom": 'fi<"top">rt<"bottom"lp>',
                "order": [[ 5, 'desc' ], [ 0, 'asc' ]]
                    
            });
        });
    </script>
@endsection



