<label class="col-sm-3 control-label">Lot<span
            class="asterisk">*</span></label>
<div class="col-sm-7">
    <select data-placeholder="Choose a Lot" class="form-control chosen-select" name="lot_id" required>
        <option value="">Choose a Lot</option>
        @foreach($lots as $lot)
            <option value="{{ $lot->lot_id }}">{{ @$lot->lot->lot_name }}</option>
        @endforeach
    </select>
    <label for="lot_id" class="error"></label>
</div>


<script>
    $(".chosen-select").chosen();
</script>