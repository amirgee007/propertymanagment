<div class="col-md-12">
    <div class="panel rounded shadow">
        <div class="panel-heading" style="padding: 2%">
            <h4 class="no-margin">
                Meter Types

                <div class="pull-right">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Create New Meter</button>
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
                            <th>Meter name</th>
                            <th>Meter Code</th>
                            <th>Minimum charges</th>
                            <th>Tax Amount</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="meter-type-tbody">
                        @forelse($meterTypes as $meterType)
                            <tr id="m-type-{{$meterType->id}}">
                                <td>{{$meterType->meter_name}}</td>
                                <td>{{$meterType->meter_code}}</td>
                                <td>{{$meterType->minimum_charges}}</td>
                                <td>{{!is_null($meterType->tax_amount)?$meterType->tax_amount:'N/As' }}</td>
                                <td>
                                    <button data-url="{{route('meter.type.edit' , [$meterType->id])}}" class="btn btn-default edit-meter-rate">edit</button>
                                    <button data-url="{{route('meter.type.delete' , [$meterType->id])}}" class="btn btn-danger delete-meter-rate">delete</button>
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