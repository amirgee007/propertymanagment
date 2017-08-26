<div class="col-md-12">
    <div class="panel rounded shadow">
        <div class="panel-heading" style="padding: 2%">
            <h4 class="no-margin">
                Meters Reading

                <div class="pull-right">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#assign-meter-modal">Create New Meter Reading</button>
                </div>
            </h4>
        </div>
        <div class="panel-body no-padding">
            <div class="col-lg-12">
                <br>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Meter id</th>
                            <th>Lot Number</th>
                            <th>Last Reading Date</th>
                            <th>Last Reading</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="meter-reading-tbody">
                        @foreach($meterReadings as $meterReading)
                            <tr id="m-reading-{{$meterReading->id}}">
                                <td> </td>
                                <td>{{$meterReading->meter_id}}</td>
                                <td>{{$meterReading->lot_no}}</td>
                                <td>{{$meterReading->last_reading_date}}</td>
                                <td>{{$meterReading->last_reading}}</td>
                                <td>
                                    <button class="btn btn-info">Add Reading</button>
                                    <button class="btn btn-primary">Export monthly meter Reading</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.panel-body -->
</div><!-- /.panel -->