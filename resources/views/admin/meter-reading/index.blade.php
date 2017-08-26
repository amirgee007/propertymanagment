@extends('admin.layouts.base')

@section('title')
    Meter Reading
    @parent
@stop

@section('header_styles')
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
                {{--meter type table --}}
                @include('admin.meter-reading.partials.meter-reading-table')

            </div>
        </div>
        @include('admin.layouts.pagefooter')
    </section>

    {{--modals html include--}}
{{--    @include('admin.meter-assignment.partials.modal-windows')--}}
@endsection

@section('footer_scripts')

    <script>
        $(document).ready(function () {




        });
    </script>
@endsection
