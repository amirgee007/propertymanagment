@extends('admin.layouts.base')

@section('title')
    Lot Shows
    @parent
@stop

@section('header_styles')

@endsection

@section('content')
    <section id="page-content">
        <div class="header-content">
            <h2><i class="fa fa-home"></i>Projects Dashboard <span>Owner Management</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">Show Lots</li>
                </ol>
            </div>
        </div>
        @include('flash::error_message')
        @include('flash::message')
        <div class="body-content animated fadeIn">
            <div class="body-content animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h3 class="panel-title">All lots</h3>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-theme">
                                        <thead>
                                        <tr>
                                            <th class="border-right">ID</th>
                                            <th>Lot Type ID</th>
                                            <th>Lot Name</th>
                                            <th>Created At</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($lots as $lot)
                                        <tr>
                                            <td class="border-right">{{$lot->lot_id}}</td>
                                            <td>{{$lot->lot_type_id}}</td>
                                            <td>{{$lot->lot_name}}</td>
                                            <td>{{ isset($lot->created_at) ? $lot->created_at->diffForHumans() :  ''  }}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div><!-- /.table-responsive -->
                            </div><!-- /.panel-body -->
                        </div><!-- /.panel -->
                        <!--/ End basic color table -->
                    </div>
                </div>
            </div>
            </div>

        @include('admin.layouts.pagefooter')
    </section>

@endsection

@section('footer_scripts')

@endsection

