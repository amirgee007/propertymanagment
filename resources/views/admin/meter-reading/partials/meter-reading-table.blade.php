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
                    <table class="table" id="meter-reading-table">
                        <thead>
                        <tr>
                            <th>Meter ID</th>
                            <th>Lot No</th>
                            <th>Last Reading Date</th>
                            <th>Current Readings</th>
                            <th>Previous Readings</th>
                            <th>Usage</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="meter-reading-tbody">
                        @foreach($meters as $meter)
                            <tr id="m-reading-{{$meter->id}}">
                                <td>{{$meter->id}}</td>
                                <td>{{$meter->lot_id}}</td>
                                <td id="las-re-d-td-{{$meter->id}}">{{!is_null($meter->meterReadings()->first())?$meter->meterReadings()->first()->last_reading_date:'N/A'}}</td>
                                <td id="las-re-td-{{$meter->id}}">{{!is_null($meter->meterReadings()->first())?$meter->meterReadings()->first()->last_reading:'N/A'}}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">...
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="javascript:void(0)" data-meter-id="{{$meter->id}}" data-lot-id="{{$meter->lot_id}}" class="meterReadingM">Add Reading</a></li>
                                            <li><a href="javascript:void(0)" class="">Export Report</a></li>
                                        </ul>
                                    </div>

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
