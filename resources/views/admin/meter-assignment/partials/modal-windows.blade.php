<div id="assign-meter-modal" class="modal fade" role="dialog">
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
                                <form class="form-horizontal form-bordered" action="{{route('meter.assignment.store')}}"
                                      role="form" id="meter-assign-form" method="post">
                                    {{csrf_field()}}
                                    @include('admin.meter-assignment.partials.form')
                                </form>
                            </div><!-- /.panel-body -->
                        </div><!-- /.panel -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="meterFormSubmit" form="meter-assign-form" class="btn btn-theme">Save Meter</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div id="delete-assign-meter" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-danger " >
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="delete-modal-title">!Confirmation</h4>
            </div>
            <form class="form-horizontal form-bordered" action=""
                  role="form" id="meter-assign-delete-form" method="delete">
                {{csrf_field()}}
            </form>
            <div class="modal-body" id="delete-modal-body">
                <h5><strong> The record will be permanently removed from the system. Are you sure you want to delete? </strong></h5>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" form="meter-assign-delete-form" id="delete-meter-btn" data-url="">Confirm</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
