@extends('admin.layouts.base')

@section('title')
    Add Meter and Type
    @parent
@stop

@section('header_styles')
    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    <style>

    </style>
@endsection

@section('content')
    <section id="page-content">
        <div class="header-content">
            <h2><i class="fa fa-home"></i>Projects Dashboard <span>Meter Management</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">Add meter and meter type</li>
                </ol>
            </div>
        </div>

        @include('flash::message')

        <div class="body-content animated fadeIn">
            <div class="row">
                {{--meter type table --}}
                @include('admin.meter-management.partials.meterType')
                {{--meter rate table --}}
                @include('admin.meter-management.partials.meterRate')
            </div>
        </div>
        @include('admin.layouts.pagefooter')
    </section>
    {{--modals html include--}}
        @include('admin.meter-management.partials.createModal')

        @endsection

@section('footer_scripts')
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {

        var t =$('#meter-rate-table').DataTable({
            "paging":   false,
            "searching": false,
            'info': false,
            "dom":''
        });



        $('#meter-type-modal-btn').on('click', function () {
            $('#meter-form')[0].reset();
            $('#myModal').modal('show');
        });

        $('#meter-rate-modal-btn').on('click', function () {
            $('#meter-rate-create-form')[0].reset();
            $('#create-meter-rate-modal').modal('show');
        });

        $(document).on('click' , '.edit-meter-rate' , function (e) {
            const url = $(this).attr('data-url');
            $.ajax({
                url: url,
                headers: { 'X-XSRF-TOKEN' : '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}' },
                error: function() {
                },
                success: function(data) {
                    form = $('#meter-rate-edit-form');
                    form.attr('action' , url);
                    form.html(data);
                    $('#edit-meter-rate-modal').modal('show');
                },
                type: 'GET'
            });
        });

        $('#meter-rate-edit-form').on('submit' , function (e) {

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
                    $('#m-rate-'+data.id).html(data.html);
                    $('#edit-meter-rate-modal').modal('hide');
                    toastr.success("Meter Rate Updated Successfully");
                },
                type: 'PUT'
            });


        });



        $(document).on('click' , '.edit-meter-type' , function (e) {
            const url = $(this).attr('data-url');
            $.ajax({
                url: url,
                headers: { 'X-XSRF-TOKEN' : '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}' },
                error: function() {
                },
                success: function(data) {
                    form = $('#meter-type-edit-form');
                    form.attr('action' , url);
                    form.html(data);
                    $('#edit-meter-modal').modal('show');
                },
                type: 'GET'
            });
        });

        $('#meter-type-edit-form').on('submit' , function (e) {

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
                    $('#m-type-'+data.id).html(data.html);
                    $('#edit-meter-modal').modal('hide');

                    toastr.success("Meter Type Updated Successfully");
                },
                type: 'PUT'
            });


        });

        $('.delete-meter-type').on('click' , function (e) {
            var url = $(this).attr('data-url');
            $('#delete-modal-title').html('Meter Type Delete Confirmation');
            $('#delete-modal-body').html('<h3><strong> Are You sure to Delete the meter Type? </strong></h3>');

            $('#delete-meter-btn').attr('data-url' , url);
            $('#delete-meterType').modal('show');
        });


        $('.delete-meter-rate').on('click' , function (e) {
            var url = $(this).attr('data-url');
            $('#delete-modal-title').html('Meter Rate Delete Confirmation');
            $('#delete-modal-body').html('<h3><strong> Are You sure to Delete the meter Rate? </strong></h3>');

            $('#delete-meter-btn').attr('data-url' , url);
            $('#delete-meterType').modal('show');
        });

        $('#delete-meter-btn').on('click', function () {
            const url = $('#delete-meter-btn').attr('data-url');
            $('#delete-meterType').modal('hide');
            $.ajax({
                url: url,
                headers: { 'X-XSRF-TOKEN' : '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}' },
                error: function() {

                },
                success: function(data) {
                    if(data.status) {
                        $('#'+data.id).remove();
                        toastr.success("Meter Type Deleted Successfully");
                    }
                },
                type: 'DELETE'
            });
        });


        $('#meter-form').on('submit' , function (e) {
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
                    if (data.status) {
                        $('#meter-type-tbody').append(data.meterType);
                        $('#meter-rate-tbody').append(data.meterRate);
                        $('#myModal').modal('hide');
                        $('#meter_type_select_box')
                            .append('<option value="'+data.type.id+'">'+data.type.meter_name+'</option>');
                        toastr.success("Meter Type Created Successfully");
                    }
                },
                type: 'POST'
            });
        });

        $('#meter-rate-create-form').on('submit' , function (e) {
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
                    if (data.status) {
                        var rowNode = t.row.add([
                            data.rate.id,
                            data.rate.from,
                            data.rate.to,
                            data.rate.rate,
                            "<button data-url='{{url('/dashboard/meter/rate/edit/')}}"+data.rate.id+"'  class='btn btn-default edit-meter-type'>edit</button>\n" +
                            "<button data-url='{{url('/dashboard/meter/rate/')}}"+data.rate.id+"' class='btn btn-danger delete-meter-type'>delete</button>"
                        ]).draw( false );

                        console.log(rowNode);
                        $('#meter-rate-table tr:last').attr('id' , 'm-rate-'+data.rate.id);

                        $('#create-meter-rate-modal').modal('hide');
                        toastr.success("Meter Rate Created Successfully");
                    }
                },
                type: 'POST'
            });
        });


    });
</script>

@endsection