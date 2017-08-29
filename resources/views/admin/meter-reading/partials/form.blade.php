<div id="meter-reading-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Meter Reading</h4>
            </div>
            <div class="modal-body" style="max-height: 800px !important;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel rounded shadow">
                            <div class="panel-body no-padding">
                                <form class="form-horizontal form-bordered" action="{{route('meter.reading.store')}}"
                                      role="form" id="meter-reading-form" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="type" value="ajax">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Lot ID</label>
                                        <div class="col-sm-7">
                                            <input readonly class="form-control input-sm" id="lot-field-id" required name="lot_id">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Meter ID</label>
                                        <div class="col-sm-7">
                                            <input readonly class="form-control input-sm" id="meter-field-id" required name="meter_id">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Reading Date</label>
                                        <div class="col-sm-7">
                                            <input class="form-control input-sm" id="reading-date" required name="reading_date">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Current Reading</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control input-sm" value="" required name="last_reading">
                                        </div>
                                    </div>

                                </form>
                            </div><!-- /.panel-body -->
                        </div><!-- /.panel -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="meterReadingFormSubmit" form="meter-reading-form" class="btn btn-theme">Save Meter</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>