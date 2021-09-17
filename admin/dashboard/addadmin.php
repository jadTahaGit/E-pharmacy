<?php require_once("header.php"); ?>
<?php
    if($_COOKIE['idpharmacyadmin'] != "1")
       die("<script>window.location.replace('index.php');</script>");
?>
    <script>
    $(document).ready(function(){
        document.getElementById("err").style.display = "none";
        document.getElementById("success").style.display = "none";
        $(".page-title").append("Add New Admin");

        $("#btn_add").click(function(event){
          document.getElementById("err").style.display = "none";
          document.getElementById("success").style.display = "none";
          $('.text-muted-err').empty();
          event.preventDefault();
          var email = document.f.email.value;
          var password = document.f.password.value;
          var confirmation = document.f.confirmation.value;

          if(email == "" || password == "" || confirmation == "")
          {
            document.getElementById("err").style.display = "contents";
            $(".text-muted-err").append("All fields are required.");
          }
          else
          {
            if(password != confirmation)
            {
                document.getElementById("err").style.display = "contents";
                $(".text-muted-err").append("Password and confirmation are different.");
            }
            else
            {
                //privileges
                var vm = document.f.vm.checked;
                var vp = document.f.vp.checked;
                var anm = document.f.anm.checked;
                var anp = document.f.anp.checked;
                var edm = document.f.edm.checked;
                var edp = document.f.edp.checked;
                var vc = document.f.vc.checked;
                var anc = document.f.anc.checked;
                var edc = document.f.edc.checked;
                var vt = document.f.vt.checked;
                var ant = document.f.ant.checked;
                var edt = document.f.edt.checked;
                var vo = document.f.vo.checked;
                var roo = document.f.roo.checked;
                var vpr = document.f.vpr.checked;
                var rop = document.f.rop.checked;
                var vs = document.f.vs.checked;
                var esd = document.f.esd.checked;
                var vcm = document.f.vcm.checked;
                var rom = document.f.rom.checked;
                var vcl = document.f.vcl.checked;
                var dcl = document.f.dcl.checked;
                var vws = document.f.vws.checked;
                var ews = document.f.ews.checked;
                var snl = document.f.snl.checked;
                $.ajax(
                {
                    url:'../ajax/AddNewAdmin.php',
                    method:'POST',
                    data:{
                        email: email,
                        password: password,
                        token: csrf_token,
                        vm: vm,
                        vp: vp,
                        anm: anm,
                        anp: anp,
                        edm: edm,
                        edp: edp,
                        vc: vc,
                        anc: anc,
                        edc: edc,
                        vt: vt,
                        ant: ant,
                        edt: edt,
                        vo: vo,
                        roo: roo,
                        vpr: vpr,
                        rop: rop,
                        vs: vs,
                        esd: esd,
                        vcm: vcm,
                        rom: rom,
                        vcl: vcl,
                        dcl: dcl,
                        vws: vws,
                        ews: ews,
                        snl: snl
                    },
                    success: function (strMessage)
                    {
                        if(strMessage == "true")
                        {
                            document.getElementById("success").style.display = "contents";
                        }
                        else
                        {
                            document.getElementById("err").style.display = "contents";
                            $(".text-muted-err").append(strMessage);
                        }
                    },
                    dataType:'text'
                });
            }
          }
        });
    });
    </script>
    <div class="page-body">
        <div class="container-xl">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Please fill all informations</b></h3>
                    </div>
                    <div class="table-responsive">
                        <form name="f">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <tr>
                                <th class="col-2">Email Address</th>
                                <td colspan="3" class="col-10"><input type="email" name="email" class="form-control" placeholder="Enter Email Address"></td>
                            </tr>
                            <tr>
                                <th class="col-2">Password</th>
                                <td colspan="3" class="col-10"><input type="password" name="password" class="form-control" placeholder="Password">
                            </td>
                            </tr>
                            <tr>
                                <th class="col-2">Confirm Password</th>
                                <td colspan="3" class="col-10"><input type="password" name="confirmation" class="form-control" placeholder="Confirm Password"></td>
                            </tr>
                            <tr>
                                <th colspan="4" class="col-12"><h2>Privileges</h2></th>
                            </tr>
                            <tr>
                                <th style="text-align: center;" class="col-2">Medicines</th>
                                <td colspan="3" class="col-4">
                                    <label class="form-check form-switch">
                                        <input id="vm" name="vm" class="form-check-input" type="checkbox" checked>
                                        <span class="form-check-label">View Medicines</span>
                                    </label>
                                    <label class="form-check form-switch">
                                        <input name="vp" class="form-check-input" type="checkbox" checked>
                                        <span class="form-check-label">View Promotions</span>
                                    </label>
                                    <label class="form-check form-switch">
                                        <input name="anm" class="form-check-input" type="checkbox">
                                        <span class="form-check-label">Add New Medicine</span>
                                    </label>
                                    <label class="form-check form-switch">
                                        <input name="anp" class="form-check-input" type="checkbox">
                                        <span class="form-check-label">Add New Promotion</span>
                                    </label>
                                    <label class="form-check form-switch">
                                        <input name="edm" class="form-check-input" type="checkbox">
                                        <span class="form-check-label">Edit & Delete Medicines</span>
                                    </label>
                                    <label class="form-check form-switch">
                                        <input name="edp" class="form-check-input" type="checkbox">
                                        <span class="form-check-label">Edit & Delete Promotions</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th style="text-align: center;" class="col-2">Categories</th>
                                <td class="col-4">
                                    <label class="form-check form-switch">
                                        <input name="vc" class="form-check-input" type="checkbox" checked>
                                        <span class="form-check-label">View Categories</span>
                                    </label>
                                    <label class="form-check form-switch">
                                        <input name="anc" class="form-check-input" type="checkbox">
                                        <span class="form-check-label">Add New Categorie</span>
                                    </label>
                                    <label class="form-check form-switch">
                                        <input name="edc" class="form-check-input" type="checkbox">
                                        <span class="form-check-label">Edit & Delete Categorie</span>
                                    </label>
                                </td>
                                <th style="text-align: center;" class="col-2">Types</th>
                                <td class="col-4">
                                    <label class="form-check form-switch">
                                        <input name="vt" class="form-check-input" type="checkbox" checked>
                                        <span class="form-check-label">View Types</span>
                                    </label>
                                    <label class="form-check form-switch">
                                        <input name="ant" class="form-check-input" type="checkbox">
                                        <span class="form-check-label">Add New Type</span>
                                    </label>
                                    <label class="form-check form-switch">
                                        <input name="edt" class="form-check-input" type="checkbox">
                                        <span class="form-check-label">Edit & Delete Types</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th style="text-align: center;" class="col-2">Orders</th>
                                <td class="col-4">
                                    <label class="form-check form-switch">
                                        <input name="vo" class="form-check-input" type="checkbox" checked>
                                        <span class="form-check-label">View Orders</span>
                                    </label>
                                    <label class="form-check form-switch">
                                        <input name="roo" class="form-check-input" type="checkbox">
                                        <span class="form-check-label">Delete Orders</span>
                                    </label>
                                </td>
                                <th style="text-align: center;" class="col-2">Presciptions</th>
                                <td class="col-4">
                                    <label class="form-check form-switch">
                                        <input name="vpr" class="form-check-input" type="checkbox" checked>
                                        <span class="form-check-label">View Prescriptions</span>
                                    </label>
                                    <label class="form-check form-switch">
                                        <input name="rop" class="form-check-input" type="checkbox">
                                        <span class="form-check-label">Delete Prescription</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th style="text-align: center;" class="col-2">Stock</th>
                                <td class="col-4">
                                    <label class="form-check form-switch">
                                        <input name="vs" class="form-check-input" type="checkbox" checked>
                                        <span class="form-check-label">View Stock</span>
                                    </label>
                                    <label class="form-check form-switch">
                                        <input name="esd" class="form-check-input" type="checkbox">
                                        <span class="form-check-label">Edit Stock Data</span>
                                    </label>
                                </td>
                                <th style="text-align: center;" class="col-2">Contact Messages</th>
                                <td class="col-4">
                                    <label class="form-check form-switch">
                                        <input name="vcm" class="form-check-input" type="checkbox" checked>
                                        <span class="form-check-label">View Contact Messages</span>
                                    </label>
                                    <label class="form-check form-switch">
                                        <input name="rom" class="form-check-input" type="checkbox">
                                        <span class="form-check-label">Delete Contact Messages</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th style="text-align: center;" class="col-2">Clients</th>
                                <td class="col-4">
                                    <label class="form-check form-switch">
                                        <input name="vcl" class="form-check-input" type="checkbox" checked>
                                        <span class="form-check-label">View Clients</span>
                                    </label>
                                    <label class="form-check form-switch">
                                        <input name="dcl" class="form-check-input" type="checkbox">
                                        <span class="form-check-label">Delete Clients</span>
                                    </label>
                                </td>
                                <th style="text-align: center;" class="col-2">Settings</th>
                                <td class="col-4">
                                    <label class="form-check form-switch">
                                        <input name="vws" class="form-check-input" type="checkbox" checked>
                                        <span class="form-check-label">View Website Settings</span>
                                    </label>
                                    <label class="form-check form-switch">
                                        <input name="ews" class="form-check-input" type="checkbox">
                                        <span class="form-check-label">Edit Website Settings</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th style="text-align: center;" class="col-2">News Letters</th>
                                <td colspan="3" class="col-4">
                                    <label class="form-check form-switch">
                                        <input name="snl" class="form-check-input" type="checkbox" checked>
                                        <span class="form-check-label">Send News Letters</span>
                                    </label>
                                </td>
                            </tr>
                            <tr id="err">
                                <td colspan="4">
                                    <div class="alert alert-danger" role="alert">
                                        <h4 class="alert-title">Something went wrong...</h4>
                                        <div class="text-muted text-muted-err"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr id="success">
                                <td colspan="4">
                                    <div class="alert alert-success" role="alert">
                                        <h4 class="alert-title">Success</h4>
                                        <div class="text-muted">Admin Successfully Added</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" colspan="4"><input type="button" name="btn_add" id="btn_add" class="btn btn-primary" value="Add Admin"></td>
                            </tr>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once("footer.php"); ?>