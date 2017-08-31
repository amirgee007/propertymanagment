@extends('admin.layouts.base')

@section('title')
    List Owners
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
            <h2><i class="fa fa-home"></i>Owners Dashboard <span>Owner Management</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">List Owners</li>
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
                                <h3 class="panel-title">List Owners</h3>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('owner.add.new') }}" class="btn btn-md btn-info"
                                   data-toggle="tooltip" data-placement="top" data-title="Add owner"
                                   data-original-title="Add Owner" title="Add Owner"><i class="fa fa-plus"></i>
                                    &nbsp;Add Owner Profile</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="container">
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-striped table-theme">
                                        <thead>
                                        <tr>
                                            <th>Owner ID</th>
                                            <th>Owner Name</th>
                                            <th>IC No.</th>
                                            <th>Phone1</th>
                                            <th>Email</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($owners as $owner)
                                            <tr>
                                                <td>{{ $owner->owner_id }}</td>
                                                <td>{{ $owner->owner_name }}</td>
                                                <td>{{ $owner->owner_id_card_no }}</td>
                                                <td>{{ $owner->owner_phone1  }}</td>
                                                <td>{{ $owner->email }}</td>
                                                <td>
                                                    <label class="label label-info">{{ ucwords($owner->owner_type) }}</label>
                                                </td>
                                                <td>{!! $owner->status !!}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('owner.show', $owner->owner_id) }}"
                                                       class="btn btn-success btn-xs rounded"
                                                       data-toggle="tooltip" data-placement="top"
                                                       data-original-title="View detail"><i class="fa fa-eye"></i>
                                                    </a>

                                                    <a href="{{ route('owner.edit', $owner->owner_id) }}"
                                                       class="btn btn-primary btn-xs rounded"
                                                       data-toggle="tooltip" data-placement="top"
                                                       data-original-title="Edit"><i class="fa fa-pencil"></i>
                                                    </a>
                                                    @if(!auth()->user()->hasRole('Staff'))
                                                    <a href="#" class="btn btn-danger btn-xs rounded delete-owner"
                                                       data-toggle="tooltip" data-placement="top" data-original-title="Delete Owner"
                                                       data-owner-id="{{ $owner->owner_id }}"
                                                       data-url="{{ route('owner.destroy', $owner->owner_id) }}">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    {{ $owners->links() }}
                                </div>
                            </div>
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel -->
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="delete-owner-modal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-danger">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure! you want to delete this owner ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="javascript:void(0);" class="btn btn-danger" id="delete-owner">Delete</a>
                    </div>
                </div>
            </div><!-- /.modal-dialog -->
        </div>

        @include('admin.layouts.pagefooter')
    </section>

@endsection

@section('footer_scripts')
    <script>
        $(document).ready(function() {

            $(document).on("click", ".delete-owner", function(event){
                $('#delete-owner').attr('data-url', $(this).attr('data-url'));

                var owner_id = $(this).attr('data-owner-id');
                $('.modal-title').html('Owner ID: '+ owner_id);
                $('#delete-owner-modal').modal();
            });

            $(document).on("click", "#delete-owner", function(event){
                event.preventDefault();
                var button = $(this);
                $.ajax({
                    type: "DELETE",
                    cache: false,
                    headers:{'X-CSRF-TOKEN': Laravel.csrfToken},
                    url: button.attr('data-url'),
                    beforeSend: function(){
                        button.attr('disabled', true);
                    },
                    success: function(json){
                        if(json.status == 'success'){
                            $(button).html('<i class="fa fa-check"></i> '+json.message).attr('disabled', 'disabled');
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        } else if (json.status == 'error'){
                            $(button).html('<i class="fa fa-check"></i> '+json.message).attr('disabled', 'disabled');
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        }
                    },
                    error : function(json){

                    },
                    dataType: "json"
                });
            });

        });
    </script>
@endsection

