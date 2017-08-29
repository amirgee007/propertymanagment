
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
                                    @include('admin.meter-rate.partials.form')
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
                                <form class="form-horizontal form-bordered" action=""
                                      role="form" id="meter-rate-create-form" method="post">
                                    {{csrf_field()}}
                                    @include('admin.meter-rate.partials.form')
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