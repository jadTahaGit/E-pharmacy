<?php require_once("header.php"); ?>
<?php
    if($vs == "false")
        die("<script>window.location.replace('index.php');</script>");
?>
    <script>
    $(document).ready(function(){
        $.ajax(
        {
            url:'../ajax/GetPrivacySettings.php',
            method:'POST',
            success: function (data)
            {
                if(data.success == "true")
                {
                    document.getElementById("limitation").value = data.limitation;
                    document.getElementById("privacy").value = data.privacy;
                }
                else
                {
                    document.getElementById("err").style.display = "contents";
                    $(".text-muted-err").append(data.success);
                }
            },
            dataType:'JSON'
        });

        document.getElementById("err").style.display = "none";
        document.getElementById("success").style.display = "none";
        $(".page-title").append("Privacy Policy Settings");
        $("#btn_update").click(function(event){
          document.getElementById("err").style.display = "none";
          document.getElementById("success").style.display = "none";
          $('.text-muted-err').empty();
          event.preventDefault();
          var limitation = document.f.limitation.value;
          var privacy = document.f.privacy.value;

          if(limitation == "" || privacy == "")
          {
            document.getElementById("err").style.display = "contents";
            $(".text-muted-err").append("All fields are required.");
          }
          else
          {
            $.ajax(
            {
                url:'../ajax/EditPrivacySettings.php',
                method:'POST',
                data:{
                    limitation: limitation,
                    privacy: privacy
                },
                success: function (strMessage)
                {
                    if(strMessage == "success")
                    {
                        document.getElementById("success").style.display = "contents";
                    }
                    else
                    {
                        if(strMessage == "denied")
                            $('#ModalAccessDenied').modal("show");
                        else
                        {
                            document.getElementById("err").style.display = "contents";
                            $(".text-muted-err").append(strMessage);
                        }
                    }
                },
                dataType:'text'
            });
          }
        });
    });
    </script>
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
                    <div class="text-muted">You don't have permission to edit settings.</div>
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
                                <th class="col-2">Limitation of Liability</th>
                                <td class="col-10"><textarea id="limitation" name="limitation" class="form-control" rows="8" placeholder="limitation..."></textarea></td>
                            </tr>
                            <tr>
                                <th class="col-2">Privacy Policy</th>
                                <td class="col-10"><textarea id="privacy" name="privacy" class="form-control" rows="8" placeholder="Privacy Policy..."></textarea></td>
                            </tr>
                            <tr id="err">
                                <td colspan="2">
                                    <div class="alert alert-danger" role="alert">
                                        <h4 class="alert-title">Something went wrong...</h4>
                                        <div class="text-muted text-muted-err"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr id="success">
                                <td colspan="2">
                                    <div class="alert alert-success" role="alert">
                                        <h4 class="alert-title">Success</h4>
                                        <div class="text-muted">Privacy Policy Informations Successfully Updated</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" colspan="2"><input type="button" name="btn_update" id="btn_update" class="btn btn-primary" value="Update Privacy Policy Informations"></td>
                            </tr>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once("footer.php"); ?>