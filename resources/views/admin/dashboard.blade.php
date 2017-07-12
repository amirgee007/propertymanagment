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
                                    <button class="btn btn-sm" data-action="expand" data-toggle="tooltip" data-placement="top" data-title="Expand"><i class="fa fa-expand"></i></button>
                                    <button class="btn btn-sm" data-action="refresh" data-toggle="tooltip" data-placement="top" data-title="Refresh"><i class="fa fa-refresh"></i></button>
                                    <button class="btn btn-sm" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse"><i class="fa fa-angle-up"></i></button>
                                </div>
                                <div class="clearfix"></div>
                            </div><!-- /.panel-heading -->
                            <div class="panel-body">
                                <div id="project-progress" class="chart"></div>
                            </div><!-- /.panel-body -->
                        </div><!-- /.panel -->
                        <!--/ End project progress -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- Start project schedule -->
                        <div class="panel panel-default shadow">
                            <div class="panel-heading">
                                <h3 class="panel-title text-center">Project schedule</h3>
                            </div><!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="calendar-toolbar">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-2 col-xs-2">
                                            <!-- Start offcanvas btn menu calendar: This menu will take position at the top of calendar (mobile only). -->
                                            <div class="btn-group hidden-lg hidden-md">
                                                <button type="button" class="btn btn-theme btn-sm dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fa fa-bars fa-2x"></i>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="#" data-calendar-nav="prev">Prev</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-calendar-nav="today">Today</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-calendar-nav="next">Next</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="hidden-sm hidden-xs">
                                                <button class="btn btn-theme btn-sm rounded" data-calendar-nav="prev"><i class="fa fa-angle-left"></i> Prev</button>
                                                <button class="btn btn-theme btn-sm rounded" data-calendar-nav="today">Today</button>
                                                <button class="btn btn-theme btn-sm rounded" data-calendar-nav="next">Next <i class="fa fa-angle-right"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-8 col-xs-8">
                                            <div class="page-header no-border no-margin no-padding"><h4 class="no-border no-margin no-padding text-center text-capitalize">&nbsp;</h4></div>
                                        </div>
                                        <div class="col-md-5 col-sm-2 col-xs-2">
                                            <!-- Start offcanvas btn menu calendar: This menu will take position at the top of calendar (mobile only). -->
                                            <div class="btn-group calendar-menu-mobile pull-right hidden-lg hidden-md">
                                                <button type="button" class="btn btn-theme btn-sm dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fa fa-bars fa-2x"></i>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="#" data-calendar-view="year">Prev</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-calendar-view="month">Month</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-calendar-view="week">Week</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-calendar-view="day">Day</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="pull-right hidden-sm hidden-xs">
                                                <button class="btn btn-theme btn-sm rounded" data-calendar-view="year">Year</button>
                                                <button class="btn btn-theme btn-sm active rounded" data-calendar-view="month">Month</button>
                                                <button class="btn btn-theme btn-sm rounded" data-calendar-view="week">Week</button>
                                                <button class="btn btn-theme btn-sm rounded" data-calendar-view="day">Day</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="calendar"></div>
                            </div><!-- /.panel-body -->
                        </div>
                        <!--/ End project schedule -->
                    </div>
                </div>

            </div><!-- /.body-content -->
            <!--/ End body content -->

            <!-- Start footer content -->
            <footer class="footer-content">
                2014 - <span id="copyright-year"></span> &copy; Blankon Admin. Created by <a href="http://djavaui.com/" target="_blank">Djava UI</a>, Yogyakarta ID
                <span class="pull-right">0.01 GB(0%) of 15 GB used</span>
            </footer><!-- /.footer-content -->
            <!--/ End footer content -->

        </section><!-- /#page-content -->
        <!--/ END PAGE CONTENT -->

@endsection

@section('footer_scripts')

@endsection

