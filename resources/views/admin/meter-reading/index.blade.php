@extends('admin.layouts.base')

@section('title')
    Meter Reading
    @parent
@stop

@section('header_styles')
    <style>
        a.disabled-click {
            pointer-events: none;
            cursor: default;
        }
    </style>
    <link href="/admin/assets/global/plugins/bower_components/bootstrap-datepicker-vitalets/css/datepicker.css"
          rel="stylesheet">
    <link href="/admin/assets/global/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css"
          rel="stylesheet">
    <link href="{{asset('assets/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
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
    <script>
        $(document).ready(function () {

            $('#meter-reading-search').keyup(function () {
                delay(function(){
                    val = $('#meter-reading-search').val();
                    window.location.href = "{{url('/dashboard/meter/reading?search=')}}"+val;
                }, 400 );
            });

            var delay = (function(){
                var timer = 0;
                return function(callback, ms){
                    clearTimeout (timer);
                    timer = setTimeout(callback, ms);
                };
            })();

            var date = new Date();
//            var t = $('#meter-reading-table').DataTable({
//                "paging":   false,
//                'searching': false
//            });

            $('#meter-reading-table').DataTable();

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
                        toastr.success("SuccessFully added meter Reading");
                        $('#meter-reading-modal').modal('hide');
                        location.reload(true);

                    },
                    type: 'POST'
                });
            });

            $(document).on('click' , '#previous-reading-btn' , function () {
                $('#previous-reading-div').css({display: "none"});
                $('.reading-modal-from').css({display: "block"});
            });

            $(document).on('click' ,'.meterReadingM' , function () {
                var meter = $(this);
                $('#meter-reading-form')[0].reset();
                const meter_id = meter.attr('data-meter-id');
                const lot_id = meter.attr('data-lot-id');

                $.ajax({
                    url: '{{url('/dashboard/meter/reading/previous-readings')}}/'+meter_id,
                    headers: { 'X-XSRF-TOKEN' : '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}' },
                    error: function() {

                    },
                    success: function(data) {
                        console.log(data);
                        $('#meter-previous-reading-div').html(data);
                        $('#previous-reading-div').css({display: "block"});
                        $('.reading-modal-from').css({display: "none"});
                        $('#lot-field-id').val(lot_id);
                        $('#meter-field-id').val(meter_id);
                        $('#meter-reading-modal').modal('show');
                    },
                    type: 'GET'
                });



            });

            $('#reading-date').datepicker({
                format: 'dd-mm-yyyy',
                startDate : new Date(date.getFullYear(), date.getMonth(), 1),
                endDate : new Date(date.getFullYear(), date.getMonth() + 1, 1)
            }).on('changeDate', function (e) {
                $(this).datepicker('hide');
            });

        });
    </script>
@endsection