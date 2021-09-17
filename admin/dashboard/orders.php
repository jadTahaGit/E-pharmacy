<?php require_once("header.php"); ?>
<?php
    if($vo == "false")
        die("<script>window.location.replace('index.php');</script>");
?>
  <script>
  $(document).ready(function(){
    $(".page-title").append("Orders");
    document.title = "Dashboard - Orders";
    $.ajax(
    {
        url:'../ajax/ViewOrders.php',
        method:'POST',
        success: function (strMessage)
        {
            $('#tbody').append(strMessage);
            $('#datatable').DataTable({
                responsive: true,
                "order": [[ 0, "desc" ]],
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
                        <th style="width: 17.5%;">Date</th>
                        <th style="width: 15%;">Name</th>
                        <th style="width: 17.5%;">Email</th>
                        <th style="width: 15%;">Phone</th>
                        <th style="width: 15%;">City</th>
                        <th style="width: 10%;">Open</th>
                        <th style="width: 10%;">Delete</th>
                    </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
                <tfoot>
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Open</th>
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
                    <div class="text-muted">Do you really want to delete this Order?<br> What you've done cannot be undone.</div>
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
                    <div class="text-muted">You don't have permition to delete orders.</div>
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

        <!-- Modal Invoice -->
        <div class="modal modal-blur fade" id="ModalOrder" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label id="order_date" class="form-label"></label>
                    </div>
                    <div class="mb-3">
                        <label id="user_info" class="form-label"></label>
                    </div>
                    <div class="mb-3">
                        <label id="user_address" class="form-label"></label>
                    </div>
                    <div class="mb-3">
                        <label id="delivery_info" class="form-label"></label>
                    </div>
                    <div class="mb-3">
                        <label id="payment_info" class="form-label"></label>
                    </div>
                </div>
                <div id="btn_invoice" class="modal-footer">
                    
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
                    <div class="text-muted">Medicine Successfully Updated.</div>
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
            </div><!-- Modal Reply -->
        <div class="modal modal-blur fade" id="ModalReply" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reply By Email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Client Email Address</label>
                        <input type="text" disabled class="form-control" id="client_email" name="client_email" placeholder="Client email" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Subject</label>
                        <input type="text" class="form-control" id="email_subject" name="email_subject" placeholder="Email subject..." autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Body</label>
                        <textarea class="form-control" name="email_body" id="email_body" placeholder="Email body..." rows="8"></textarea>
                    </div>
                </div>
                <div id="btn_reply" class="modal-footer">
                    
                </div>
                </div>
            </div>
        </div>
        <div class="modal modal-blur fade" id="ModalReplySuccess" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-success"></div>
                <div class="modal-body text-center py-4">
                    <!-- Download SVG icon from http://tabler-icons.io/i/circle-check -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><path d="M9 12l2 2l4 -4" /></svg>
                    <h3>Email Sent!</h3>
                    <div class="text-muted">Your reply has been sent successfully to client.</div>
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
    function openinv(id,user_id,date,name,email,phone,sex,city,address,delivery_method,delivery_comment,payment_method,payment_comment)
    {
        $(document).ready(function(){
            document.getElementById("order_date").innerHTML = "<i>" + date + "</i>";
            document.getElementById("user_info").innerHTML = "<b>Name:</b>" + name + "<br><b>Email:</b> " + email + "<br><b>Phone:</b> " + phone + "<br><b>Sex:</b> " + sex;
            document.getElementById("user_address").innerHTML = "<b>City:</b> " + city + "<br><b>Address:</b> " + address;
            document.getElementById("delivery_info").innerHTML = "<b>Delivery Method:</b> " + delivery_method + "<br><b>Delivery Comment:</b> " + delivery_comment;
            document.getElementById("payment_info").innerHTML = "<b>Payment Method:</b> " + payment_method + "<br><b>Payment Comment:</b> " + payment_comment;
            var modal = `
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <a target="_blank" href="printinvoice.php?id=`+id+`" class="btn btn-primary ms-auto">
	                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><line x1="9" y1="7" x2="10" y2="7" /><line x1="9" y1="13" x2="15" y2="13" /><line x1="13" y1="17" x2="15" y2="17" /></svg>
                        Print Invoice
                    </a>
            `;
            $('#btn_invoice').empty();
            $('#btn_invoice').append(modal);
            $('#ModalOrder').modal("show");
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
            url:'../ajax/RemoveOrder.php',
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
        var name = document.getElementById("medecine_name").value;
        var description = document.getElementById("description").value;
        var price = document.getElementById("price").value;
        $.ajax(
        {
            url:'../ajax/EditMedecine.php',
            method:'POST',
            data:{
                id: id,
                name: name,
                description: description,
                price: price
            },
            success: function (strMessage)
            {
                if(strMessage == "success")
                {
                    var medname = "#medname_"+id;
                    $(medname).html(name);
                    $('#ModalEdit').modal("hide");
                    $('#ModalEditSuccess').modal("show");
                }
            },
            dataType:'text'
        });
    }

    function reply(email)
    {
        $(document).ready(function(){
            document.getElementById("client_email").value = email;
            var modal = `<button class="btn btn-primary w-100" onClick="goReply()">
                            Send Reply
                        </button>`;
            $('#btn_reply').empty();
            $('#btn_reply').append(modal);
            $('#ModalReply').modal("show");
        });
    }

    function goReply()
    {
        var email = document.getElementById("client_email").value;
        var subject = document.getElementById("email_subject").value;
        var body = document.getElementById("email_body").value;
        $.ajax(
        {
            url:'../ajax/SendReply.php',
            method:'POST',
            data:{
                email: email,
                subject: subject,
                body: body
            },
            success: function (strMessage)
            {
                if(strMessage == "true")
                {
                    document.getElementById("email_subject").value = "";
                    document.getElementById("email_body").value = "";
                    $('#ModalReply').modal("hide");
                    $('#ModalReplySuccess').modal("show");
                }
            },
            dataType:'text'
        });
    }
</script>