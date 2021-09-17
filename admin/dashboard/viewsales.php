<?php require_once("header.php"); ?>
<?php
    if($vp == "false")
        die("<script>window.location.replace('index.php');</script>");
?>
  <script>
  $(document).ready(function(){
    $(".page-title").append("Promotions");
    document.title = "Dashboard - Promotions";
    $.ajax(
    {
        url:'../ajax/ViewPromotions.php',
        method:'POST',
        success: function (strMessage)
        {
            $('#tbody').append(strMessage);
            $('#datatable').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'pageLength', 'excel', 'pdf', 'print'
                ],
                initComplete: function () {
                    var btns_excel = $('.buttons-excel');
                    btns_excel.addClass('btn btn-success');
                    btns_excel.removeClass('dt-button');
                    btns_excel.removeClass('buttons-html5');
                    btns_excel.removeClass('buttons-excel');

                    var btns_pdf = $('.buttons-pdf');
                    btns_pdf.addClass('btn btn-danger');
                    btns_pdf.removeClass('dt-button');
                    btns_pdf.removeClass('buttons-html5');
                    btns_pdf.removeClass('buttons-pdf');

                    var btns_print = $('.buttons-print');
                    btns_print.addClass('btn btn-primary');
                    btns_print.removeClass('dt-button');
                    btns_print.removeClass('buttons-html5');
                    btns_print.removeClass('buttons-print');

                    var btns_collection = $('.buttons-collection');
                    btns_collection.addClass('btn btn-dark');
                    btns_collection.removeClass('dt-button');
                    btns_collection.removeClass('buttons-html5');
                    btns_collection.removeClass('buttons-collection');
                }
            });
        },
        dataType:'text'
    });
  });
  </script>
        <div class="page-body">
          <div class="container-xl">
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 70%">Medicine</th>
                        <th style="width: 20%">New Price</th>
                        <th style="width: 10%;">Delete</th>
                    </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
                <tfoot>
                    <tr>
                        <th>Medicine</th>
                        <th>New Price</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
            </table>
          </div>
        </div>

        <!-- Modal Remove -->
        <div class="modal modal-blur fade" id="ModalRemove" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4">
                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
                    <h3>Are you sure?</h3>
                    <div class="text-muted">Do you really want to delete this Promotion?<br> What you've done cannot be undone.</div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col"><a href="#" class="btn btn-white w-100" data-bs-dismiss="modal">
                                Cancel
                            </a></div>
                            <div class="col" id="btn_delete">
                            
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <!-- Modal Access Denied -->
        <div class="modal modal-blur fade" id="ModalAccessDenied" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4">
                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
                    <h3>Action refused</h3>
                    <div class="text-muted">You don't have permission to delete promotions.</div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col"><a href="#" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                Cancel
                            </a></div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

<?php require_once("footer.php"); ?>
<script>

    function remove(id)
    {
        $(document).ready(function(){
            var modal = `<button class="btn btn-danger w-100" onClick="goDelete(`+id+`)">
                            Delete
                        </button>`;
            $('#btn_delete').empty();
            $('#btn_delete').append(modal);
            $('#ModalRemove').modal("show");
        });
    }
    function goDelete(id)
    {
        $.ajax(
        {
            url:'../ajax/RemovePromotion.php',
            method:'POST',
            data:{
                id: id
            },
            success: function (strMessage)
            {
                if(strMessage == "success")
                {
                    var row_id = "#row_"+id;
                    $(row_id).fadeOut();
                    $('#ModalRemove').modal("hide");
                }
                else
                {
                    $('#ModalRemove').modal("hide");
                    $('#ModalAccessDenied').modal("show");
                }
            },
            dataType:'text'
        });
    }
</script>