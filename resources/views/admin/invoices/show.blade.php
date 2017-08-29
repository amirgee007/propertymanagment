@extends('admin.layouts.base')

@section('title')
    Show Invoice
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
                    <li class="active">Show Invoice</li>
                </ol>
            </div>
        </div>

        <div class="body-content animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel rounded shadow">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h3 class="panel-title">Invoice issued to <small>{{ $invoice->owner->owner_name }}</small></h3>
                            </div>
                            <div class="pull-right">
                                <a href="{{ URL::previous() }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" data-title="Go Back" data-original-title="Go Back" title="Go Back">Go Back</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body no-padding">
                            <form class="form-horizontal form-bordered" action="#"
                                  role="form" method="post">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Owner</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" disabled="disabled">
                                                <option value="">{{ @$invoice->owner->owner_name }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Lot</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" disabled="disabled">
                                                <option value="">{{ @$invoice->lot->lot_name }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Transaction Description</label>
                                        <div class="col-sm-7">
                                            <textarea class="form-control" rows="5" readonly="readonly">{{ $invoice->invoice_trans_des }}</textarea>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Date</label>
                                        <div class="col-sm-7">
                                            <input type="text" value="{{ is_null($invoice->date) ? "" :  $invoice->date->format('d-m-Y')  }}" class="form-control" readonly="readonly">
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Quantity</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" value="{{ $invoice->invoice_quantity }}" readonly="readonly">
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">UOM</label>
                                        <div class="col-sm-7">
                                            <input type="text" value="{{ $invoice->invoice_uom }}" class="form-control" readonly="readonly">
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Charge Rate</label>
                                        <div class="col-sm-7">
                                            <input value="{{ $invoice->invoice_charge_rate }}" type="number" class="form-control" readonly="readonly">
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Amount</label>
                                        <div class="col-sm-7">
                                            <input type="number" value="{{ $invoice->invoice_amount }}" class="form-control" readonly="readonly">
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Status</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" disabled>
                                                <option value="">Choose Status</option>
                                                <option @if($invoice->invoice_status == 'paid') selected @endif value="paid">Paid</option>
                                                <option @if($invoice->invoice_status == 'unpaid') selected @endif value="unpaid">Unpaid</option>
                                                <option @if($invoice->invoice_status == 'partial') selected @endif value="partial">Partial</option>
                                                <option @if($invoice->invoice_status == 'overdue') selected @endif value="overdue">Overdue</option>
                                            </select>
                                        </div>
                                    </div><!-- /.form-group -->

                                </div>
                            </form>
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel -->
                    <div class="panel rounded shadow">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h3 class="panel-title">List Payments</h3>
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
                                        <th>Payment ID</th>
                                        <th>Owner Name</th>
                                        <th>Payment Date</th>
                                        <th>Amount</th>
                                        <th>Method</th>
                                        <th style="width: 30%">Notes</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($payments as $payment)
                                        <tr>
                                            <td>{{ $payment->invoice_payment_id }}</td>
                                            <td>{{ @$payment->owner->owner_name }}</td>
                                            <td>{{ is_null($payment->payment_date) ? "" :  \Carbon\Carbon::parse($invoice->payment_date)->format('d-m-Y')  }}</td>
                                            <td>{{ $payment->amount }}</td>
                                            <td>{{ $payment->method }}</td>
                                            <td>{{ $payment->notes }}</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-info btn-xs rounded send-invoice"
                                                   data-toggle="tooltip" data-placement="top"
                                                   data-original-title="Send Invoice"
                                                   data-invoice-id="{{ $invoice->invoice_id }}"
                                                   data-payment-id="{{ $payment->invoice_payment_id }}"
                                                   data-email="{{ @$payment->owner->email }}"
                                                >
                                                    <i class="fa fa-envelope"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center">
                                {{ $payments->links() }}
                            </div>
                        </div>
                    </div><!-- /.panel-body -->
                    </div><!-- /.panel -->
                </div>
            </div>

        </div>

        @include('admin.invoices.payment_partials.send_invoice_modal')
        @include('admin.layouts.pagefooter')
    </section>

@endsection

@section('footer_scripts')
    <script src="/admin/assets/global/plugins/bower_components/bootstrap-datepicker-vitalets/js/bootstrap-datepicker.js"></script>
    <script src="/admin/assets/global/plugins/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>

<script>
    $(document).ready(function () {

        $(document).on("click", ".send-invoice", function (event) {
            var invoice_id = $(this).attr('data-invoice-id');
            var payment_id = $(this).attr('data-payment-id');
            var email = $(this).attr('data-email');

            $('#from_email').val(email);
            $('#from_email_p').text(email);
            $('#subject').text('Payment Recipient for Invoice #'+ invoice_id);
            $('#delivery_text').text('Send a copy to my self at '+ email);
            $('#invoice_id').val(invoice_id);
            $('#payment_id').val(payment_id);
            $('#send-invoice-modal').modal();
        });

        $(document).on("click", ".reset-form, .close", function (event) {
            document.getElementById("send-invoice-form").reset();
        });

        $('#send-invoice-form').submit(function(event) {
            event.preventDefault();
            var form = $(this);
            $.ajax({
                type: "POST",
                cache: false,
                headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
                url: form.attr('action'),
                data: form.serialize(),
                beforeSend: function () {
                    $('#send-invoice').attr('disabled', true);
                },
                success: function (json) {
                    if (json.success === true) {
                        document.getElementById("send-invoice-form").reset();
                        toastr.success(json.message, "Success!");
                        $('#send-invoice-modal').modal('toggle');
                    } else if (json.success === false) {
                        $('#send-invoice').removeAttr('disabled');
                        toastr.error(json.message, 'Error!');
                    }
                },
                error: function (json) {
                    $('#send-invoice').removeAttr('disabled');
                    toastr.error(json.message, 'Error!');
                },
                dataType: "json"
            });
        });

    });
</script>

@endsection

