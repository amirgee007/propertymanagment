<div class="modal fade" id="send-invoice-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Send a Recipient</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                @include('admin.invoices.payment_partials.send_invoice_form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary reset-form" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>