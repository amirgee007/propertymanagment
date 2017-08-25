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
                                    @include('admin.meter-management.partials.form')
                                </form>
                            </div><!-- /.panel-body -->
                        </div><!-- /.panel -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="meterFormSubmit" class="btn btn-theme">Save Meter</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div id="delete-meterType" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="delete-modal-title">Meter Type Delete Confirmation</h4>
            </div>
            <div class="modal-body" id="delete-modal-body">
                <h3><strong> Are You sure to Delete the meter Type </strong></h3>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" id="delete-meter-btn" data-url="">Confirm</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>