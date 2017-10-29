@extends('admin.layouts.base')

@section('title')
    List Assign Lot
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
                    <li class="active">List Assign Lot</li>
                </ol>
            </div>
        </div>

        @include('flash::message')
        <div class="body-content animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel rounded shadow no-overflow">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h3 class="panel-title">Assigned Lots Detail</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive col-xs-12">
                                <table id="assigned-lot-table" class="table table-striped table-theme">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Lot Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ownedLots as $ownedLot)
                                        <tr>
                                            <th>{{$ownedLot->id}}</th>
                                            {{--<th>{{$ownedLot->lot_id}}</th>--}}
                                            <th>{{\App\PropertyManagement\Helper::lotName($ownedLot)}}  &nbsp&nbsp {{$current_owner->owner_name}}</th>
                                            {{--<th>{{$ownedLot->lot_type_id}}</th>--}}
                                            {{--<th>{{ isset($ownedLot->created_at) ? $ownedLot->created_at->diffForHumans() :  ''  }}</th>--}}

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- /.panel -->
                </div>
            </div>

        </div>

        @include('admin.layouts.pagefooter')
    </section>

@endsection

@section('footer_scripts')
    <script>
        $('#assigned-lot-table').DataTable();
    </script>
@endsection

