@extends('admin.layouts.base')

@section('title')
    Add Invoice
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
                    <li class="active">Add Invoice</li>
                </ol>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @include('flash::message')
        <div class="body-content animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel rounded shadow">
                        <div class="panel-body no-padding">
                            <form class="form-horizontal form-bordered" action="{{ route('invoice.store') }}"
                                  role="form" method="post">
                                <div class="form-body">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Owner<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="owner_id" required>
                                                <option value="">Choose Owner</option>
                                                @foreach($owners as $owner)
                                                    <option value="{{$owner->owner_id}}">{{$owner->owner_name}}</option>
                                                @endforeach
                                            </select>
                                            <label for="owner_id" class="error"></label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Lot<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="lot_id" required>
                                                <option value="">Choose Lot</option>
                                                @foreach($lots as $lot)
                                                    <option value="{{ $lot->lot_id }}">{{ $lot->lot_name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="lot_id" class="error"></label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Transaction Description<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <textarea class="form-control input-sm" name="invoice_trans_des"
                                                      required>
                                            </textarea>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Date<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="date" id="dp1">

                                            <label for="date" class="error"></label>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Quantity<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control input-sm" name="invoice_quantity">
                                            {{--<label for="invoice_quantity" class="error @if($errors->has('invoice_quantity')) show @endif">{{ @$errors->get('invoice_quantity')[0] }}</label>--}}
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">UOM<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" name="invoice_uom">
                                            <label for="invoice_uom" class="error"></label>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Charge Rate<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control input-sm"
                                                   name="invoice_charge_rate">                                            <label for="invoice_uom" class="error"></label>
                                            <label for="invoice_charge_rate" class="error"></label>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Amount<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control input-sm" name="invoice_amount">
                                            <label for="invoice_amount" class="error"></label>
                                        </div>
                                    </div><!-- /.form-group -->

                                </div>

                                <div class="form-footer">
                                    <div class="col-sm-offset-3">
                                        <button type="submit" class="btn btn-theme">Save Invoice</button>
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
    <script src="/admin/assets/global/plugins/bower_components/bootstrap-datepicker-vitalets/js/bootstrap-datepicker.js"></script>
    <script src="/admin/assets/global/plugins/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <script src="/admin/assets/global/plugins/bower_components/moment/min/moment.min.js"></script>
    <script src="/admin/assets/global/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#dp1').datepicker({
                format: 'dd-mm-yyyy',
            }).on('changeDate', function (e) {
                $(this).datepicker('hide');
            });
        });
        $('select').select2();

    </script>

@endsection

