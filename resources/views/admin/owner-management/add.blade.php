@extends('admin.layouts.base')

@section('title')
    Add Owner Profile
    @parent
@stop

@section('header_styles')

@endsection

@section('content')
    <section id="page-content">
        <div class="header-content">
            <h2><i class="fa fa-home"></i>Projects Dashboard <span>Owner Management</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">Add Owner Profile</li>
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

                                    <div class="ic-class form-group{{ $errors->has('owner_id_card_no') ? ' has-error' : '' }}">
                                        <label for="input_card_no" class="col-sm-3 control-label">Identity Card No. <span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input id="input_card_no" type="text" class="form-control input-sm" name="owner_id_card_no"
                                                   data-url="{{route('owner.add.card.check')}}" data-id="owner_id_card_no"
                                                   required>
                                            <span id="valid-card" hidden style="color: green; font-weight: 100;font-size:smaller ">IC is available</span>
                                            <span id="invalid-card" style="color: red; font-weight: 100;font-size:smaller">IC already exist</span>
                                            @if ($errors->has('owner_id_card_no'))
                                                <span class="help-block ic-validate">
                                                    <strong>{{ $errors->first('owner_id_card_no') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Owner Name</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" name="owner_name">
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="email form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label class="col-sm-3 control-label">Email <span class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="email" id="email" class="form-control input-sm"
                                                   data-url="{{route('owner.add.card.check')}}" data-id="email"
                                                   value="{{ old('email') }}"
                                                   name="email">
                                            <span id="valid-email" hidden style="color: green; font-weight: 100;font-size:smaller ">Email is available</span>
                                            <span id="invalid-email" style="color: red; font-weight: 100;font-size:smaller">Email already exist</span>
                                            @if ($errors->has('email'))
                                                <span class="help-block email-validate">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Date of Birth</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="owner_dob" id="dp1">
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Gender</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="owner_gender">
                                                <option value="">Choose Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Owner Address</label>
                                        <div class="col-sm-7">
                                            <textarea class="form-control input-sm" name="owner_address">{{ old('owner_address') }}</textarea>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Phone 1</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" name="owner_phone1">
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Phone 2</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" name="owner_phone2">
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Is Active</label>
                                        <div class="col-sm-7">
                                            <div class="ckbox ckbox-theme rounded">
                                                <input id="is_active" type="checkbox" name="is_active">
                                                <label for="is_active"></label>
                                            </div>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Is Company</label>
                                        <div class="col-sm-7">
                                            <div class="ckbox ckbox-theme rounded">
                                                <input id="checkbox-type-rounded1" type="checkbox" onclick="toggle('.company-Information', this)" name="is_company">
                                                <label for="checkbox-type-rounded1"></label>
                                            </div>
                                        </div>
                                    </div><!-- /.form-group -->

                                    {{--//////////////////////////////////Comany Infomration//////////////////////////////////////////--}}
                                    <div class="company-Information" style="display: none">
                                        <div class="form-group form-group-divider">
                                            <div class="form-inner">
                                                <h4 class="no-margin"><span
                                                            class="label label-danger label-circle">2</span>
                                                    Company Information</h4>
                                            </div>
                                        </div><!-- /.form-group -->

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Company Name <span
                                                        class="asterisk">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="text" id="comp_name" class="form-control input-sm"
                                                       name="comp_name">
                                            </div>
                                        </div><!-- /.form-group -->

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Company Address</label>
                                            <div class="col-sm-7">
                                                <textarea name="comp_address" class="form-control input-sm"></textarea>
                                            </div>
                                        </div><!-- /.form-group -->


                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Company Registration Number</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control input-sm" name="comp_reg_no">
                                            </div>
                                        </div><!-- /.form-group -->

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Company Telephone No.</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control input-sm" name="comp_telephone_no">
                                            </div>
                                        </div><!-- /.form-group -->

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Company Fax No.</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control input-sm" name="comp_fax_no">
                                            </div>
                                        </div><!-- /.form-group -->

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Contact Person</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control input-sm" name="comp_contact_person">
                                            </div>
                                        </div><!-- /.form-group -->

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Contact</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control input-sm" name="comp_contact_no">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-footer">
                                    <div class="col-sm-offset-3">
                                        <button type="submit" class="btn btn-theme">Save Owner</button>
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
    <script>
        $(function() {
            $("#input_card_no").keypress(function(){
                $('#valid-card').hide();
                $('#invalid-card').hide();
                $('.ic-validate').hide();
            });
            $("#email").keypress(function(){
                $('#valid-email').hide();
                $('#invalid-email').hide();
                $('.email-validate').hide();
            });

            $('#valid-card').hide();
            $('#invalid-card').hide();

            $('#valid-email').hide();
            $('#invalid-email').hide();
            $("#input_card_no").blur(function(){
                var url = $(this).data('url');
                var key = $(this).data('id');
                var value = $(this).val();
                var icClass = $('.ic-class');
                if (value === '') {
                    $('#valid-card').hide();
                    $('#invalid-card').hide();
                } else {
                    $.ajax({
                        url: url,
                        data:{
                            value:value,
                            key:key,
                        },
                        type: 'GET',
                        headers: {'X-XSRF-TOKEN': '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}'},
                        success: function(data){
                            if(data=='no_match'){
                                $('#invalid-card').hide();
                                $('#valid-card').show();
                                $('.ic-validate').hide();
                                $(icClass).removeClass('has-error');
                                $(icClass).addClass('has-success');
                            }if(data=='match'){
                                $('#valid-card').hide();
                                $('#invalid-card').show();
                                $('.ic-validate').show();
                                $(icClass).addClass('has-error');
                                $(icClass).removeClass('has-success');
                            }
                        }
                    });
                }
            });

            $("#email").blur(function(){
                var url = $(this).data('url');
                var key = $(this).data('id');
                var value = $(this).val();
                var emailClass = $('.email');
                if (value === '') {
                    $('#valid-email').hide();
                    $('#invalid-email').hide();
                } else {
                    $.ajax({
                        url: url,
                        data:{
                            value:value,
                            key:key,
                        },
                        type: 'GET',
                        headers: {'X-XSRF-TOKEN': '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}'},
                        success: function(data) {
                            if(data=='no_match') {
                                $('#invalid-email').hide();
                                $('#valid-email').show();
                                $('.email-validate').hide();
                                $(emailClass).removeClass('has-error');
                                $(emailClass).addClass('has-success');
                            }if(data=='match') {
                                $('#valid-email').hide();
                                $('#invalid-email').show();
                                $('.email-validate').show();
                                $(emailClass).addClass('has-error');
                                $(emailClass).removeClass('has-success');
                            }
                        }
                    });
                }
            });
        });

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

