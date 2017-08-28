@extends('admin.layouts.base')

@section('title')
    Add Meter Rate
    @parent
@stop

@section('header_styles')
    <style>

    </style>
@endsection

@section('content')
    <section id="page-content">
        <div class="header-content">
            <h2><i class="fa fa-home"></i>Projects Dashboard <span>Add Meter Rate</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">Create Meter Rate</li>
                </ol>
            </div>
        </div>

        @include('flash::message')

        <div class="body-content animated fadeIn">
            <div class="row">
                @include('admin.meter-rate.partials.meterRate')
            </div>
        </div>
        @include('admin.layouts.pagefooter')
    </section>
    {{--modals html include--}}
{{--    @include('admin.meter-management.partials.createModal')--}}
@endsection

@section('footer_scripts')

    <script>
        $(document).ready(function () {

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



            {{--$(document).on('click' , '.edit-meter-type' , function (e) {--}}
                {{--const url = $(this).attr('data-url');--}}
                {{--$.ajax({--}}
                    {{--url: url,--}}
                    {{--headers: { 'X-XSRF-TOKEN' : '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}' },--}}
                    {{--error: function() {--}}
                    {{--},--}}
                    {{--success: function(data) {--}}
                        {{--form = $('#meter-type-edit-form');--}}
                        {{--form.attr('action' , url);--}}
                        {{--form.html(data);--}}
                        {{--$('#edit-meter-modal').modal('show');--}}
                    {{--},--}}
                    {{--type: 'GET'--}}
                {{--});--}}
            {{--});--}}

            {{--$('#meter-type-edit-form').on('submit' , function (e) {--}}

                {{--e.preventDefault();--}}
                {{--form = $(this);--}}
                {{--var action = form.attr('action');--}}
                {{--$.ajax({--}}
                    {{--url: action,--}}
                    {{--data: form.serialize(),--}}
                    {{--headers: { 'X-XSRF-TOKEN' : '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}' },--}}
                    {{--error: function() {--}}

                    {{--},--}}
                    {{--success: function(data) {--}}
                        {{--$('#m-type-'+data.id).html(data.html);--}}
                        {{--$('#edit-meter-modal').modal('hide');--}}

                        {{--toastr.success("Meter Type Updated Successfully");--}}
                    {{--},--}}
                    {{--type: 'PUT'--}}
                {{--});--}}


            {{--});--}}

//            $('.delete-meter-type').on('click' , function (e) {
//                var url = $(this).attr('data-url');
//                $('#delete-modal-title').html('Meter Type Delete Confirmation');
//                $('#delete-modal-body').html('<h3><strong> Are You sure to Delete the meter Type? </strong></h3>');
//
//                $('#delete-meter-btn').attr('data-url' , url);
//                $('#delete-meterType').modal('show');
//            });


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

            $('#meter-rate-create-form').on('submit' , function (e) {
                e.preventDefault();
                $('#meter-type-create-submit').disabled();
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
                            $('#meter-type-create-submit').enable();
                            $('#meter-rate-tbody').append(data.meterRate);
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