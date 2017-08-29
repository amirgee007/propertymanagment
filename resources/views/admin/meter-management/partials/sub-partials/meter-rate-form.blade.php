
<div class="form-group">
    <label class="col-sm-3 control-label">From</label>
    <div class="col-sm-7">
        <input type="number" class="form-control input-sm" value="{{isset($meterRate->from)?$meterRate->from:''}}" required name="from">
    </div>
</div><!-- /.form-group -->
<div class="form-group">
    <label class="col-sm-3 control-label">To</label>
    <div class="col-sm-7">
        <input type="number" class="form-control input-sm" value="{{isset($meterRate->to)?$meterRate->to:''}}" required name="to">
    </div>
</div><!-- /.form-group -->
<div class="form-group">
    <label class="col-sm-3 control-label">Rate</label>
    <div class="col-sm-7">
        <input type="number" step=0.001 class="form-control input-sm" value="{{isset($meterRate->rate)?$meterRate->rate:''}}" required name="rate">
    </div>
</div><!-- /.form-group -->
