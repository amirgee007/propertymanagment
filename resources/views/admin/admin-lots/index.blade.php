@extends('admin.layouts.base')

@section('title')
    Lot Management
    @parent
@stop

@section('header_styles')
    <link href="{{asset('assets/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <section id="page-content">
        <div class="header-content">
            <h2><i class="fa fa-home"></i>Projects Dashboard <span>Lot Management</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">Lot Management</li>
                </ol>
            </div>
        </div>
        @include('flash::message')
        <div class="body-content animated fadeIn">
            <div class="row">
                <div class="body-content animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel rounded shadow">
                                <div class="panel-heading" style="padding: 2%">
                                    <h4 class="no-margin">
                                        Lot Management
                                        <div class="pull-right">
                                            <a href="{{route('get.lot.list')}}" class="btn btn-info">Add lots Types</a>
                                        </div>
                                    </h4>
                                </div>
                                <div class="panel-body no-padding">
                                    <div class="col-lg-12" style="padding: 5px">
                                        <div class="table-responsive">
                                            <div id="meter-reading-table_filter" class="dataTables_filter">
                                                <label>Search:
                                                    <input type="search" class="" value="{{$searchVal}}" placeholder="" id="lot-manage-search">
                                                </label>
                                            </div>
                                            <table class="table" id="meter-reading-table">
                                                <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Lot type</th>
                                                    <th>Area</th>
                                                    <th>Quantity</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody id="meter-reading-tbody">
                                                @foreach($lot_type as $lot)
                                                    <tr id="m-reading-{{$lot->lot_type_id}}">
                                                        <td>{{$lot->lot_type_id}}</td>
                                                        <td>{{$lot->lot_type_name}}</td>
                                                        <td class="las-dat-td">{{$lot->lot_type_size}}</td>
                                                        <td class="cur-re-td">{{$lot->lot_type_qty}}</td>
                                                        <td class="">
                                                            <a href="{{route('get.lot.show' ,$lot->lot_type_id)}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="View detail"><i class="fa fa-eye"></i></a>
                                                            <a href="#" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                            <a onclick="return confirm('Are you sure you want to delete this record?')" href="{{ route('lot.type.delete', $lot->lot_type_id) }}"  class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-times"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="pull-right">
                                            {{ $lot_type->links() }}
                                        </div>
                                    </div>

                                </div>
                            </div><!-- /.panel-body -->
                        </div><!-- /.panel -->

                    </div>
                </div>
            </div>
        </div>
        @include('admin.layouts.pagefooter')
    </section>

@endsection

@section('footer_scripts')
    <script src="{{asset('assets/vendors/select2/dist/js/select2.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {

            $('#lot-manage-search').keyup(function () {
                delay(function(){
                    val = $('#lot-manage-search').val();
                    window.location.href = "{{url('/dashboard/lot/manage?search=')}}"+val;
                }, 400 );
            });

            var delay = (function(){
                var timer = 0;
                return function(callback, ms){
                    clearTimeout (timer);
                    timer = setTimeout(callback, ms);
                };
            })();

            var date = new Date();

        });
    </script>
@endsection