@extends('admin.layouts.base')

@section('title')
    Add Meter and Type
    @parent
@stop

@section('header_styles')
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

<script>
    $(document).ready(function () {

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
                    }
                },
                type: 'DELETE'
            });
        });


        $(document).on('click' , '#meterFormSubmit' , function (e) {
            e.preventDefault();
            var form = $('#meter-form');
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
                    }
                },
                type: 'POST'
            });
        })
    });
</script>

@endsection