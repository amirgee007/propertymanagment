@extends('admin.layouts.base')

@section('title')
    Show Owner Profile
    @parent
@stop

@section('header_styles')
<style>

    form .form-group .control-label {
         font-weight: bold;
    }

</style>
@endsection

@section('content')
    <section id="page-content">
        <div class="header-content">
            <h2><i class="fa fa-home"></i>Projects Dashboard <span>Owner Management</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">Show Owner Profile</li>
                </ol>
            </div>
        </div>

        @include('flash::message')
        <div class="body-content animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel rounded shadow">
                        <div class="panel-body no-padding">
                            <form class="form-horizontal form-bordered" action="{{route('post.owner.store')}}"
                                  role="form" id="sample-validation-2" method="post">
                                <div class="form-body">
                                    <div class="form-group form-group-divider">
                                        <div class="form-inner">
                                            <h4 class="no-margin"><span
                                                        class="label label-success label-circle">1</span> General
                                                Information</h4>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Owner Id</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="{{$owner->owner_id or 'null'}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"><b>Owner Type</b></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="{{$owner->owner_type or 'null'}}" readonly>

                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Identity Card No. <span
                                                    class="asterisk"></span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="{{$owner->owner_id_card_no or 'null'}}" readonly>

                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Owner Name</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="{{$owner->owner_name or 'null'}}" readonly>

                                        </div>
                                    </div><!-- /.form-group -->


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Date of Birth</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="{{$owner->owner_dob or 'null'}}" readonly>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Gender</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="{{$owner->owner_gender}}" readonly>

                                        </div>
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Owner Address</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm"  readonly>

                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Phone 1</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm"  readonly>

                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Phone 2</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm"  readonly>

                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Created At</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="{{$owner->created_at->diffForHumans()}}" readonly>
                                        </div>
                                    </div>


                                    {{--//////////////////////////////////Comany Infomration//////////////////////////////////////////--}}
                                    @if($owner->is_company==1)

                                        <div class="form-group form-group-divider">
                                            <div class="form-inner">
                                                <h4 class="no-margin"><span
                                                            class="label label-danger label-circle">2</span>
                                                    Company Information</h4>
                                            </div>
                                        </div><!-- /.form-group -->

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Company Id</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control input-sm" value="{{$company->owner_id}}" readonly>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Company Name <span
                                                        class="asterisk"></span></label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control input-sm" value="{{$company->comp_name}}" readonly>

                                            </div>
                                        </div><!-- /.form-group -->

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Company Address</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control input-sm" value="{{$company->comp_address}}" readonly>

                                            </div>
                                        </div><!-- /.form-group -->


                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Company Registration Number</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control input-sm" value="{{$company->comp_reg_no}}" readonly>

                                            </div>
                                        </div><!-- /.form-group -->

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Company Telephone No.</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control input-sm" value="{{$company->comp_telephone_no}}" readonly>

                                            </div>
                                        </div><!-- /.form-group -->

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Company Fax No.</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control input-sm" value="{{$company->comp_fax_no}}" readonly>

                                            </div>
                                        </div><!-- /.form-group -->

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Contact Person</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control input-sm" value="{{$company->comp_contact_person}}" readonly>

                                            </div>
                                        </div><!-- /.form-group -->

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Contact</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control input-sm" value="{{$company->comp_contact_no}}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Created At</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control input-sm" value="{{$company->created_at->diffForHumans()}}" readonly>
                                            </div>
                                        </div>

                                        @endif
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

