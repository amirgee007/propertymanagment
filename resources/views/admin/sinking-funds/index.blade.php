@extends('admin.layouts.base')

@section('title')
    List Sinking Funds
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
            <h2><i class="fa fa-home"></i>Sinking Funds Dashboard <span>Sinking Funds Management</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">List Sinking Funds</li>
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
                                <h3 class="panel-title">List Sinking Funds</h3>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('sinking-funds.create') }}" class="btn btn-md btn-info"
                                   data-toggle="tooltip" data-placement="top" data-title="Add Sinking Fund"
                                   data-original-title="Add Sinking Fund" title="Add Sinking Fund"><i class="fa fa-plus"></i>
                                    &nbsp;Add Sinking Fund</a>
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
                                            <th>Sinking Fund ID</th>
                                            <th>Lot Name</th>
                                            <th>Lot Type Name</th>
                                            <th style="width: 25%">Description</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sinkingFunds as $fund)
                                            <tr>
                                                <td>{{ $fund->id }}</td>
                                                <td>{{ $fund->lot_name }}</td>
                                                <td>{{ $fund->lot_type_name }}</td>
                                                <td>{{ str_limit($fund->description, 25) }}</td>
                                                <td>{{ is_null($fund->date) ? "" :  $fund->date->format('d-m-Y')  }}</td>
                                                <td>{{ $fund->amount }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('sinking-funds.show', $fund) }}"
                                                       class="btn btn-success btn-xs rounded"
                                                       data-toggle="tooltip" data-placement="top"
                                                       data-original-title="View detail"><i class="fa fa-eye"></i>
                                                    </a>

                                                    <a href="{{ route('sinking-funds.edit', $fund) }}"
                                                       class="btn btn-primary btn-xs rounded"
                                                       data-toggle="tooltip" data-placement="top"
                                                       data-original-title="Edit"><i class="fa fa-pencil"></i>
                                                    </a>

                                                    <a href="#" class="btn btn-danger btn-xs rounded delete-sinking_fund"
                                                       data-toggle="tooltip" data-placement="top"
                                                       data-original-title="Delete"
                                                       data-sinking-fund-id="{{ $fund->id }}"
                                                       data-url="{{ route('sinking-funds.destroy', $fund->id) }}">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    {{ $sinkingFunds->links() }}
                                </div>
                            </div>
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel -->
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div id="delete-sinking_fund-modal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-danger">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure! you want to delete this Sinking Fund ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="javascript:void(0);" class="btn btn-danger" id="delete-sinking_fund">Delete</a>
                    </div>
                </div>
            </div><!-- /.modal-dialog -->
        </div>

        @include('admin.layouts.pagefooter')
    </section>

@endsection

@section('footer_scripts')
    <script>
        $('.date').datepicker({
            format: 'dd-mm-yyyy'
        }).on('changeDate', function (e) {
            $(this).datepicker('hide');
        });

        $(document).ready(function () {

            $(document).on("click", ".delete-sinking_fund", function (event) {
                $('#delete-sinking_fund').attr('data-url', $(this).attr('data-url'));

                var sinking_fund_id = $(this).attr('data-sinking-fund-id');
                $('.modal-title').html('Sinking Fund ID: ' + sinking_fund_id);
                $('#delete-sinking_fund-modal').modal();
            });

            $(document).on("click", "#delete-sinking_fund", function (event) {
                event.preventDefault();
                var button = $(this);
                $.ajax({
                    type: "DELETE",
                    cache: false,
                    headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
                    url: button.attr('data-url'),
                    beforeSend: function () {
                        button.attr('disabled', true);
                    },
                    success: function (json) {
                        if (json.status == 'success') {
                            $(button).html('<i class="fa fa-check"></i> ' + json.message).attr('disabled', 'disabled');
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        } else if (json.status == 'error') {
                            $(button).html('<i class="fa fa-check"></i> ' + json.message).attr('disabled', 'disabled');
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        }
                    },
                    error: function (json) {},
                    dataType: "json"
                });
            });
        });
    </script>
@endsection

