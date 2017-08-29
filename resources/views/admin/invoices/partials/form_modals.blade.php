<!-- Modal -->
<div class="modal fade" id="add-payment-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Record a Payment for this Invoice</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                @include('admin.invoices.partials.record_payment_form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary reset-form" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="delete-invoice-modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-danger">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p>Are you sure! you want to delete this Invoice ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="javascript:void(0);" class="btn btn-danger" id="delete-invoice">Delete</a>
            </div>
        </div>
    </div><!-- /.modal-dialog -->
</div>