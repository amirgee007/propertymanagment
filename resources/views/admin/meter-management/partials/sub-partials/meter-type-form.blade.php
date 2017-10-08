

<div class="form-group">
    <label class="col-sm-3 control-label">Meter Name</label>
    <div class="col-sm-7">
        <input type="text" id="form-meter-name" class="form-control input-sm" value="{{isset($meterType->meter_name)?$meterType->meter_name:''}}" required name="meterType[meter_name]">
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
               id="form-meter-code"
               class="form-control input-sm" readonly
               value=""
               name="meterType[meter_code]">
    </div>
</div><!-- /.form-group -->

<div class="form-group">
    <label class="col-sm-3 control-label">Minimum Charges</label>
    <div class="col-sm-7">
        <input type="number" class="form-control input-sm" required
               id="form-meter-min-charges"
               value="{{isset($meterType->minimum_charges)?$meterType->minimum_charges:''}}"
               name="meterType[minimum_charges]">
    </div>
</div><!-- /.form-group -->

<div class="form-group">
    <label class="col-sm-3 control-label">Is Taxable</label>
    <div class="col-sm-7">
        <div class="">
            <input id="checkbox-type-rounded1"
                   type="checkbox"
                   name="meterType[is_taxable]"
                   {{!isset($meterType->tax_amount)?:is_null($meterType->tax_amount)?:'checked="checked"'}}
                   onclick="toggle('.tax-value', this)" >
            <label for="checkbox-type-rounded1"></label>
        </div>
    </div>
</div><!-- /.form-group -->
<div class="tax-value"  style="{{!isset($meterType->tax_amount)?'display: none':is_null($meterType->tax_amount)?:''}}">
    <div class="form-group">
        <label class="col-sm-3 control-label">Tax amount</label>
        <div class="col-sm-7">
            <input type="text" id="form-meter-tax-amount" placeholder="Tax amount should be in percentage" class="form-control form-meter-tax input-sm" value="{{isset($meterType->tax_amount)?$meterType->tax_amount:''}}" name="meterType[tax_amount]">
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