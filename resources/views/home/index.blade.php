@extends('home.master')

@section('title', 'home')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 id="index_page_header" class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    
        <!-- /.row -->
        <div class="row">

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-recycle fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{ $totalRecycleNb }}</div>
                                <div>Total Recycles</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('home.recycles') }}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{ $totalUsersNb }}</div>
                                <div>Total Users</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('home.users') }}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-map-marker fa-5x"></i>

                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">Recycle Map</div>
                                <div>2</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('home.recycles.map') }}">
                        <div class="panel-footer">
                            <span class="pull-left">View Map</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-blue">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-plus fa-5x"></i>

                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">Add Recycle</div>
                                <div>New recycle point</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('home.recycles.create') }}">
                        <div class="panel-footer">
                            <span class="pull-left">Create</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            
        </div>

        <!-- /.row -->
        <div class="row">

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Donut1 Chart Recycle/Recycle Type
                    </div>
                    <div class="panel-body">
                        <div id="morris-donut-chart"></div>
                        <a href="" class="btn btn-default btn-block">View Details</a>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
            <!-- /.panel -->

        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

    <!-- Morris Charts CSS -->
    <link href="{{ URL::asset('bower_components/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Morris Charts JavaScript -->
    <script src="{{ URL::asset('bower_components/raphael/raphael-min.js') }}"></script>
    <script src="{{ URL::asset('bower_components/morrisjs/morris.min.js') }}"></script>
    
    <script type="text/javascript">

        var donutData = {!! $morrisDonutData->toJson() !!}

        var morrisDonut = Morris.Donut({
            element: 'morris-donut-chart',
            data: donutData,
            resize: true
        });

    </script>
@endsection