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
            <h2><i class="fa fa-home"></i>Invoicing Dashboard <span>Invoice Management</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">List Invoices</li>
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
                                <h3 class="panel-title">List Invoices</h3>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('invoices.create') }}" class="btn btn-md btn-info"
                                   data-toggle="tooltip" data-placement="top" data-title="Add Invoice"
                                   data-original-title="Add Invoice" title="Add Invoice"><i class="fa fa-plus"></i>
                                    &nbsp;Add Invoice</a>
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
                                            <th>Invoice ID</th>
                                            <th>Owner Name</th>
                                            <th>Lot Name</th>
                                            <th>Date</th>
                                            <th>Qty</th>
                                            <th>UOM</th>
                                            <th>Charge Rate</th>
                                            <th>Amount</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($invoices as $invoice)
                                            <tr>
                                                <td>{{ $invoice->invoice_id }}</td>
                                                <td>{{ @$invoice->owner->owner_name }}</td>
                                                <td>{{ @$invoice->lot->lot_name }}</td>
                                                <td>{{ is_null($invoice->date) ? "" :  $invoice->date->format('d-m-Y')  }}</td>
                                                <td>{{ $invoice->invoice_quantity }}</td>
                                                <td>{{ $invoice->invoice_uom }}</td>
                                                <td>{{ $invoice->invoice_charge_rate }}</td>
                                                <td>{{ $invoice->invoice_amount }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('invoices.show', $invoice) }}"
                                                       class="btn btn-success btn-xs rounded"
                                                       data-toggle="tooltip" data-placement="top"
                                                       data-original-title="View detail"><i class="fa fa-eye"></i></a>
                                                    <a href="{{ route('invoices.edit', $invoice) }}"
                                                       class="btn btn-primary btn-xs rounded"
                                                       data-toggle="tooltip" data-placement="top"
                                                       data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a href="#" class="btn btn-danger btn-xs rounded delete-invoice"
                                                       data-toggle="tooltip" data-placement="top" data-original-title="Delete"
                                                       data-invoice-id="{{ $invoice->invoice_id }}"
                                                       data-url="{{ route('invoices.destroy', $invoice->invoice_id) }}">
                                                        <i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    {{ $invoices->links() }}
                                </div>
                            </div>
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel -->
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="delete-invoice-modal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-danger">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure! you want to delete this Invoice ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="javascript:void(0);" class="btn btn-danger" id="delete-invoice">Delete</a>
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

            $(document).on("click", ".delete-invoice", function(event){
                $('#delete-invoice').attr('data-url', $(this).attr('data-url'));

                var invoice_id = $(this).attr('data-invoice-id');
                $('.modal-title').html('Invoice ID: '+ invoice_id);
                $('#delete-invoice-modal').modal();
            });

            $(document).on("click", "#delete-invoice", function(event){
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

