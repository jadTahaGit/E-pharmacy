<?php require_once("header.php"); ?>
<?php
    if($vc == "false")
        die("<script>window.location.replace('index.php');</script>");
?>
  <script>
  $(document).ready(function(){
    $(".page-title").append("Categories");
    document.title = "Dashboard - Categories";
    $.ajax(
    {
        url:'../ajax/ViewCategories.php',
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
                        <th style="width: 80%;">Name</th>
                        <th style="width: 10%;">Edit</th>
                        <th style="width: 10%;">Delete</th>
                    </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Edit</th>
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
                    <div class="text-muted">Do you really want to delete this category?<br>All types linked to this category will be deleted.<br>All medicenes linked to these types will be deleted.<br> What you've done cannot be undone.</div>
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

        <!-- Modal Edit -->
        <div class="modal modal-blur fade" id="ModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category name" autocomplete="off">
                    </div>
                </div>
                <div id="btn_edit" class="modal-footer">
                    
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
                    <div class="text-muted">You don't have permission to edit or delete categories.</div>
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

        <div class="modal modal-blur fade" id="ModalEditSuccess" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-success"></div>
                <div class="modal-body text-center py-4">
                    <!-- Download SVG icon from http://tabler-icons.io/i/circle-check -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><path d="M9 12l2 2l4 -4" /></svg>
                    <h3>Edit succeeded</h3>
                    <div class="text-muted">Category Successfully Updated.</div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                    <div class="row">
                        <div class="col"><a href="#" class="btn btn-success w-100" data-bs-dismiss="modal">
                            Close
                        </a></div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
<?php require_once("footer.php"); ?>
<script>
    function edit(id,name)
    {
        $(document).ready(function(){
            document.getElementById("category_name").value = name;
            var modal = `
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button class="btn btn-primary ms-auto" onClick="goEdit(`+id+`)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg>
                        Edit
                    </button>
            `;
            $('#btn_edit').empty();
            $('#btn_edit').append(modal);
            $('#ModalEdit').modal("show");
        });
    }

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
            url:'../ajax/RemoveCategory.php',
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
    function goEdit(id)
    {
        var name = document.getElementById("category_name").value;
        $.ajax(
        {
            url:'../ajax/EditCategory.php',
            method:'POST',
            data:{
                id: id,
                name: name
            },
            success: function (strMessage)
            {
                if(strMessage == "success")
                {
                    var catname = "#catname_"+id;
                    $(catname).html(name);
                    $('#ModalEdit').modal("hide");
                    $('#ModalEditSuccess').modal("show");
                }
                else
                {
                    $('#ModalEdit').modal("hide");
                    $('#ModalAccessDenied').modal("show");
                }
            },
            dataType:'text'
        });
    }
</script>