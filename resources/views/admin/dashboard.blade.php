@extends('admin.layouts.base')

    @section('title')
        Main
        @parent
    @stop
@section('content')

        <!-- START @PAGE CONTENT -->
        <section id="page-content">
            <!-- Start page header -->
            <div class="header-content">
                <h2><i class="fa fa-home"></i>Projects Dashboard <span>dashboard & statistics</span></h2>
                <div class="breadcrumb-wrapper hidden-xs">
                    <span class="label">You are here:</span>
                    <ol class="breadcrumb">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div><!-- /.header-content -->
            <!--/ End page header -->

            <!-- Start body content -->
            <div class="body-content animated fadeIn">

                <div class="row">
                    <div class="col-md-12">

                        <!-- Start project overview -->
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="mini-stat-type-4 bg-success shadow">
                                    <h3>Completed</h3>
                                    <h1 class="count">25</h1>
                                    <a href="project-completed.html" class="btn btn-success">VIEW</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="mini-stat-type-4 bg-primary shadow">
                                    <h3>Working</h3>
                                    <h1 class="count">7</h1>
                                    <a href="project-working.html" class="btn btn-primary">VIEW</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="mini-stat-type-4 bg-danger shadow">
                                    <h3>Not Done</h3>
                                    <h1 class="count">3</h1>
                                    <a href="project-not-done.html" class="btn btn-danger">VIEW</a>
                                </div>
                            </div>
                        </div>
                        <!--/ End project overview -->

                        <!-- Start project progress -->
                        <div class="panel panel-default rounded shadow panel-transparant">
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h3 class="panel-title">Progress of the project</h3>
                                </div>
                                <div class="pull-right">
                                    {{--<button class="btn btn-sm" data-action="expand" data-toggle="tooltip" data-placement="top" data-title="Expand"><i class="fa fa-expand"></i></button>--}}
                                    {{--<button class="btn btn-sm" data-action="refresh" data-toggle="tooltip" data-placement="top" data-title="Refresh"><i class="fa fa-refresh"></i></button>--}}
                                    <button class="btn btn-sm" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse"><i class="fa fa-angle-up"></i></button>
                                </div>
                                <div class="clearfix"></div>
                            </div><!-- /.panel-heading -->
                            <div class="panel-body">
                                <div id="project-progress" class="chart"></div>
                            </div><!-- /.panel-body -->
                        </div><!-- /.panel -->

                    </div>
                </div>
            </div>

            @include('admin.layouts.pagefooter')

        </section>
@endsection

@section('footer_scripts')

@endsection

