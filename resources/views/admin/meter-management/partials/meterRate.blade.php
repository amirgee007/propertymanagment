<div class="col-md-12">
    <div class="panel rounded shadow">
        <div class="panel-heading" style="padding: 2%">
            <h4 class="no-margin">
                Meter Rates
                <div class="pull-right">
                    <button type="button" class="btn btn-info" id="meter-rate-modal-btn">Create New Meter Rate</button>
                </div>
            </h4>
        </div>
        <div class="panel-body no-padding">
            <div class="col-lg-12">
                <br>
                <div class="table-responsive">
                    <table id="meter-rate-table" class="table">
                        <thead>
                        <tr>
                            <th>Meter Type Name</th>
                            <th>Form</th>
                            <th>to</th>
                            <th>rate</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="meter-rate-tbody">
                        @foreach($meterRates as $meterRate)
                            <tr id="m-rate-{{$meterRate->id}}">
                                <td>{{$meterRate->meterType->meter_name}}</td>
                                <td>{{$meterRate->from}}</td>
                                <td>{{$meterRate->to}}</td>
                                <td>{{$meterRate->rate}}</td>
                                <td>
                                    <button data-url="{{route('meter.rate.edit' , [$meterRate->id])}}" class="btn btn-default edit-meter-rate">edit</button>
                                    <button data-url="{{route('meter.rate.delete' , [$meterRate->id])}}" class="btn btn-danger delete-meter-rate">delete</button>
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