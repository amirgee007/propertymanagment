@extends('admin.layouts.base')

@section('title')
    Add Meter and Type
    @parent
@stop

@section('header_styles')

@endsection

@section('content')
    <section id="page-content">
        <div class="header-content">
            <h2><i class="fa fa-home"></i>Projects Dashboard <span>Meter Create</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">Add meter</li>
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
                                Create Meter
                            </h4>
                        </div>
                        <div class="panel-body no-padding">
                            <form class="form-horizontal form-bordered" action="{{route('meter.store')}}"
                                  role="form" id="sample-validation-2" method="post">
                                {{csrf_field()}}
                                @include('admin.meter-management.partials.form')
                                <input type="hidden" name="viewType" value="true" >
                                <div class="col-lg-12">
                                    <button type="submit" id="meterFormSubmit" class="btn btn-theme">Save Meter</button>
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

    <script>
        $(document).ready(function () {

        });
    </script>

@endsection