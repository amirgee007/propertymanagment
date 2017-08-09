@extends('admin.layouts.base')

@section('title')
    List Assign Lot
    @parent
@stop

@section('header_styles')
    <link href="/admin/assets/global/plugins/bower_components/bootstrap-datepicker-vitalets/css/datepicker.css"
          rel="stylesheet">
    <link href="/admin/assets/global/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css"
          rel="stylesheet">

@endsection

@section('content')
    <section id="page-content">
        <div class="header-content">
            <h2><i class="fa fa-home"></i>Projects Dashboard <span>Owner Management</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">List Assign Lot</li>
                </ol>
            </div>
        </div>

        @include('flash::message')
        <div class="body-content animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel rounded shadow">
                        <div class="panel-body no-padding">
                            <form class="form-horizontal form-bordered" action="{{route('post.owner.store')}}"
                                  role="form" id="sample-validation-2" method="post">
                                <div class="form-body">
                                    <div class="form-group form-group-divider">
                                        <div class="form-inner">
                                            <h4 class="no-margin"><span
                                                        class="label label-success label-circle">1</span>Assigned Lots Detail</h4>
                                        </div>
                                    </div>


                                    <div class="container">
                                        <br>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Lot Name</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($ownedLots as $ownedLot)
                                                <tr>
                                                    <th>{{$ownedLot->owner_lot_id}}</th>
                                                    {{--<th>{{$ownedLot->lot_id}}</th>--}}
                                                    <th>{{\App\PropertyManagement\Helper::lotName($ownedLot)}}</th>
                                                    {{--<th>{{$ownedLot->lot_type_id}}</th>--}}
                                                    {{--<th>{{ isset($ownedLot->created_at) ? $ownedLot->created_at->diffForHumans() :  ''  }}</th>--}}

                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

