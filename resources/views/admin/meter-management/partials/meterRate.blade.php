<div class="col-md-12">
    <div class="panel rounded shadow">
        <div class="panel-heading" style="padding: 2%">
            <h4 class="no-margin">
                Meter Rates
            </h4>
        </div>
        <div class="panel-body no-padding">
            <div class="col-lg-12">
                <br>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>NO</th>
                            <th>Form</th>
                            <th>to</th>
                            <th>rate</th>
                            <th>ction</th>
                        </tr>
                        </thead>
                        <tbody id="meter-rate-tbody">
                        @forelse($meterRates as $meterRate)
                            <tr id="m-rate-{{$meterRate->id}}">
                                <td>{{$meterRate->id}}</td>
                                <td>{{$meterRate->from}}</td>
                                <td>{{$meterRate->to}}</td>
                                <td>{{$meterRate->rate}}</td>
                                <td>
                                    <button data-url="" class="btn btn-default">edit</button>
                                    <button data-url="{{route('meter.rate.delete' , [$meterRate->id])}}" class="btn btn-danger delete-meter-rate">delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">N/A</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.panel-body -->
</div><!-- /.panel -->