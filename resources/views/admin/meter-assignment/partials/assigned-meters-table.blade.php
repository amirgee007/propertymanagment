<div class="col-md-12">
    <div class="panel rounded shadow">
        <div class="panel-heading" style="padding: 2%">
            <h4 class="no-margin">
                Assigned Meters

                <div class="pull-right">
                    <button type="button" class="btn btn-info" data-toggle="modal" onclick="document.getElementById('meter-assign-form').reset();" data-target="#assign-meter-modal">Assign New Meter</button>
                </div>
            </h4>
        </div>
        <div class="panel-body no-padding">
            <div class="col-lg-12">
                <br>
                <div class="table-responsive col-xs-12">
                    <table id="meter-assignment-table" class="table table-striped table-theme">
                        <thead>
                        <tr>
                            <th>Meter Type</th>
                            <th>Lot Type</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="meter-tbody">
                        @foreach($meters as $meter)
                            <tr id="assign-meter-tr-{{$meter->id}}">
                                <td>{{ $meter->meterType ? @$meter->meterType->meter_name : null }}</td>
                                <td>{{ $meter->lotType ? @$meter->lotType->lot_type_name : null }}</td>
                                <td>{{ $meter->quantity }}</td>
                                <td>
                                    <button data-url="{{route('meter.assignment.delete' , [$meter->id])}}" class="btn btn-danger meter-delete">Delete</button>
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