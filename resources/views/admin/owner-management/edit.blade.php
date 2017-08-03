@extends('admin.layouts.base')

@section('title')
    Edit Owner Profile
    @parent
@stop

@section('header_styles')

    <!-- START @PAGE LEVEL STYLES -->
    <link href="/admin/assets/global/plugins/bower_components/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/admin/assets/global/plugins/bower_components/animate.css/animate.min.css" rel="stylesheet">
    {{--<link href="/admin/assets/commercial/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css" rel="stylesheet">--}}
    <!--/ END PAGE LEVEL STYLES -->

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
                    <li class="active">Edit Owner Profile</li>
                </ol>
            </div>
        </div>

        @include('flash::message')
        <div class="body-content animated fadeIn">

            <div class="row">
                <div class="col-md-12">

                    <!-- Start vertical tabs -->
                    <div class="panel panel-tab panel-tab-double panel-tab-vertical row no-margin mb-15 rounded shadow">
                        <!-- Start tabs heading -->
                        <div class="panel-heading no-padding col-lg-3 col-md-3 col-sm-3">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#profile-tab" data-toggle="tab">
                                        <i class="fa fa-user"></i>
                                        <div>
                                            <span class="text-strong">Profile Tab</span>
                                            <span>1</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#login-tab" data-toggle="tab">
                                        <i class="fa fa-file-text"></i>
                                        <div>
                                            <span class="text-strong">Login Tab</span>
                                            <span>2</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#lot-tab" data-toggle="tab">
                                        <i class="fa fa-credit-card"></i>
                                        <div>
                                            <span class="text-strong">Lot Tab</span>
                                            <span>3</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#carpark-tab" data-toggle="tab">
                                        <i class="fa fa-check-circle"></i>
                                        <div>
                                            <span class="text-strong">Carpark Tab</span>
                                            <span>4</span>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#meter-tab" data-toggle="tab">
                                        <i class="fa fa-check-circle"></i>
                                        <div>
                                            <span class="text-strong">Meter Tab</span>
                                            <span>5</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div><!-- /.panel-heading -->
                        <!--/ End tabs heading -->

                        <!-- Start tabs content -->
                        <div class="panel-body col-lg-9 col-md-9 col-sm-9">
                            <div class="tab-content">

                                <div class="tab-pane fade in active" id="profile-tab">
                                    <h4>Edit Profile here</h4>
                                    <form class="form-horizontal form-bordered" action="{{route('post.owner.update')}}"
                                          role="form" id="sample-validation-2" method="post">
                                        <div class="form-body">
                                            <div class="form-group form-group-divider">
                                                <div class="form-inner">
                                                    <h4 class="no-margin"><span
                                                                class="label label-success label-circle">1</span> General
                                                        Information</h4>
                                                </div>
                                            </div>
                                            {{csrf_field()}}

                                            <input type="hidden" name="owner_id" value="{{$owner->owner_id or 'null'}}" >
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Owner Type</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" name="owner_type">
                                                        <option value="">Choose type</option>
                                                        <option value="individual" {{$owner->owner_type=="individual"? "selected" : ""}}>Individual</option>
                                                        <option value="combined" {{$owner->owner_type=="combined"? "selected" : ""}}>Combined</option>
                                                        <option value="company" {{$owner->owner_type=="company"? "selected" : ""}}>Company</option>
                                                    </select>
                                                    <label for="sv2_state" class="error"></label>
                                                </div>
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Identity Card No. <span
                                                            class="asterisk">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" value="{{$owner->owner_id_card_no or 'null'}}" class="form-control input-sm" name="owner_id_card_no"
                                                           required>
                                                </div>
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Owner Name</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control input-sm" value="{{$owner->owner_name or 'null'}}" name="owner_name">
                                                </div>
                                            </div><!-- /.form-group -->


                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Date of Birth</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="owner_dob" value="{{$owner->owner_dob or 'null'}}" id="dp1">
                                                </div>
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Gender</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" name="owner_gender">
                                                        <option value="">Choose Gender</option>
                                                        <option value="male" {{$owner->owner_gender=="male"? "selected" : ""}}>Male</option>
                                                        <option value="female" {{$owner->owner_gender=="female"? "selected" : ""}}>FeMale</option>
                                                    </select>
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Owner Address</label>
                                                <div class="col-sm-7">
                                                    <input type="text" value="{{$owner->owner_address or 'null'}}" class="form-control input-sm" name="owner_address">
                                                </div>
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Phone 1</label>
                                                <div class="col-sm-7">
                                                    <input type="text" value="{{$owner->owner_phone1 or 'null'}}" class="form-control input-sm" name="owner_phone1">
                                                </div>
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Phone 2</label>
                                                <div class="col-sm-7">
                                                    <input type="text" value="{{$owner->owner_phone2 or 'null'}}" class="form-control input-sm" name="owner_phone2">
                                                </div>
                                            </div><!-- /.form-group -->


                                            {{--//////////////////////////////////Comany Infomration//////////////////////////////////////////--}}
                                            @if($owner->is_company)

                                                <div class="form-group form-group-divider">
                                                    <div class="form-inner">
                                                        <h4 class="no-margin"><span
                                                                    class="label label-danger label-circle">2</span>
                                                            Company Information</h4>
                                                    </div>
                                                </div><!-- /.form-group -->


                                                        <input type="hidden" name="company_id" value="{{$company->comp_id}}">

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Company Name <span
                                                                class="asterisk"></span></label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control input-sm" value="{{$company->comp_name}}" >

                                                    </div>
                                                </div><!-- /.form-group -->

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Company Address</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control input-sm" value="{{$company->comp_address}}" >

                                                    </div>
                                                </div><!-- /.form-group -->


                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Company Registration Number</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control input-sm" value="{{$company->comp_reg_no}}" >

                                                    </div>
                                                </div><!-- /.form-group -->

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Company Telephone No.</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control input-sm" value="{{$company->comp_telephone_no}}" >

                                                    </div>
                                                </div><!-- /.form-group -->

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Company Fax No.</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control input-sm" value="{{$company->comp_fax_no}}" >

                                                    </div>
                                                </div><!-- /.form-group -->

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Contact Person</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control input-sm" value="{{$company->comp_contact_person}}" >

                                                    </div>
                                                </div><!-- /.form-group -->

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Contact</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control input-sm" value="{{$company->comp_contact_no}}" >
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="form-footer">
                                            <div class="col-sm-offset-3">
                                                <button type="submit" class="btn btn-theme">Save Owner</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                                <div class="tab-pane fade" id="login-tab">
                                    <h4>Login Info</h4>
                                    <form class="form-horizontal form-bordered" action="{{route('post.owner.verify')}}"
                                          role="form" id="sample-validation-2" method="post">
                                        <div class="form-body">
                                            <div class="form-group form-group-divider">
                                                <div class="form-inner">
                                                    <h4 class="no-margin"><span
                                                                class="label label-success label-circle">1</span> Login
                                                        Information</h4>
                                                </div>
                                            </div>
                                            {{csrf_field()}}

                                            <input type="hidden" name="owner_id" value="{{$owner->owner_id or 'null'}}" >

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Email. <span
                                                            class="asterisk">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" value="{{\Auth::user()->email}}" class="form-control input-sm" name="email"
                                                           required>
                                                </div>
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Pssword. <span
                                                            class="asterisk">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="password" value="" class="form-control input-sm" name="password"
                                                           required>
                                                </div>
                                            </div><!-- /.form-group -->

                                        </div>

                                        <div class="form-footer">
                                            <div class="col-sm-offset-3">
                                                <button type="submit" class="btn btn-theme">Save Login Info</button>
                                            </div>
                                        </div>

                                    </form>

                                </div>

                                <div class="tab-pane fade" id="lot-tab">
                                    <h4>Lot Tab</h4>
                                    <form class="form-horizontal form-bordered" action="{{route('post.owner.assign.lot')}}"
                                          role="form" id="sample-validation-2" method="post">
                                        <div class="form-body">
                                            <div class="form-group form-group-divider">
                                                <div class="form-inner">
                                                    <h4 class="no-margin"><span
                                                                class="label label-success label-circle">1</span> Lot Information</h4>
                                                </div>
                                            </div>
                                            {{csrf_field()}}

                                            <input type="hidden" name="owner_id" value="{{$owner->owner_id or 'null'}}" >

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Lot Type </label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" name="owner_type">
                                                        <option value="">Choose type</option>
                                                        @foreach()
                                                        <option value="individual">Individual</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div><!-- /.form-group -->


                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Lot Type. <span
                                                            class="asterisk">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" value="" class="form-control input-sm" name="lot_type"
                                                           required>
                                                </div>
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Lot No. <span
                                                            class="asterisk">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" value="" class="form-control input-sm" name="lot_number"
                                                           required>
                                                </div>
                                            </div><!-- /.form-group -->

                                        </div>

                                        <div class="form-footer">
                                            <div class="col-sm-offset-3">
                                                <button type="submit" class="btn btn-theme">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="carpark-tab">
                                    <h4>Car Park Data</h4>
                                    <form class="form-horizontal form-bordered" action="{{route('post.owner.assign.carpark')}}"
                                          role="form" id="sample-validation-2" method="post">
                                        <div class="form-body">
                                            <div class="form-group form-group-divider">
                                                <div class="form-inner">
                                                    <h4 class="no-margin"><span
                                                                class="label label-success label-circle">1</span> Car Park
                                                        Information</h4>
                                                </div>
                                            </div>
                                            {{csrf_field()}}
                                            <input type="hidden" name="owner_id" value="{{$owner->owner_id or 'null'}}" >
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Carpark no <span
                                                                class="asterisk">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" value="" class="form-control input-sm" name="car_park_no"
                                                           required>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-footer">
                                            <div class="col-sm-offset-3">
                                                <button type="submit" class="btn btn-theme">Save Info</button>
                                            </div>
                                        </div>

                                    </form>

                                </div>

                                <div class="tab-pane fade" id="meter-tab">
                                    <h4>Meter Data</h4>
                                    <form class="form-horizontal form-bordered" action="{{route('post.owner.assign.carpark')}}"
                                          role="form" id="sample-validation-2" method="post">
                                        <div class="form-body">
                                            <div class="form-group form-group-divider">
                                                <div class="form-inner">
                                                    <h4 class="no-margin"><span
                                                                class="label label-success label-circle">1</span> Meter
                                                        Information</h4>
                                                </div>
                                            </div>
                                            {{csrf_field()}}
                                            <input type="hidden" name="owner_id" value="{{$owner->owner_id or 'null'}}" >

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Meter Type <span
                                                            class="asterisk">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" value="" class="form-control input-sm" name="meter_type"
                                                           required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Meter Id <span
                                                            class="asterisk">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" value="" class="form-control input-sm" name="meter_id"
                                                           required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Meter no <span
                                                            class="asterisk">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" value="" class="form-control input-sm" name="meter_no"
                                                           required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Lot no <span
                                                            class="asterisk">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" value="" class="form-control input-sm" name="lot_number"
                                                           required>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-footer">
                                            <div class="col-sm-offset-3">
                                                <button type="submit" class="btn btn-theme">Save Info</button>
                                            </div>
                                        </div>

                                    </form>

                                </div>


                            </div>
                        </div><!-- /.panel-body -->
                        <!--/ End tabs content -->
                    </div><!-- /.panel -->
                </div>
            </div><!-- /.row -->
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

