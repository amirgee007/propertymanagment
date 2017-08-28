@extends('admin.layouts.base')

@section('title')
    Meter Reading
    @parent
@stop

@section('header_styles')
    <link href="/admin/assets/global/plugins/bower_components/bootstrap-datepicker-vitalets/css/datepicker.css"
          rel="stylesheet">
    <link href="/admin/assets/global/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css"
          rel="stylesheet">
    <link href="{{asset('assets/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    <style>

    </style>
@endsection

@section('content')
    <section id="page-content">
        <div class="header-content">
            <h2><i class="fa fa-home"></i>Projects Dashboard <span>Meter Reading</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">Meter Reading</li>
                </ol>
            </div>
        </div>

        @include('flash::message')

        <div class="body-content animated fadeIn">
            <div class="row">
                {{--<div class="col-lg-12">--}}
                    {{--<div class="panel rounded shadow">--}}
                        {{--<div class="panel-heading" style="padding: 2%">--}}
                            {{--<h4 class="no-margin">--}}
                                {{--Search Meter--}}
                                {{--<div class="pull-right">--}}
                                    {{--<button type="button" class="btn btn-info" data-toggle="modal" data-target="#assign-meter-modal">Add Meter Reading</button>--}}
                                {{--</div>--}}
                            {{--</h4>--}}
                            {{--<hr>--}}
                                {{--@include('admin.meter-reading.partials.searchForm')--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--meter type table --}}
                @include('admin.meter-reading.partials.meter-reading-table')

            </div>
        </div>
        @include('admin.layouts.pagefooter')
    </section>

    @include('admin.meter-reading.partials.form')
    {{--modals html include--}}
{{--    @include('admin.meter-assignment.partials.modal-windows')--}}
@endsection

@section('footer_scripts')
    <script src="/admin/assets/global/plugins/bower_components/bootstrap-datepicker-vitalets/js/bootstrap-datepicker.js"></script>
    <script src="/admin/assets/global/plugins/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <script src="/admin/assets/global/plugins/bower_components/moment/min/moment.min.js"></script>
    <script src="/admin/assets/global/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="{{asset('assets/vendors/select2/dist/js/select2.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {

            var t = $('#meter-reading-table').DataTable({
                "paging":   false,
                "columns": [
                    null,
                    null,
                    { "searchable": false },
                    { "searchable": false },
                    { "searchable": false },
                    { "searchable": false },
                    { "searchable": false },
                    { "searchable": false }
                ]
            });


            $('#meter-reading-form').on('submit' , function (e) {
                e.preventDefault();
                form = $(this);
                var action = form.attr('action');
                $.ajax({
                    url: action,
                    data: form.serialize(),
                    headers: { 'X-XSRF-TOKEN' : '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}' },
                    error: function() {

                    },
                    success: function(data) {
                        var data = data.meterReading;
                        $('#meter-reading-modal').modal('hide');
                        $('#las-re-d-td-'+data.meter_id).html(data.last_reading_date);
                        $('#las-re-td-'+data.meter_id).html(data.last_reading);
                        toastr.success("SuccessFully added meter Reading");
                    },
                    type: 'POST'
                });
            });


            $('.meterReadingM').on('click' , function () {
                var meter = $(this);
                $('#meter-reading-form')[0].reset();
                const meter_id = meter.attr('data-meter-id');
                const lot_id = meter.attr('data-lot-id');
                $('#lot-field-id').val(lot_id);
                $('#meter-field-id').val(meter_id);
                $('#meter-reading-modal').modal('show');
            });

            $('#reading-date').datepicker({
                format: 'dd-mm-yyyy'
            }).on('changeDate', function (e) {
                $(this).datepicker('hide');
            });

        });
    </script>
@endsection