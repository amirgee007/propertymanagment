<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Meter</h4>
            </div>
            <div class="modal-body" style="max-height: 800px !important;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel rounded shadow">
                            <div class="panel-body no-padding">
                                <form class="form-horizontal form-bordered" action="{{route('meter.store')}}"
                                      role="form" id="meter-form" method="post">
                                    {{csrf_field()}}
                                    @include('admin.meter-management.partials.sub-partials.meter-type-form')
                                </form>
                            </div><!-- /.panel-body -->
                        </div><!-- /.panel -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="meterFormSubmit" form="meter-form" class="btn btn-theme">Save Meter</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div id="delete-meterType" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-danger ">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="delete-modal-title">Meter Type Delete Confirmation</h4>
            </div>
            <div class="modal-body" id="delete-modal-body">
                <h5><strong> The record will be permanently removed from the system. Are you sure you want to delete? </strong></h5>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" id="delete-meter-btn" data-url="">Confirm</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div id="edit-meter-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Meter</h4>
            </div>
            <div class="modal-body" style="max-height: 800px !important;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel rounded shadow">
                            <div class="panel-body no-padding">
                                <form class="form-horizontal form-bordered"
                                      role="form" id="meter-type-edit-form" method="put">
                                    {{csrf_field()}}
                                    @include('admin.meter-management.partials.sub-partials.edit-meter-type')
                                </form>
                            </div><!-- /.panel-body -->
                        </div><!-- /.panel -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="meter-type-edit-submit" form="meter-type-edit-form" class="btn btn-theme">Save Meter</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="edit-meter-rate-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Meter Rate</h4>
            </div>
            <div class="modal-body" style="max-height: 800px !important;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel rounded shadow">
                            <div class="panel-body no-padding">
                                <form class="form-horizontal form-bordered" action=""
                                      role="form" id="meter-rate-edit-form" method="put">
                                    {{csrf_field()}}
                                    @include('admin.meter-management.partials.form')
                                </form>
                            </div><!-- /.panel-body -->
                        </div><!-- /.panel -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="meter-type-edit-submit" form="meter-rate-edit-form" class="btn btn-theme">Save Meter</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div id="create-meter-rate-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Meter Rate</h4>
            </div>
            <div class="modal-body" style="max-height: 800px !important;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel rounded shadow">
                            <div class="panel-body no-padding">
                                <form class="form-horizontal form-bordered" action="{{route('meter.rate.create')}}"
                                      role="form" id="meter-rate-create-form" method="post">
                                    {{csrf_field()}}

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Meter Type</label>
                                        <div class="col-sm-7">
                                            <select name="meter_type_id" id="meter_type_select_box" class="form-control">
                                                <option value="">Choose Meter Type</option>
                                                @foreach($meterTypes as $meterType )
                                                    <option value="{{$meterType->id}}">{{$meterType->meter_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @include('admin.meter-management.partials.sub-partials.meter-rate-form')
                                </form>
                            </div><!-- /.panel-body -->
                        </div><!-- /.panel -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="meter-type-create-submit" form="meter-rate-create-form" class="btn btn-theme">Save Meter</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>