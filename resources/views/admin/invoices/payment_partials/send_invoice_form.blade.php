<div class="row">
    <div class="col-md-12">
        <div class="panel rounded shadow">
            <div class="panel-body no-padding">
                <form id="send-invoice-form" class="form-horizontal form-bordered" action="{{ route('invoices.send.payment') }}" role="form" method="post">
                    <div class="form-body">
                        {{ csrf_field() }}
                        <input type="hidden" id="invoice_id" name="invoice_id" class="hidden">
                        <input type="hidden" id="payment_id" name="payment_id" class="hidden">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">From:</label>
                            <div class="col-sm-7">
                                <input type="hidden" id="from_email" name="from_email" class="hidden">
                                <p style="margin-top: 3px;" id="from_email_p"></p>
                            </div>
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label class="col-sm-3 control-label">To:<span
                                        class="asterisk">*</span></label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" name="email_to" required>
                                <label for="email_to" class="error"></label>
                            </div>
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Subject:</label>
                            <div class="col-sm-7">
                                <p style="margin-top: 3px;" id="subject"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Message:</label>
                            <div class="col-sm-7">
                                <textarea class="form-control" name="message" rows="10"></textarea>
                            </div>
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Delivery:</label>
                            <div class="col-sm-7">
                                <div class="checkbox">
                                    <label style="margin-top: 3px;">
                                        <input type="checkbox" name="delivery" value="1">
                                        <span id="delivery_text"></span>
                                    </label>
                                </div>
                            </div>
                        </div><!-- /.form-group -->

                        <div class="form-footer">
                            <div class="col-sm-offset-3">
                                <button id="send-invoice" type="submit" class="btn btn-theme">Send Invoice</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- /.panel-body -->
        </div><!-- /.panel -->
    </div>
</div>