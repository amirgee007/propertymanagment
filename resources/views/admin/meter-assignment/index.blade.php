@extends('admin.layouts.base')

@section('title')
    Meter Assignment
    @parent
@stop

@section('header_styles')
    <style>

    </style>
@endsection

@section('content')
    <section id="page-content">
        <div class="header-content">
            <h2><i class="fa fa-home"></i>Projects Dashboard <span>Meter Assignment</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">Meter Assignment</li>
                </ol>
            </div>
        </div>

        @include('flash::message')

        <div class="body-content animated fadeIn">
            <div class="row">
                {{--meter type table --}}
                @include('admin.meter-assignment.partials.assigned-meters-table')

            </div>
        </div>
        @include('admin.layouts.pagefooter')
    </section>
    {{--modals html include--}}
    @include('admin.meter-assignment.partials.modal-windows')

@endsection

@section('footer_scripts')

    <script>
        $(document).ready(function () {

            $(document).on('click' , '.meter-delete' , function () {
                const url = $(this).attr('data-url');

                $('#meter-assign-delete-form').attr('action' , url);
                $('#delete-assign-meter').modal('show');
            });

            $('#meter-assign-delete-form').on('submit' , function (e) {
                e.preventDefault();
                const url = $(this).attr('action');
                $.ajax({
                    url: url,
                    headers: { 'X-XSRF-TOKEN' : '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}' },
                    error: function() {

                    },
                    success: function(data) {
                        if (data.status) {
                            $('#assign-meter-tr-'+data.id).remove();
                            toastr.success("Meter Assign Successfully");
                        }else {
                            toastr.success("Meter Assignment deleted Successfully");
                        }
                        $('#delete-assign-meter').modal('hide');
                    },
                    type: 'DELETE'
                });
            });

            $('#meter-assign-form').on('submit' , function (e) {
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
                            $('#meter-tbody').append(data.html);
                            $('#assign-meter-modal').modal('hide');
                            toastr.success("Meter Assign Successfully");
                        }
                    },
                    type: 'POST'
                });
            })
        });
    </script>

@endsection