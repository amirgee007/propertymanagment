@extends('admin.layouts.base')

@section('title')
    Edit Owner Profile
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
                                        </div>
                                    </a>
                                </li>
                                @if(! is_null($company))
                                    <li>
                                        <a href="#company-tab" data-toggle="tab">
                                            <i class="fa fa-building-o"></i>
                                            <div>
                                                <span class="text-strong">Company Tab</span>
                                            </div>
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <a href="#login-tab" data-toggle="tab">
                                        <i class="fa fa-file-text"></i>
                                        <div>
                                            <span class="text-strong">Login Tab</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#lot-tab" data-toggle="tab">
                                        <i class="fa fa-credit-card"></i>
                                        <div>
                                            <span class="text-strong">Lot Tab</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#carpark-tab" data-toggle="tab">
                                        <i class="fa fa-check-circle"></i>
                                        <div>
                                            <span class="text-strong">Carpark Tab</span>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#meter-tab" data-toggle="tab">
                                        <i class="fa fa-check-circle"></i>
                                        <div>
                                            <span class="text-strong">Meter Tab</span>
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
                                            <input type="hidden" name="is_company" value="{{ is_null($company) ? 0 : 1 }}" >

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
                                                <label class="col-sm-3 control-label">Email <span
                                                            class="asterisk">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="email" id="email" value="{{ $owner->email or 'null' }}" class="form-control input-sm"
                                                           name="email">
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
                                                    <textarea class="form-control input-sm" name="owner_address">{{$owner->owner_address or 'null'}}</textarea>
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
                                        </div>

                                        <div class="form-footer">
                                            <div class="col-sm-offset-3">
                                                <button type="submit" class="btn btn-theme">Save Owner</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                                @if(! is_null($company))
                                    <div class="tab-pane fade" id="company-tab">
                                        <h4>Company Tab</h4>
                                        @include('admin.owner-management.partials.edit_company')
                                    </div>
                                @endif

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
                                    <form class="form-horizontal form-bordered" action="{{route('post.owner.assign.lot')}}" role="form" id="owner-assign-lot" method="post">
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
                                                <label class="col-sm-3 control-label">Lot Type</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" name="lot_type_id" required>
                                                        <option value="">Choose type</option>
                                                        @foreach($lotType as $lotTp)
                                                            <option value="{{$lotTp->lot_type_id}}">{{$lotTp->lot_type_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Lot Name </label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" name="lot_id" required>
                                                        <option value="">Choose Name</option>
                                                        @foreach($lots as $lot)
                                                            <option value="{{$lot->lot_id}}">{{$lot->lot_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-footer">
                                            <div class="col-sm-offset-3">
                                                <button type="submit" class="btn btn-theme" id="assign-lot-btn">Save</button>
                                            </div>
                                        </div>
                                    </form>


                                    <div class="body-content animated fadeIn">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel rounded shadow no-overflow">
                                                    <div class="panel-heading">
                                                        <div class="pull-left">
                                                            <h3 class="panel-title">Owner Lots</h3>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="panel-body">
                                                        <br>
                                                        <div class="col-xs-12">
                                                            <table class="table table-responsive table-striped table-theme">
                                                                <thead>
                                                                <tr>
                                                                    <th># Id</th>
                                                                    <th>Lot Type Name</th>
                                                                    <th>Lot Name</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @forelse($ownedLots = \App\PropertyManagement\Helper::getOwnerLots($owner) as $ownedLot)
                                                                    <tr>
                                                                        <td>{{ $ownedLot->lot_id }}</td>
                                                                        <td>{{ @$ownedLot->lotType->lot_type_name }}</td>
                                                                        <td>{{ $ownedLot->lot_name }}</td>
                                                                    </tr>
                                                                @empty
                                                                    <tr>
                                                                        <td colspan="3" style="text-align: center">No lots found</td>
                                                                    </tr>
                                                                @endforelse
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="text-center">
                                                            {{ count($ownedLots) ? $ownedLots->links() : null }}
                                                        </div>
                                                    </div><!-- /.panel-body -->
                                                </div><!-- /.panel -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="carpark-tab">
                                    <h4>Car Park Data</h4>
                                    <form class="form-horizontal form-bordered" action="{{route('post.owner.assign.carpark')}}"
                                          role="form" id="owner-car-park" method="post">
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

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Location Area Text <span
                                                            class="asterisk">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" value="" class="form-control input-sm" name="loc_area_text"
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


                                    <div class="body-content animated fadeIn">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel rounded shadow no-overflow">
                                                    <div class="panel-heading">
                                                        <div class="pull-left">
                                                            <h3 class="panel-title">Owner Car Parks</h3>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="panel-body">
                                                        <br>
                                                        <div class="col-xs-12">
                                                            <table class="table table-responsive table-striped table-theme">
                                                                <thead>
                                                                <tr>
                                                                    <th># Id</th>
                                                                    <th>Car Park No.</th>
                                                                    <th>Area Text</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @forelse($carParks = \App\PropertyManagement\Helper::getOwnerCarParks($owner) as $carPark)
                                                                    <tr>
                                                                        <td>{{ $carPark->owner_car_park_id }}</td>
                                                                        <td>{{ $carPark->car_park_no }}</td>
                                                                        <td>{{ $carPark->loc_area_text }}</td>
                                                                    </tr>
                                                                @empty
                                                                    <tr>
                                                                        <td colspan="3" style="text-align: center">No car parks found</td>
                                                                    </tr>
                                                                @endforelse
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="text-center">
                                                            {{ count($carParks) ? $carParks->links() : null }}
                                                        </div>
                                                    </div><!-- /.panel-body -->
                                                </div><!-- /.panel -->
                                            </div>
                                        </div>
                                    </div>
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

                                    <div class="col-md-12">
                                        <div class="panel rounded shadow">
                                            <div class="panel-heading" style="padding: 2%">
                                                <h4 class="no-margin">
                                                    Owner Meters
                                                </h4>
                                            </div>
                                            <div class="panel-body no-padding">
                                                <div class="col-lg-12">
                                                    <br>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th>Meter Type</th>
                                                                <th>Lot Type</th>
                                                                <th>lot Name</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="meter-tbody">
                                                            @foreach($meters as $meter)

                                                                <tr id="assign-meter-tr-{{$meter->id}}">
                                                                    <td>{{ isset($meter->meterType) ? @$meter->meterType->meter_name : null }}</td>
                                                                    <td>{{ isset($meter->lot->lotType) ? @$meter->lot->lotType->lot_type_name : null }}</td>
                                                                    <td>{{ isset($meter->lot) ? @$meter->lot->lot_name: null}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /.panel-body -->
                                    </div><!-- /.panel -->

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
    <script>

        toastr.success("welcome to Edit Owner Page.", "Thanks");

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


            $('#owner-assign-lot').on('submit' , function (e) {

                e.preventDefault();
                form = $(this);
                var action = form.attr('action');
                $.ajax({
                    url: action,
                    data: form.serialize(),
                    headers: { 'X-XSRF-TOKEN' : '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}' },
                    error: function() {

                    },
                    success: function(response) {
                        if(response.status == 'saved'){
                            toastr.success("Lot Assigned to Owner" , "Asign Lot");
                            $("#owner-assign-lot").trigger('reset'); //jquery

                        }else{
                            toastr.error("Some Thing went wrong", "Not Saved");
                        }
                    },

                    type: 'POST'
                });

            });

            $('#owner-car-park').on('submit' , function (e) {

                e.preventDefault();
                form = $(this);
                var action = form.attr('action');
                $.ajax({
                    url: action,
                    data: form.serialize(),
                    headers: { 'X-XSRF-TOKEN' : '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}' },
                    error: function() {

                    },
                    success: function(response) {
                        if(response.status == 'saved'){
                            toastr.success("Car Park Assigned to Owner" , "Assign Car");
                            $("#owner-car-park").trigger('reset'); //jquery

                        }else{
                            toastr.error("Some Thing went wrong", "Not Saved");
                        }
                    },

                    type: 'POST'
                });

            });





        });

    </script>

@endsection

