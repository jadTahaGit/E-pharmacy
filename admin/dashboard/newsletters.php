<?php require_once("header.php"); ?>
<?php
    if($snl == "false")
        die("<script>window.location.replace('index.php');</script>");
?>
    <script>
    $(document).ready(function(){
        document.getElementById("err").style.display = "none";
        document.getElementById("success").style.display = "none";
        $(".page-title").append("Send News Letter");
        $("#btn_send").click(function(event){
          document.getElementById("err").style.display = "none";
          document.getElementById("success").style.display = "none";
          $('.text-muted-err').empty();
          event.preventDefault();
          var subject = document.f.subject.value;
          var body = document.f.body.value;

          if(subject == "" || body == "")
          {
            document.getElementById("err").style.display = "contents";
            $(".text-muted-err").append("Subject or body are empties.");
          }
          else
          {
            $.ajax(
            {
                url:'../ajax/SendNewsLetter.php',
                method:'POST',
                data:{
                    subject: subject,
                    body: body
                },
                success: function (strMessage)
                {
                    if(strMessage == "true")
                    {
                        document.getElementById("success").style.display = "contents";
                    }
                    else
                    {
                        if(strMessage == "nouser")
                        {
                            document.getElementById("err").style.display = "contents";
                            $(".text-muted-err").append("There are no users subscribed to the news letters.");
                        }
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
    <div class="page-body">
        <div class="container-xl">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Please note that this <b><i>Email</i></b> will be sent only to users subscribed to the <b><i>News Letters</i></b>.</h5>
                    </div>
                    <div class="table-responsive">
                        <form name="f">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <tr>
                                <th class="col-2">Email's Subject</th>
                                <td class="col-10"><input type="text" name="subject" class="form-control" placeholder="Email's Subject"></td>
                            </tr>
                            <tr>
                                <th class="col-2">Email's Body</th>
                                <td class="col-10"><textarea class="form-control" name="body" rows="8" placeholder="Email's body..."></textarea></td>
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
                                        <div class="text-muted">Email Successfully Sent.</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" colspan="2"><input type="button" name="btn_send" id="btn_send" class="btn btn-primary" value="Send Email"></td>
                            </tr>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once("footer.php"); ?>