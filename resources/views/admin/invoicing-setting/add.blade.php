@extends('admin.layouts.base')

@section('title')
    Add Invoicing Setting
    @parent
@stop

@section('header_styles')

@endsection

@section('content')
    <section id="page-content">
        <div class="header-content">
            <h2><i class="fa fa-home"></i>Projects Dashboard <span>Invoicing Setting</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">Add Invoicing Setting</li>
                </ol>
            </div>
        </div>

        @include('flash::error_message')
        @include('flash::message')
        <div class="body-content animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel rounded shadow">
                        <div class="panel-body no-padding">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel rounded shadow">
                                        <div class="panel-heading">
                                            <div class="pull-left">
                                                <h3 class="panel-title">Invoicing Setting
                                                    <small>Add New Here</small>
                                                </h3>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="panel-body no-padding">
                                            <form class="form-horizontal form-bordered" method="post" role="form"
                                                  id="form-invoicing-setting"
                                                  action="{{route('invoicing-setting.edit')}}">
                                                <div class="form-body">
                                                    {{csrf_field()}}
                                                    <div class="col-sm-6" style="margin-top:20px;">

                                                        <div class="bs-example-modal">
                                                            <div class="modal modal-info">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">
                                                                                <i style="font-size:16px;"
                                                                                   class="fa fa-info-circle"></i>
                                                                                General</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label class="col-sm-4 control-label">Invoice
                                                                                    Creation Day</label>
                                                                                <div class="col-sm-7">
                                                                                    <input type="text"
                                                                                           class="form-control input-sm"
                                                                                           value="{{@$general->invoice_creation_day}}"
                                                                                           name="general[invoice_creation_day]">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-4 control-label">Invoice
                                                                                    Due Date</label>
                                                                                <div class="col-sm-7">
                                                                                    <input type="text"
                                                                                           class="form-control input-sm"
                                                                                           value="{{@$general->invoice_due_date}}"
                                                                                           name="general[invoice_due_date]">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-4 control-label">Interest
                                                                                    Rate</label>
                                                                                <div class="col-sm-7">
                                                                                    <input type="text"
                                                                                           class="form-control input-sm"
                                                                                           value="{{@$general->interest_rate}}"
                                                                                           name="general[interest_rate]">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->
                                                        </div><!-- /.bs-example-modal -->

                                                    </div>
                                                    <div class="col-sm-6" style="margin-top:20px;">
                                                        <div class="bs-example-modal">
                                                            <div class="modal modal-warning">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title"><i
                                                                                        style="font-size:16px;"
                                                                                        class="fa fa-info-circle"></i>
                                                                                Utility Settings</h4>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <div class="form-group">
                                                                                <label class="col-sm-4 control-label">Invoice
                                                                                    Repeat Month</label>
                                                                                <div class="col-sm-7">
                                                                                    <input type="text"
                                                                                           class="form-control input-sm"
                                                                                           value="{{@$utility->invoice_repeat_month}}"
                                                                                           name=" utilitySettings[invoice_repeat_month]">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-4 control-label">Billing
                                                                                    Start Date</label>
                                                                                <div class="col-sm-7">
                                                                                    <input type="text"
                                                                                           class="form-control datepicker input-sm"
                                                                                           data-date-format="dd/mm/yyyy"
                                                                                           value="{{@$utility->billing_start_date->format('d/m/Y')}}"
                                                                                           name=" utilitySettings[billing_start_date]">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-4 control-label">Billing
                                                                                    Ending</label>
                                                                                <div class="col-sm-7">
                                                                                    {!! Form::select('utilitySettings[billing_ending]',array('never' => 'Never', 'on_specific_date' => 'On specific date','after_number_of_billing' => 'After number of billing') , @$utility->billing_ending, ['class' => 'form-control input-sm']) !!}

                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-4 control-label">Tax
                                                                                    Type</label>
                                                                                <div class="col-sm-7">
                                                                                    <input type="text"
                                                                                           class="form-control input-sm"
                                                                                           value="{{@$utility->tax_type}}"
                                                                                           name=" utilitySettings[tax_type]">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->
                                                        </div><!-- /.bs-example-modal -->

                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="bs-example-modal">
                                                            <div class="modal modal modal-teal">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title"><i
                                                                                        style="font-size:16px;"
                                                                                        class="fa fa-info-circle"></i>
                                                                                Maintenance/Service settings</h4>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">Invoice
                                                                                    Repeat Month</label>
                                                                                <div class="col-sm-7">
                                                                                    <input type="text"
                                                                                           class="form-control input-sm"
                                                                                           value="{{@$maintenance->invoice_repeat_month}}"
                                                                                           name=" maintenanceServiceSettings[invoice_repeat_month]">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">Fee
                                                                                    Charged</label>
                                                                                <div class="col-sm-7">
                                                                                    {!! Form::select('maintenanceServiceSettings[fee_charged]',array('property_size' => 'Property size', 'total_amount' => 'Total amount') , @$maintenance->fee_charged, ['class' => 'form-control input-sm']) !!}

                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">Charges
                                                                                    Per Sqft</label>
                                                                                <div class="col-sm-7">
                                                                                    <input type="text"
                                                                                           class="form-control input-sm"
                                                                                           value="{{@$maintenance->charges_per_sqft}}"
                                                                                           name=" maintenanceServiceSettings[charges_per_sqft]">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">Billing
                                                                                    Ending</label>
                                                                                <div class="col-sm-7">
                                                                                    {!! Form::select('maintenanceServiceSettings[billing_ending]',array('never' => 'Never', 'on_specific_date' => 'On specific date','after_number_of_billing' => 'After number of billing') , @$maintenance->billing_ending, ['class' => 'form-control input-sm']) !!}
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">Tax
                                                                                    Type</label>
                                                                                <div class="col-sm-7">
                                                                                    <input type="text"
                                                                                           class="form-control input-sm"
                                                                                           value="{{@$maintenance->tax_type}}"
                                                                                           name=" maintenanceServiceSettings[tax_type]">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->
                                                        </div><!-- /.bs-example-modal -->

                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-theme">Change Invoicing
                                                        System
                                                    </button>
                                                </div>
                                            </form>
                                        </div><!-- /.panel-body -->
                                    </div><!-- /.panel -->
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel -->
                </div>
            </div>
        </div>
        @include('admin.layouts.pagefooter')
    </section>

@endsection

@section('footer_scripts')

    <script>
        $(document).ready(function () {
            $('.datepicker').datepicker({
//                startDate: '-3d'
            });
        });
    </script>

@endsection

