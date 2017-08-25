<div class="col-lg-6">
    <div class="panel-heading">
        Meter Type
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Meter Name</label>
        <div class="col-sm-7">
            <input type="text" class="form-control input-sm" required name="meterType[meter_name]">
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
            <input type="text" class="form-control input-sm" readonly value="{{$randomNumber}}" name="meterType[meter_code]">
        </div>
    </div><!-- /.form-group -->


    <div class="form-group">
        <label class="col-sm-3 control-label">Minimum Charges</label>
        <div class="col-sm-7">
            <input type="number" class="form-control input-sm" required name="meterType[minimum_charges]">
        </div>
    </div><!-- /.form-group -->

    <div class="form-group">
        <label class="col-sm-3 control-label">is Taxable</label>
        <div class="col-sm-7">
            <div class="ckbox ckbox-theme rounded">
                <input id="checkbox-type-rounded1" type="checkbox" onclick="toggle('.tax-value', this)" >
                <label for="checkbox-type-rounded1"></label>
            </div>
        </div>
    </div><!-- /.form-group -->
    <div class="tax-value" style="display: none">
        <div class="form-group">
            <label class="col-sm-3 control-label">tax amount</label>
            <div class="col-sm-7">
                <input type="number" class="form-control input-sm" name="meterType[tax_amount]">
            </div>
        </div>
    </div>

</div>

<div class="col-lg-6">

    <div class="panel-heading">
        Meter Rate
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">From</label>
        <div class="col-sm-7">
            <input type="number" class="form-control input-sm" required name="meter_rate[from]">
        </div>
    </div><!-- /.form-group -->
    <div class="form-group">
        <label class="col-sm-3 control-label">To</label>
        <div class="col-sm-7">
            <input type="number" class="form-control input-sm" required name="meter_rate[to]">
        </div>
    </div><!-- /.form-group -->
    <div class="form-group">
        <label class="col-sm-3 control-label">Rate</label>
        <div class="col-sm-7">
            <input type="number" class="form-control input-sm" required name="meter_rate[rate]">
        </div>
    </div><!-- /.form-group -->

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
