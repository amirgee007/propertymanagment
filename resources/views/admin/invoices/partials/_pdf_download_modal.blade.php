<style>
    .btn-custom{
    font-size: medium;
    color: black;
    border: 1px solid;
    font-weight: 800;
    border-radius: 3px;
}
</style>
<!-- Modal -->
<div class="modal fade" id="pdfmodal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title" style="font-weight: 900;">Export To PDF</h3>
            </div>
            <div class="modal-body" style="background: ghostwhite;">
                <div style="position: relative; left: 44%">
                    <i class="fa fa-file-pdf-o" style="font-size: 70px"></i><br>
                </div>
                <center style="font-size: initial; padding-top: 8px;">Your invoice ready to be downloaded as a PDF</center>

            </div>
            <div id="pdf-download-footer" class="modal-footer" style="background:white;padding: -1px ; padding-right: 30px;">
                <a class="btn btn-custom" data-dismiss="modal">Close</a>
                <a id="pdf-download-link-btn" href="" class="btn btn-info" style="  font-weight: 700;border-radius: 3px; font-size: medium;">Download PDF</a>
            </div>
        </div>

    </div>
</div>