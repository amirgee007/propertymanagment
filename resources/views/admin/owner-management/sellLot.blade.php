@extends('admin.layouts.base')

@section('title')
    Sell Lot to Owner
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
                    <li class="active">Sell Lot</li>
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
                                        <label class="col-sm-3 control-label">Owner Name <span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <select class="form-control" id="owner_name" name="owner_name">
                                                <option value="Choose type">Choose type</option>
                                                @foreach($owners as $value)
                                                    <option value="{{$value->owner_id}}">{{$value->owner_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="col-lg-12 hidden" id="bills_table_div">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Owner</th>
                                                    <th>Lot Name</th>
                                                    <th>Invoice Amount</th>
                                                    <th>Invoice Charge Rate</th>
                                                    <th>Invoice Status</th>
                                                </tr>
                                                </thead>
                                                <tbody id="pending_bills">

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-lg-12"><br></div>
                                    </div>

                                    <div class="col-lg-12 hidden" id="form_div">
                                        <form class="form-horizontal form-bordered"
                                              action="{{route('post.owner.sell.to.others')}}"
                                              role="form" id="sample-validation-2" method="post">
                                            <div class="form-body">
                                                <div class="form-group form-group-divider">
                                                    <div class="form-inner">
                                                        <h4 class="no-margin"><span
                                                                    class="label label-success label-circle">1</span>
                                                            General
                                                            Information</h4>
                                                    </div>
                                                </div>
                                                {{csrf_field()}}
                                                <div class="form-group">
                                                    <input class="hidden" type="text" id="owner_id" name="old_owner_id">
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
                                                        <input type="text" class="form-control input-sm"
                                                               name="owner_id_card_no"
                                                               required>
                                                    </div>
                                                </div><!-- /.form-group -->

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Owner Name</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control input-sm"
                                                               name="owner_name">
                                                    </div>
                                                </div><!-- /.form-group -->


                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Date of Birth</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="owner_dob"
                                                               id="dp1">
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
                                                        <input type="text" class="form-control input-sm"
                                                               name="owner_address">
                                                    </div>
                                                </div><!-- /.form-group -->

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Phone 1</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control input-sm"
                                                               name="owner_phone1">
                                                    </div>
                                                </div><!-- /.form-group -->

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Phone 2</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control input-sm"
                                                               name="owner_phone2">
                                                    </div>
                                                </div><!-- /.form-group -->


                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Is Company</label>
                                                    <div class="col-sm-7">
                                                        <div class="ckbox ckbox-theme rounded">
                                                            <input id="checkbox-type-rounded1" type="checkbox"
                                                                   onclick="toggle('.company-Information', this)"
                                                                   name="is_company">
                                                            <label for="checkbox-type-rounded1"></label>
                                                        </div>
                                                    </div>
                                                </div><!-- /.form-group -->

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
                                                            <input type="text" id="comp_name"
                                                                   class="form-control input-sm"
                                                                   name="comp_name">
                                                        </div>
                                                    </div><!-- /.form-group -->

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Company Address</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm"
                                                                   name="comp_address">
                                                        </div>
                                                    </div><!-- /.form-group -->


                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Company Registration
                                                            Number</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm"
                                                                   name="comp_reg_no">
                                                        </div>
                                                    </div><!-- /.form-group -->

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Company Telephone
                                                            No.</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm"
                                                                   name="comp_telephone_no">
                                                        </div>
                                                    </div><!-- /.form-group -->

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Company Fax No.</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm"
                                                                   name="comp_fax_no">
                                                        </div>
                                                    </div><!-- /.form-group -->

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Contact Person</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm"
                                                                   name="comp_contact_person">
                                                        </div>
                                                    </div><!-- /.form-group -->

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Contact</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm"
                                                                   name="comp_contact_no">
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

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


        $("#owner_name").on('change', function () {
            var owner_id = $('#owner_name').val();
            if (owner_id !== 'Choose type') {
                var id_String = 'id=' + owner_id;
                $.ajax({
                    type: "GET",
                    url: '{{url("/dashboard/owner/check-owner-bills/ajaxCall")}}',
                    data: id_String,
                    headers: {'X-XSRF-TOKEN': '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}'},
                    cache: false,
                    success: function (data) {
                        if (data.owner_bills.length !== 0) {
                            $('#bills_table_div').removeClass('hidden');
                            $.each(data.owner_bills, function (i, val) {
                                $('#pending_bills').append(
                                    '<tr class="danger">' +
                                    '<td>' + val.invoice_id + '</td>' +
                                    '<td>' + val.owner.owner_name + '</td>' +
                                    '<td>' + val.lot.lot_name + '</td>' +
                                    '<td>' + val.invoice_amount + '</td>' +
                                    '<td>' + val.invoice_charge_rate + '</td>' +
                                    '<td><label class="label label-danger">' + val.invoice_status + '</label></td>' +
                                    '<tr>'
                                );
                            });
                            toastr.error("Please Check your unpaid bills!", "Sell Lot");
                        } else {
                            console.log(data);
                            $('#form_div').removeClass('hidden');
                            $('#owner_id').val($('#owner_name').val());
                            toastr.success("You have paid all bills!", "Sell Lot");
                        }
                    }
                });
            }
        });

        $('#owner_name').select2();

    </script>

@endsection

