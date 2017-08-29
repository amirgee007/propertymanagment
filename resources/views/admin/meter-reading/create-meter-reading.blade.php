@extends('admin.layouts.base')

@section('title')
    Add Meter Reading
    @parent
@stop

@section('header_styles')
    <link href="/admin/assets/global/plugins/bower_components/bootstrap-datepicker-vitalets/css/datepicker.css"
          rel="stylesheet">
    <link href="/admin/assets/global/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css"
          rel="stylesheet">
    <link href="{{asset('assets/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <section id="page-content">
        <div class="header-content">
            <h2><i class="fa fa-home"></i>Projects Dashboard <span>Add Meter Reading</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">Add meter Reading</li>
                </ol>
            </div>
        </div>

        @include('flash::message')

        <div class="body-content animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel rounded shadow">
                        <div class="panel-heading" style="padding: 2%">
                            <h4 class="no-margin">
                                Add Meter Reading
                            </h4>
                        </div>
                        <div class="panel-body no-padding">
                            <form class="form-horizontal form-bordered" action="{{route('meter.reading.store')}}"
                                  id="add-meter-reading-form" method="post">
                                {{csrf_field()}}

                                {{--<div class="form-group">--}}
                                    {{--<label class="col-sm-3 control-label">Reading Month</label>--}}
                                    {{--<div class="col-sm-7">--}}
                                        {{--<input disabled class="form-control input-sm" value="August">--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Meter Type</label>
                                    <div class="col-sm-7">
                                        <select name="meter_type_id" id="meter_type" required class="form-control select-s input-sm">
                                            <option value="" >Choose type</option>
                                            @foreach($meterTypes as $meterType_id => $meterType_Name )
                                                <option value="{{$meterType_id}}">
                                                    {{$meterType_Name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Lot Type</label>
                                    <div class="col-sm-7">
                                        <select name="meter_type_id" id="lot_type" required class="form-control select-s input-sm">
                                            <option value="" >Choose type</option>
                                            @foreach($lotTypes as $lotType_id => $lotType_Name )
                                                <option value="{{$lotType_id}}">{{$lotType_Name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group" id="lot-dev">
                                    <label class="col-sm-3 control-label">Lot </label>
                                    <div class="col-sm-7" id="lot-pos">
                                        <select name="lot_id" id="lot_id" class="form-control select-s input-sm">
                                            <option value="" >Choose Lots</option>
                                            @foreach($lots as $lot_id => $lot_Name )
                                                <option value="{{$lot_id}}">{{$lot_Name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group" id="lot-meter-dev">
                                    <label class="col-sm-3 control-label">Select Meter</label>
                                    <div class="col-sm-7" id="lot-meters">
                                        <select name="meter_id"  class="form-control select-s input-sm">
                                            <option value="" >Choose Meter Id</option>
                                            @foreach($meter as $meter_id => $meter_Name )
                                                <option value="{{$meter_id}}">{{$meter_Name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Reading Date</label>
                                    <div class="col-sm-7">
                                        <input class="form-control input-sm" id="reading-date" required name="reading_date">
                                    </div>
                                </div><!-- /.form-group -->


                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Current Reading</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control input-sm" value="" required name="last_reading">
                                    </div>
                                </div><!-- /.form-group -->

                                <div class="col-lg-12">
                                    <button form="add-meter-reading-form" class="btn btn-theme">Save Meter</button>
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
    <script src="{{asset('assets/vendors/select2/dist/js/select2.js')}}"></script>
    <script src="/admin/assets/global/plugins/bower_components/bootstrap-datepicker-vitalets/js/bootstrap-datepicker.js"></script>
    <script src="/admin/assets/global/plugins/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <script src="/admin/assets/global/plugins/bower_components/moment/min/moment.min.js"></script>
    <script src="/admin/assets/global/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script>
        $(document).ready(function () {
            var date = new Date();

            $('#reading-date').datepicker({
                format: 'dd-mm-yyyy',
                startDate : new Date(date.getFullYear(), date.getMonth(), 1),
                endDate : new Date(date.getFullYear(), date.getMonth() + 1, 1)
            }).on('changeDate', function (e) {
                $(this).datepicker('hide');
            });

            $('.select-s').select2();
//            $('#lot_type').select2();

            $('#lot_type').on('change' , function () {

                url = "{{route('meter.reading.lot-type')}}";

                $id = $(this).val();
                $.ajax({
                    url: url,
                    data: {'id': $id},
                    headers: { 'X-XSRF-TOKEN' : '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}' },
                    error: function() {

                    },
                    success: function(data) {
                        $('#lot-pos').html(data);
                        $('#lot-dev').css('display' , 'block');
                    },
                    type: 'post'
                });
            });

            $(document).on('change' , '#lot_id' , function () {

                url = "{{route('meter.reading.lot.meter')}}";

                $id = $(this).val();
                $type = $('#meter_type').val();
                $.ajax({
                    url: url,
                    data: {'id': $id , 'meter_type_id' : $type},
                    headers: { 'X-XSRF-TOKEN' : '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}' },
                    error: function() {

                    },
                    success: function(data) {
                        $('#lot-meters').html(data);
                        $('#lot-meter-dev').css('display' , 'block');
                    },
                    type: 'post'
                });
            });





        });
    </script>

@endsection