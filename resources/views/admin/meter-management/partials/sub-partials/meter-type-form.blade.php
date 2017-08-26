<div class="panel-heading">
    Meter Type
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">Meter Name</label>
    <div class="col-sm-7">
        <input type="text" class="form-control input-sm" value="{{isset($meterType->meter_name)?$meterType->meter_name:''}}" required name="meterType[meter_name]">
    </div>
</div><!-- /.form-group -->
{{--<div class="form-group">--}}
{{--<label class="col-sm-3 control-label">Type</label>--}}
{{--<div class="col-sm-7">--}}
{{--<input type="text" class="form-control input-sm" name="type">--}}
{{--</div>--}}
{{--</div><!-- /.form-group -->--}}

<div class="form-group">
    <label class="col-sm-3 control-label">Meter Code</label>
    <div class="col-sm-7">
        <input type="text"
               class="form-control input-sm" readonly
               value="{{isset($meterType->meter_code)?$meterType->meter_code:$randomNumber}}"
               name="meterType[meter_code]">
    </div>
</div><!-- /.form-group -->

<div class="form-group">
    <label class="col-sm-3 control-label">Minimum Charges</label>
    <div class="col-sm-7">
        <input type="number" class="form-control input-sm" required
               value="{{isset($meterType->minimum_charges)?$meterType->minimum_charges:''}}"
               name="meterType[minimum_charges]">
    </div>
</div><!-- /.form-group -->

<div class="form-group">
    <label class="col-sm-3 control-label">is Taxable</label>
    <div class="col-sm-7">
        <div class="ckbox ckbox-theme rounded">
            <input id="checkbox-type-rounded1"
                   type="checkbox"
                   {{!isset($meterType->tax_amount)?:is_null($meterType->tax_amount)?:'checked="checked"'}}
                   onclick="toggle('.tax-value', this)" >
            <label for="checkbox-type-rounded1"></label>
        </div>
    </div>
</div><!-- /.form-group -->
<div class="tax-value"  style="{{!isset($meterType->tax_amount)?'display: none':is_null($meterType->tax_amount)?:''}}">
    <div class="form-group">
        <label class="col-sm-3 control-label">tax amount</label>
        <div class="col-sm-7">
            <input type="number" class="form-control input-sm" value="{{isset($meterType->tax_amount)?$meterType->tax_amount:''}}" name="meterType[tax_amount]">
        </div>
    </div>
</div>

<script>
    function toggle(className, obj) {
        var $input = $(obj);
        if ($input.prop('checked')) {
            $(className).show();
            $("#company_name").attr('required', true);
        }
        else {
            $(className).hide();
            $("#company_name").attr('required', false);
        }
    }
</script>