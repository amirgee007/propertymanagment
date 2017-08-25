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
                                            <textarea class="form-control" name="invoice_trans_des"
                                                      readonly="readonly">
                                                {{ $invoice->invoice_trans_des }}
                                            </textarea>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Date<</label>
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
    <script src="/admin/assets/global/plugins/bower_components/bootstrap-datepicker-vitalets/js/bootstrap-datepicker.js"></script>
    <script src="/admin/assets/global/plugins/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
@endsection

