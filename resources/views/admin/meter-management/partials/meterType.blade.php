<div class="col-md-12">
    <div class="panel rounded shadow">
        <div class="panel-heading" style="padding: 2%">
            <h4 class="no-margin">
                Meter Types

                <div class="pull-right">
                    <button type="button" class="btn btn-info" id="meter-type-modal-btn">Create New Meter</button>
                </div>
            </h4>
        </div>
        <div class="panel-body no-padding">
            <div class="col-lg-12">
                <br>
                <div class="table-responsive col-xs-12">
                    <table id="meter-type-table" class="table table-striped table-theme">
                        <thead>
                        <tr>
                            <th>Meter name</th>
                            <th>Meter Code</th>
                            <th>Minimum charges</th>
                            <th>Tax Rate</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="meter-type-tbody">
                        @foreach($meterTypes as $meterType)
                            <tr id="m-type-{{$meterType->id}}">
                                <td>{{$meterType->meter_name}}</td>
                                <td>{{$meterType->meter_code}}</td>
                                <td>{{$meterType->minimum_charges}}</td>
                                <td>{{!is_null($meterType->tax_amount)?$meterType->tax_amount:'N/A' }}</td>
                                <td>
                                    <button data-url="{{route('meter.type.edit' , [$meterType->id])}}" class="btn btn-default edit-meter-type">edit</button>
                                    <button data-url="{{route('meter.type.delete' , [$meterType->id])}}" class="btn btn-danger delete-meter-type">delete</button>
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