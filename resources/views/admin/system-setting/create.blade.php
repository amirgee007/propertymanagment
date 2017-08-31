@extends('admin.layouts.base')

@section('title')
    Add System Setting
    @parent
@stop

@section('header_styles')
    <link href="/admin/assets/global/plugins/bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet">

@endsection

@section('content')
    <section id="page-content">
        <div class="header-content">
            <h2><i class="fa fa-home"></i>Projects Dashboard <span>System Setting</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">Add System Setting</li>
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
                                                <h3 class="panel-title">System Setting <small>Add New Here</small></h3>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="panel-body no-padding">
                                            <form class="form-horizontal form-bordered" method="post" role="form" action="{{route('system-setting.edit')}}">
                                                <div class="form-body">
                                                    {{csrf_field()}}
                                                <div class="form-group">
                                                        <label for="tax" class="col-sm-5 text-right">Tax</label>
                                                        <div class="col-sm-7">
                                                            <input id="tax" type="checkbox" class="switch" name="tax"  data-on-text="ON" value="1" @if(isset($systemSetting) ? $systemSetting->tax==1 : false)checked @endif data-off-text="OFF" data-on-color="teal">
                                                        </div>
                                                    </div>
                                                <div class="form-group">
                                                    <label for="interest" class="col-sm-5 text-right">Interest</label>
                                                    <div class="col-sm-7">
                                                        <input id="interest" type="checkbox" class="switch" name="interest" value="1" @if(isset($systemSetting) ? $systemSetting->interest==1 : false)checked @endif data-on-text="ON" data-off-text="OFF" data-on-color="teal">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="client-access" class="col-sm-5 text-right">Client Access</label>
                                                    <div class="col-sm-7">
                                                        <input id="client-access" type="checkbox" value="1" @if(isset($systemSetting) ? $systemSetting->client_access==1 : false)checked @endif class="switch" name="client_access" data-on-text="ON" data-off-text="OFF" data-on-color="teal">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="utility-module" class="col-sm-5 text-right">Utility Module</label>
                                                    <div class="col-sm-7">
                                                        <input id="utility-module" type="checkbox" class="switch" name="utility_module" value="1" @if(isset($systemSetting) ? $systemSetting->utility_module==1 : false)checked @endif data-on-text="ON" data-off-text="OFF" data-on-color="teal">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="sinking-funds-module" class="col-sm-5 text-right">Sinking Funds Module</label>
                                                    <div class="col-sm-7">
                                                        <input id="sinking-funds-module" type="checkbox" class="switch" name="sinking_funds_module" value="1" @if(isset($systemSetting) ? $systemSetting->sinking_funds_module==1 : false)checked @endif data-on-text="ON" data-off-text="OFF" data-on-color="teal">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="car-parks-module" class="col-sm-5 text-right">Car Parks Module</label>
                                                    <div class="col-sm-7">
                                                        <input id="car-parks-module"   type="checkbox" class="switch" name="car_parks_module" value="1" @if(isset($systemSetting) ? $systemSetting->car_parks_module==1 : false)checked @endif data-on-text="ON" data-off-text="OFF" data-on-color="teal">
                                                    </div>
                                                </div>

                                                </div>
                                                <div class="form-footer">
                                                    <div class="col-sm-offset-3">
                                                        <button type="submit" class="btn btn-success">Save System Setting</button>
                                                    </div>
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
    <script src="/admin/assets/global/plugins/bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>

    <script>
        $(document).ready(function () {
            $(".switch").bootstrapSwitch();
            if($(".switch").val()==1){
                $(this).prop("checked")
            }
        });
    </script>

@endsection

