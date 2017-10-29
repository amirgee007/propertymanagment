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
                <div class="table-responsive col-xs-12">
                    <table class="table table-striped table-theme" id="meter-reading-table">
                        <thead>
                        <tr>
                            <th>Meter Type</th>
                            <th>Meter ID</th>
                            <th>Lot Number</th>
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
                                <td>{{$meter->meterType->meter_name}}</td>
                                <td>{{$meter->id}}</td>
                                <td>{{is_null($meter->lot) ?:$meter->lot->lot_name}}</td>
                                <td class="las-dat-td-{{$meter->id}}">{{$meter->lastReadingDate()}}</td>
                                <td class="cur-re-td-{{$meter->id}}">{{$meter->currentReading()}}</td>
                                <td class="las-re-td-{{$meter->id}}">{{$meter->lastReading()}}</td>
                                <td class="las-usa-td-{{$meter->id}}">{{$meter->currentUsage()}}</td>
                                <td class="las-amo-td-{{$meter->id}}">{{$meter->currentAmount()}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">...
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="javascript:void(0)" data-meter-id="{{$meter->id}}" data-lot-id="{{$meter->lot_id}}" class="meterReadingM">Add Reading</a></li>
                                            <li class="{{$meter->currentReading() != "N/A"?:"disabled"}}"><a class="{{$meter->currentReading() != "N/A"?:"disabled-click"}}" href="{{route('meter.reading.generate-report' , [$meter->id])}}" target="_blank" disabled class="">Export Report</a></li>
                                        </ul>
                                    </div>
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
