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
    <link href="{{ asset('/css/modal_center.css') }}" rel="stylesheet" type="text/css"/>
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
                                            <th>Type</th>
                                            <th style="width: 25%">Description</th>
                                            <th>Date</th>
                                            <th>Due Date</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($invoices as $invoice)
                                            <tr>
                                                <td>{{ $invoice->invoice_id }}</td>
                                                <td>{{ @$invoice->owner->owner_name }}</td>
                                                <td>{{ ucwords($invoice->type) }}</td>
                                                <td>
                                                    {{ str_limit($invoice->invoice_trans_des, 25) }}
                                                </td>
                                                <td>
                                                    {{ is_null($invoice->date) ? "" :  $invoice->date->format('d-m-Y')  }}
                                                </td>
                                                <td>
                                                    {{ isset($invoice->due_date)?$invoice->due_date:'' }}
                                                </td>
                                                <td>{{ $invoice->invoice_amount }}</td>
                                                <td>{!! $invoice->label_status !!}</td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-info btn-xs rounded add-payment"
                                                       data-toggle="tooltip" data-placement="top"
                                                       data-original-title="Record payment"
                                                       data-invoice-id="{{ $invoice->invoice_id }}">
                                                        <i class="fa fa-credit-card"></i>
                                                    </a>

                                                    <a data-url="{{ route('invoices.pdf', $invoice->invoice_id) }}"
                                                       class="btn btn-success btn-xs rounded pdf_download_popup"
                                                       title="Download PDF"
                                                       data-toggle="modal" data-target="#pdfmodal"><i
                                                                class="fa fa-file-pdf-o"></i>
                                                    </a>

                                                    <a href="{{ route('invoices.show', $invoice) }}"
                                                       class="btn btn-success btn-xs rounded"
                                                       data-toggle="tooltip" data-placement="top"
                                                       data-original-title="View detail"><i class="fa fa-eye"></i>
                                                    </a>

                                                    <a href="{{ route('invoices.edit', $invoice) }}"
                                                       class="btn btn-primary btn-xs rounded"
                                                       data-toggle="tooltip" data-placement="top"
                                                       data-original-title="Edit"><i class="fa fa-pencil"></i>
                                                    </a>

                                                    <a href="#" class="btn btn-danger btn-xs rounded delete-invoice"
                                                       data-toggle="tooltip" data-placement="top"
                                                       data-original-title="Delete"
                                                       data-invoice-id="{{ $invoice->invoice_id }}"
                                                       data-url="{{ route('invoices.destroy', $invoice->invoice_id) }}">
                                                        <i class="fa fa-times"></i>
                                                    </a>
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

        @include('admin.invoices.partials.form_modals')
        @include('admin.invoices.partials._pdf_download_modal')

        @include('admin.layouts.pagefooter')
    </section>

@endsection

@section('footer_scripts')
    <script>
        $(document).on("click", ".pdf_download_popup", function () {
            var pdf_link = $(this).data('url');
            $("#pdf-download-footer #pdf-download-link-btn").attr("href", pdf_link);
            // As pointed out in comments,
            // it is superfluous to have to manually call the modal.
            // $('#addBookDialog').modal('show');
        });

        $('.date').datepicker({
            format: 'dd-mm-yyyy'
        }).on('changeDate', function (e) {
            $(this).datepicker('hide');
        });

        $(document).ready(function () {

            $(document).on("click", ".delete-invoice", function (event) {
                $('#delete-invoice').attr('data-url', $(this).attr('data-url'));

                var invoice_id = $(this).attr('data-invoice-id');
                $('.modal-title').html('Invoice ID: ' + invoice_id);
                $('#delete-invoice-modal').modal();
            });

            $(document).on("click", "#delete-invoice", function (event) {
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
                    error: function (json) {

                    },
                    dataType: "json"
                });
            });

            $(document).on("click", ".add-payment", function (event) {
                var invoice_id = $(this).attr('data-invoice-id');

                $('#invoice_id').val(invoice_id);
                $('#add-payment-modal').modal();
            });

            $(document).on("click", ".reset-form, .close", function (event) {
                document.getElementById("add-payment-form").reset();
            });

            $('#add-payment-form').submit(function(event) {
                event.preventDefault();
                var form = $(this);
                $.ajax({
                    type: "POST",
                    cache: false,
                    headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
                    url: form.attr('action'),
                    data: form.serialize(),
                    success: function (json) {
                        if (json.success === true) {
                            document.getElementById("add-payment-form").reset();
                            toastr.success(json.message, "Success!");
                            $('#add-payment-modal').modal('toggle');
                        } else if (json.success === false) {
                            toastr.error(json.message, 'Error!');
                        }
                    },
                    error: function (json) {
                        toastr.error(json.message, 'Error!');
                    },
                    dataType: "json"
                });
            });
        });
    </script>
@endsection

