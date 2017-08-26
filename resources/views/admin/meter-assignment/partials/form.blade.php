<div class="form-group">
    <label class="col-sm-3 control-label">Meter Type</label>
    <div class="col-sm-7">
        <select name="meter_type_id" class="form-control input-sm">
            <option value="" >Choose type</option>
            @foreach($meterTypes as $meterType_id => $meterType_Name )
                <option
                        {{isset($assignMeter->meter_type_id)?($assignMeter->meter_type == $meterType_id)?'selected':'':''}}
                        value="{{$meterType_id}}">
                    {{$meterType_Name}}</option>
            @endforeach
        </select>
    </div>
</div><!-- /.form-group -->
<div class="form-group">
    <label class="col-sm-3 control-label">Lot Type</label>
    <div class="col-sm-7">
        <select name="lot_type_id" class="form-control">
            <option value="">Choose lot Type</option>
            @foreach($lotTypes as $lotType_id => $lotType_Name )
                <option
                        {{isset($assignMeter->lot_type_id)?($assignMeter->lot_type_id == $lotType_id)?'selected':'':''}}
                        value="{{$lotType_id}}">
                    {{$lotType_Name}}</option>
            @endforeach
        </select>
    </div>
</div><!-- /.form-group -->
<div class="form-group">
    <label class="col-sm-3 control-label">Quantity</label>
    <div class="col-sm-7">
        <input type="number" class="form-control input-sm" value="{{ $assignMeter->quantity ? $assignMeter->quantity : '' }}" required name="quantity">
    </div>
</div><!-- /.form-group -->