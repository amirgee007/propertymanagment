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
                                                                                    <input type="number"
                                                                                           class="form-control input-sm"
                                                                                           min="0" value="{{isset($general->invoice_due_date) ? $general->invoice_due_date : ''}}"
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
                                                                                <label class="col-sm-4 control-label">Tax Type</label>
                                                                                <div class="col-sm-7">
                                                                                    <select data-placeholder="Choose an type"
                                                                                            class="form-control input-sm chosen-select mb-15" tabindex="2"
                                                                                            name="utilitySettings[tax_type_id]">
                                                                                        <option value="">Choose an Type</option>
                                                                                        @foreach($taxTypes as $taxType)
                                                                                            <option @if($taxType->id == @$utility->tax_type_id) selected @endif value="{{ $taxType->id }}">{{ $taxType->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <label for="utilitySettings[tax_type_id]" class="error"></label>
                                                                                </div>
                                                                            </div>

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
                                                                                           data-date-format="dd-mm-yyyy"
                                                                                           value="{{isset($utility->billing_start_date)?$utility->billing_start_date->format('d-m-Y'):''}}"
                                                                                           name=" utilitySettings[billing_start_date]">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-4 control-label">Billing
                                                                                    Ending</label>
                                                                                <div class="col-sm-7">
                                                                                    {!! Form::select('utilitySettings[billing_ending]',array('never' => 'Never', 'on_specific_date' => 'On specific date','after_number_of_billing' => 'After number of billing') , @$utility->billing_ending, ['class' => 'form-control input-sm' ,'id'=>'utility_billing_ending']) !!}

                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group" id="utility_end_date_dev">
                                                                                <label class="col-sm-4 control-label">Billing
                                                                                    End Date</label>
                                                                                <div class="col-sm-7">
                                                                                        <input type="text"
                                                                                               class="form-control datepicker input-sm"
                                                                                               data-date-format="dd-mm-yyyy"
                                                                                               value="{{isset($utility->billing_end_date)?$utility->billing_end_date->format('d/m/Y'):''}}"
                                                                                               name=" utilitySettings[billing_end_date]"
                                                                                                id="utility_billing_end_date">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group" id="utility_after_billing_day_dev">
                                                                                <label class="col-sm-4 control-label">After
                                                                                    Billing Day</label>
                                                                                <div class="col-sm-7">
                                                                                    <input type="number"
                                                                                           class="form-control input-sm"
                                                                                           value="{{@$utility->after_billing_day}}"
                                                                                           name=" utilitySettings[after_billing_day]">
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
                                                                                <label class="col-sm-3 control-label">Tax Type</label>
                                                                                <div class="col-sm-7">
                                                                                    <select data-placeholder="Choose an type"
                                                                                            class="form-control input-sm chosen-select mb-15" tabindex="2"
                                                                                            name="maintenanceServiceSettings[tax_type_id]">
                                                                                        <option value="">Choose an Type</option>
                                                                                        @foreach($taxTypes as $taxType)
                                                                                            <option @if($taxType->id == @$maintenance->tax_type_id) selected @endif value="{{ $taxType->id }}">{{ $taxType->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <label for="maintenanceServiceSettings[tax_type_id]" class="error"></label>
                                                                                </div>
                                                                            </div>

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
                                                                                    {!! Form::select('maintenanceServiceSettings[fee_charged]',array('property_size' => 'Property size', 'total_amount' => 'Total amount') , @$maintenance->fee_charged, ['class' => 'form-control input-sm', 'id'=>'service_fee_charge']) !!}

                                                                                </div>
                                                                            </div>

                                                                            <div id="services_lot_type_dev">
                                                                                @foreach($lot_types as $lot_type)
                                                                                    <div class="form-group">
                                                                                        <label class="col-sm-3 control-label">Type {{$lot_type->lot_type_name}}:</label>
                                                                                        <div class="col-sm-7">
                                                                                            <input type="number"
                                                                                                   class="form-control input-sm"
                                                                                                   value="{{@$lot_type->charge?$lot_type->charge->fee_charge:''}}"
                                                                                                   name="feeChargeLotType[{{$lot_type->lot_type_id}}]"
                                                                                                    placeholder="Fee Charge">
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>

                                                                            <div id="charge_rate_lot_type_dev">
                                                                                @foreach($lot_types as $lot_type)
                                                                                    <div class="form-group">
                                                                                        <label class="col-sm-3 control-label">Type {{$lot_type->lot_type_name}}:</label>
                                                                                        <div class="col-sm-7">
                                                                                            <input type="number"
                                                                                                   class="form-control input-sm"
                                                                                                   value="{{@$lot_type->charge?$lot_type->charge->charging_rate:''}}"
                                                                                                   name="chargeRateLotType[{{$lot_type->lot_type_id}}]"
                                                                                                    placeholder="Charging Rate">
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>

                                                                            <div class="form-group" id="services_sqft_dev">
                                                                                <label class="col-sm-3 control-label">Charges
                                                                                    Per Sqft</label>
                                                                                <div class="col-sm-7">
                                                                                    <input type="text"
                                                                                           class="form-control input-sm"
                                                                                           value="{{@$maintenance->charges_per_sqft}}"
                                                                                           readonly="readonly"
                                                                                           disabled
                                                                                           {{--name=" maintenanceServiceSettings[charges_per_sqft]"--}}>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">Billing
                                                                                    Ending</label>
                                                                                <div class="col-sm-7">
                                                                                    {!! Form::select('maintenanceServiceSettings[billing_ending]',array('never' => 'Never', 'on_specific_date' => 'On specific date','after_number_of_billing' => 'After number of billing') , @$maintenance->billing_ending, ['class' => 'form-control input-sm','id'=>'service_billing_ending']) !!}
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group" id="service_end_date_dev">
                                                                                <label class="col-sm-3 control-label">Billing
                                                                                    End Date</label>
                                                                                <div class="col-sm-7">
                                                                                    <input type="text"
                                                                                           class="form-control datepicker input-sm"
                                                                                           data-date-format="dd-mm-yyyy"
                                                                                           value="{{ isset($maintenance->billing_end_date) ? $maintenance->billing_end_date->format('d/m/Y') : '' }}"
                                                                                           name="maintenanceServiceSettings[billing_end_date]"
                                                                                           id="service_billing_end_date">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group" id="service_after_billing_day_dev">
                                                                                <label class="col-sm-3 control-label">After
                                                                                    Billing Day</label>
                                                                                <div class="col-sm-7">
                                                                                    <input type="number"
                                                                                           class="form-control input-sm"
                                                                                           value="{{@$maintenance->after_billing_day}}"
                                                                                           name=" maintenanceServiceSettings[after_billing_day]">
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

        $(function() {
            if($('#utility_billing_ending').val() == 'never'){
                $('#utility_end_date_dev').hide();
                $('#utility_after_billing_day_dev').hide();
            }
            if($('#utility_billing_ending').val() == 'on_specific_date'){
                $('#utility_after_billing_day_dev').hide();
            }
            if($('#utility_billing_ending').val() == 'after_number_of_billing'){
                $('#utility_end_date_dev').hide();
            }
            $('#utility_billing_ending').change(function(){
                if($('#utility_billing_ending').val() == 'never'){
                    $('#utility_end_date_dev').hide();
                    $('#utility_after_billing_day_dev').hide();
                }
                if($('#utility_billing_ending').val() == 'on_specific_date'){
                    $('#utility_after_billing_day_dev').hide();
                    $('#utility_end_date_dev').show();

                }
                if($('#utility_billing_ending').val() == 'after_number_of_billing'){
                    $('#utility_end_date_dev').hide();
                    $('#utility_after_billing_day_dev').show();
                }
            });
        });
        $(function() {
            if($('#service_billing_ending').val() == 'never'){
                $('#service_end_date_dev').hide();
                $('#service_after_billing_day_dev').hide();
            }
            if($('#service_billing_ending').val() == 'on_specific_date'){
                $('#service_after_billing_day_dev').hide();
            }
            if($('#service_billing_ending').val() == 'after_number_of_billing'){
                $('#service_end_date_dev').hide();
            }
            $('#service_billing_ending').change(function(){
                if($('#service_billing_ending').val() == 'never'){
                    $('#service_end_date_dev').hide();
                    $('#service_after_billing_day_dev').hide();
                }
                if($('#service_billing_ending').val() == 'on_specific_date'){
                    $('#service_after_billing_day_dev').hide();
                    $('#service_end_date_dev').show();

                }
                if($('#service_billing_ending').val() == 'after_number_of_billing'){
                    $('#service_end_date_dev').hide();
                    $('#service_after_billing_day_dev').show();
                }
            });
        });
        $(function() {
            if($('#service_fee_charge').val() == 'property_size'){
                $('#services_lot_type_dev').hide();
                $('#charge_rate_lot_type_dev').show();
            }
            if($('#service_fee_charge').val() == 'total_amount'){
                $('#services_sqft_dev').hide();
                $('#charge_rate_lot_type_dev').hide();
            }
            $('#service_fee_charge').change(function(){
                if($('#service_fee_charge').val() == 'property_size'){
                    $('#services_lot_type_dev').hide();
                    $('#services_sqft_dev').show();
                    $('#charge_rate_lot_type_dev').show();
                }
                if($('#service_fee_charge').val() == 'total_amount'){
                    $('#services_lot_type_dev').show();
                    $('#services_sqft_dev').hide();
                    $('#charge_rate_lot_type_dev').hide();
                }
            });
        });
    </script>

@endsection

