<div class="col-md-12">
    <div class="panel rounded shadow">
        <div class="panel-heading" style="padding: 2%">
            <h4 class="no-margin">
                Meters Reading
                <div class="pull-right">
                    <a href="{{route('meter.reading.create')}}" class="btn btn-info">Add Meter Reading</a>
                </div>
            </h4>
        </div>
        <div class="panel-body no-padding">
            <div class="col-lg-12" style="padding: 5px">
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
                        @foreach($meters as $meter)
                            <tr id="m-reading-{{$meter->id}}">
                                <td> </td>
                                <td>{{$meter->id}}</td>
                                <td>{{$meter->lot_id}}</td>
                                <td id="las-re-d-td-{{$meter->id}}">{{!is_null($meter->meterReadings()->first())?$meter->meterReadings()->first()->last_reading_date:'N/A'}}</td>
                                <td id="las-re-td-{{$meter->id}}">{{!is_null($meter->meterReadings()->first())?$meter->meterReadings()->first()->last_reading:'N/A'}}</td>
                                <td>
                                    <button data-meter-id="{{$meter->id}}" data-lot-id="{{$meter->lot_id}}" class="btn btn-info meterReadingM">Add Reading</button>
                                    <button class="btn btn-primary">Export monthly meter Reading</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="pull-right">
                    {{ $meters->links() }}
                </div>
            </div>

        </div>
    </div><!-- /.panel-body -->
</div><!-- /.panel -->
