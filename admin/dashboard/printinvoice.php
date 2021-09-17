<?php require_once("header.php"); ?>
<?php
    if($vo == "false")
        die("<script>window.location.replace('index.php');</script>");
    if($roo == "false")
        die("<script>window.location.replace('orders.php');</script>");
?>
<script>
    function MarkAsPurchased()
    {
      var queryString = window.location.search;
      var urlParams = new URLSearchParams(queryString);
      var id = urlParams.get('id');
      var amount = document.getElementById("total").innerHTML;
      
      $.ajax(
      {
        url:'../ajax/MarkAsPurchased.php',
        method:'POST',
        data:{
            id: id,
            amount: amount
        },
        success: function (data)
        {
          if(data == "success")
          {
            $('#ModalSuccess').modal("show");
          }
        },
        dataType: 'text'
      });
    }
    $(document).ready(function(){
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const id = urlParams.get('id');
        document.getElementById("invv-head").style.display = "none";
        document.getElementById("invv").style.display = "none";
        $.ajax(
        {
            url:'../ajax/GetInvoiceInfo.php',
            method:'POST',
            data:{
                id: id
            },
            success: function (data)
            {
                if(data.success == "true")
                {
                    var name = data.fn + " " + data.ln;
                    var client_info = data.address + "<br>" + data.city + "<br>" + data.phone + "<br>" + data.email;
                    var invoice_id = "Invoice INV/"+id;
                    document.getElementById("client_name").innerHTML = name;
                    document.getElementById("client_info").innerHTML = client_info;
                    document.getElementById("invoice_id").innerHTML = invoice_id;
                    $('#products_data').append(data.products_data);
                    document.getElementById("sub_total").innerHTML = data.sub_total;
                    document.getElementById("vat").innerHTML = data.vat;
                    document.getElementById("delivery").innerHTML = data.delivery;
                    document.getElementById("total").innerHTML = data.total;
                    document.getElementById("skeleton").style.display = "none";
                    document.getElementById("invv-head").style.display = "initial";
                    document.getElementById("invv").style.display = "initial";
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            },
            dataType:'JSON'
        });
    });
</script>
    <div class="page-wrapper">
        <div class="container-xl">
          <div id="skeleton" class="row row-cards"> 
            <div class="col-12">
              <div class="card">
                <div class="ratio ratio-21x9 card-img-top">
                  <div class="skeleton-image"></div>
                </div>
                <div class="card-body">
                  <div class="skeleton-heading"></div>
                  <div class="skeleton-line"></div>
                  <div class="skeleton-line"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- Page title -->
          <div id="invv-head" class="page-header d-print-none">
            <div class="row align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Invoice
                </h2>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">
                <button type="button" class="btn btn-success" onClick="MarkAsPurchased();"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
	              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 11 12 14 20 6" /><path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                  Mark as Purchased
                </button>
                <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
                  <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><rect x="7" y="13" width="10" height="8" rx="2" /></svg>
                  Print Invoice
                </button>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div id="invv" class="page-body">
        <div class="container-xl">
            <div class="card card-lg">
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <p class="h3">Smart Pharmacy</p>
                    <address>
                      Near to the universities neighborhood<br>
                      Lebanon, Saida<br>
                      07/123456<br>
                      info@smartpharmacy.com
                    </address>
                  </div>
                  <div class="col-6 text-end">
                    <p class="h3" id="client_name"></p>
                    <address id="client_info">
                    </address>
                  </div>
                  <div class="col-12 my-5">
                    <h1 id="invoice_id"></h1>
                  </div>
                </div>
                <table class="table table-transparent table-responsive">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 1%"></th>
                      <th>Product</th>
                      <th class="text-center" style="width: 1%">Qnt</th>
                      <th class="text-end" style="width: 1%">Unit</th>
                      <th class="text-end" style="width: 1%">Amount</th>
                    </tr>
                  </thead>
                  <tbody id="products_data">
                  
                  </tbody>
                  <tr>
                    <td colspan="4" class="strong text-end">Subtotal</td>
                    <td class="text-end" id="sub_total"></td>
                  </tr>
                  <tr>
                    <td colspan="4" class="strong text-end">Vat Rate</td>
                    <td class="text-end">10%</td>
                  </tr>
                  <tr>
                    <td colspan="4" class="strong text-end">Vat Due</td>
                    <td class="text-end" id="vat"></td>
                  </tr>
                  <tr>
                    <td colspan="4" class="strong text-end">Delivery</td>
                    <td class="text-end" id="delivery"></td>
                  </tr>
                  <tr>
                    <td colspan="4" class="font-weight-bold text-uppercase text-end">Total Due</td>
                    <td class="font-weight-bold text-end" id="total"></td>
                  </tr>
                </table>
                <p class="text-muted text-center mt-5">Thank you very much for trusting us. We look forward to serving you again!</p>
              </div>
            </div>
        </div>
    </div>
    
    <div class="modal modal-blur fade" id="ModalSuccess" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
          <div class="modal-content">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-status bg-success"></div>
          <div class="modal-body text-center py-4">
              <!-- Download SVG icon from http://tabler-icons.io/i/circle-check -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><path d="M9 12l2 2l4 -4" /></svg>
              <h3>Mark as purchased succeeded</h3>
              <div class="text-muted">This order has successfully marked as purchased.</div>
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