<form action="" class="form-inline">
    <div class="form-group">
        <select name="meter_type" id="meter_type" class="form-control input-sm">
            <option value="" >Choose Meter Type</option>
            @foreach($meterTypes as $meterType_id => $meterType_Name )
                <option value="{{$meterType_id}}"> {{$meterType_Name}} </option>
            @endforeach
        </select>
    </div><!-- /.form-group -->
    <div class="form-group">
            <input type="text" class="form-control input-sm" name="meter_rate[from]">
    </div>
    <div class="form-group">
            <input type="text" class="form-control input-sm" name="meter_rate[from]">
    </div>
</form>