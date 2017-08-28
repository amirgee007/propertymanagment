<div class="form-group">
    <label class="col-sm-3 control-label">From</label>
    <div class="col-sm-7">
        <input type="number" class="form-control input-sm" value="{{isset($meterRate->from)?$meterRate->from:''}}" required name="meter_rate[from]">
    </div>
</div><!-- /.form-group -->
<div class="form-group">
    <label class="col-sm-3 control-label">To</label>
    <div class="col-sm-7">
        <input type="number" class="form-control input-sm" value="{{isset($meterRate->to)?$meterRate->to:''}}" required name="meter_rate[to]">
    </div>
</div><!-- /.form-group -->
<div class="form-group">
    <label class="col-sm-3 control-label">Rate</label>
    <div class="col-sm-7">
        <input type="number" class="form-control input-sm" value="{{isset($meterRate->rate)?$meterRate->rate:''}}" required name="meter_rate[rate]">
    </div>
</div><!-- /.form-group -->