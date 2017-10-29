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
                                <div class="table-responsive col-xs-12">
                                    <table class="table table-striped table-theme" id="lots-table">
                                        <thead>
                                        <tr>
                                            <th class="border-right">ID</th>
                                            <th>Lot Type ID</th>
                                            <th>Lot Name</th>
                                            <th>Created At</th>
                                            @if(! auth()->user()->hasRole('Owner'))
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($lots as $lot)
                                        <tr id="lot-id-{{$lot->lot_id}}">
                                            <td class="border-right">{{$lot->lot_id}}</td>
                                            <td>{{$lot->lot_type_id}}</td>
                                            <td>{{$lot->lot_name}}</td>
                                            <td>{{ isset($lot->created_at) ? $lot->created_at->diffForHumans() :  ''  }}</td>
                                            @if(! auth()->user()->hasRole('Owner'))
                                                <td>
                                                    <button data-url="{{route('lot.lot.delete' , [$lot->lot_id])}}" class="btn btn-danger delete-meter-rate">delete</button>
                                                </td>
                                            @endif
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

        <div id="delete-meterType" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header bg-danger ">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="delete-modal-title">Lot Delete Confirmation</h4>
                    </div>
                    <div class="modal-body" id="delete-modal-body">
                        <h5><strong> The record will be permanently removed from the system. Are you sure you want to delete? </strong></h5>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" id="delete-meter-btn" data-url="">Confirm</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.layouts.pagefooter')
    </section>

@endsection

@section('footer_scripts')
    <script>
        $(document).ready(function () {

            $('#lots-table').DataTable();
            $('.delete-meter-rate').on('click' , function (e) {
                var url = $(this).attr('data-url');

                $('#delete-meter-btn').attr('data-url' , url);
                $('#delete-meterType').modal('show');
            });

            $('#delete-meter-btn').on('click', function () {
                const url = $('#delete-meter-btn').attr('data-url');
                $('#delete-meterType').modal('hide');
                $.ajax({
                    url: url,
                    headers: { 'X-XSRF-TOKEN' : '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}' },
                    error: function() {

                    },
                    success: function(data) {
                        if(data.status) {
                            $('#lot-id-'+data.id).remove();
                            toastr.success("lot Deleted Successfully");
                        }
                    },
                    type: 'DELETE'
                });
            });

        });
    </script>

@endsection

