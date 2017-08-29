<div class="row">
    <div class="col-md-12">
        <div class="panel rounded shadow">
            <div class="panel-body no-padding">
                <form id="add-payment-form" class="form-horizontal form-bordered" action="{{ route('invoices.record.payment') }}" role="form" method="post">
                    <div class="form-body">
                        {{ csrf_field() }}
                        <input type="hidden" id="invoice_id" name="invoice_id" class="hidden">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Payment Date<span
                                        class="asterisk">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control date" name="payment_date" id="payment_date" required>

                                <label for="date" class="error"></label>
                            </div>
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Amount<span
                                        class="asterisk">*</span></label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" name="amount" required>
                                <label for="amount" class="error"></label>
                            </div>
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Payment Method<span
                                        class="asterisk">*</span></label>
                            <div class="col-sm-7">
                                <select data-placeholder="Choose a method"
                                        class="form-control chosen-select mb-15" tabindex="2"
                                        name="method" required>
                                    <option value="">Choose a method</option>
                                    <option value="card">Credit Card</option>
                                </select>
                                <label for="method" class="error"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Payment Account<span
                                        class="asterisk">*</span></label>
                            <div class="col-sm-7">
                                <select data-placeholder="Choose an Account"
                                        class="form-control chosen-select mb-15" tabindex="2"
                                        name="owner_id" required>
                                    <option value="">Choose an Account</option>
                                    @foreach(\App\Models\Owner::all() as $owner)
                                        <option value="{{$owner->owner_id}}">{{$owner->owner_name}}</option>
                                    @endforeach
                                </select>
                                <label for="owner_id" class="error"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Notes</label>
                            <div class="col-sm-7">
                                <textarea class="form-control" name="notes" rows="5"></textarea>
                            </div>
                        </div><!-- /.form-group -->

                        <div class="form-footer">
                            <div class="col-sm-offset-3">
                                <button id="save-invoice" onClick="form_submit()" type="submit" class="btn btn-theme">Save Invoice</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- /.panel-body -->
        </div><!-- /.panel -->
    </div>
</div>