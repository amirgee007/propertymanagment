@extends('admin.layouts.base')

@section('title')
    Assign Lot to Owner
    @parent
@stop

@section('header_styles')
    <link href="/admin/assets/global/plugins/bower_components/bootstrap-datepicker-vitalets/css/datepicker.css"
          rel="stylesheet">
    <link href="/admin/assets/global/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css"
          rel="stylesheet">

@endsection

@section('content')
    <section id="page-content">
        <div class="header-content">
            <h2><i class="fa fa-home"></i>Projects Dashboard <span>Owner Management</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">Assign Lot</li>
                </ol>
            </div>
        </div>

        @include('flash::message')
        <div class="body-content animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel rounded shadow">
                        <div class="panel-body no-padding">
                            <form class="form-horizontal form-bordered" action="#"
                                  role="form" id="sample-validation-2" method="post">
                                <div class="form-body">
                                    <div class="form-group form-group-divider">
                                        <div class="form-inner">
                                            <h4 class="no-margin"><span
                                                        class="label label-success label-circle">1</span> General
                                                Information of Lot</h4>
                                        </div>
                                    </div>
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Owner Type</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="owner_type">
                                                <option value="">Choose type</option>
                                                <option value="individual">Individual</option>
                                                <option value="combined">Combined</option>
                                                <option value="company">Company</option>
                                            </select>
                                            <label for="sv2_state" class="error"></label>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Identity Card No. <span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" name="owner_id_card_no"
                                                   required>
                                        </div>
                                    </div><!-- /.form-group -->

                                <div class="form-footer">
                                    <div class="col-sm-offset-3">
                                        <button type="submit" class="btn btn-theme">Assign Lot</button>
                                    </div>
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
    <!-- START @PAGE LEVEL PLUGINS -->
    <script src="/admin/assets/global/plugins/bower_components/bootstrap-datepicker-vitalets/js/bootstrap-datepicker.js"></script>
    <script src="/admin/assets/global/plugins/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <script src="/admin/assets/global/plugins/bower_components/moment/min/moment.min.js"></script>
    <script src="/admin/assets/global/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script>

        function toggle(className, obj) {
            var $input = $(obj);
            if ($input.prop('checked')) {
                $(className).show();
                $("#company_name").attr('required', true);
            }
            else {
                $(className).hide();
                $("#company_name").attr('required', false);
            }
        }


        $(document).ready(function () {

            $('#dp1').datepicker({
                format: 'dd-mm-yyyy',
            }).on('changeDate', function (e) {
                $(this).datepicker('hide');
            });

        });

    </script>

@endsection

