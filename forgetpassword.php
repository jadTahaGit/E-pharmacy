<?php require_once("header.php"); ?>
<script>
        $(document).ready(function(){
          $("#btnsend").click(function(event){
            document.getElementById("err").style.display = "none";
            $('#err').empty();
            event.preventDefault();
              var email = document.f.email.value.trim();

              if(email == "")
              {
                document.getElementById("err").style.display = "initial";
                $("#err").append("Please enter your email address.");
              }
                else
                {
                    document.getElementById("loader_pharmacy").style.display = "initial";
                    $.ajax(
                    {
                        url:'admin/ajax/SendForgetVerificationCode.php',
                        method:'POST',
                        data:{
                                email: email
                            },
                        success: function (strMessage)
                        {
                            document.getElementById("loader_pharmacy").style.display = "none";
                            if(strMessage == "success")
                            {
                                document.getElementById("succeeded").style.display = "initial";
                                document.getElementById("input-email").disabled = true;
                                document.getElementById("btnsend").disabled = true;
                                document.getElementById("form-check").style.display = "initial";
                            }
                            else
                            {
                                document.getElementById("err").style.display = "initial";
                                $("#err").append(strMessage);
                            }
                        },
                        dataType:'text'
                    });
                }
            });

            $("#btncheck").click(function(event){
            document.getElementById("err-check").style.display = "none";
            $('#err-check').empty();
            event.preventDefault();
              var code = document.check.code.value.trim();
              var email = document.f.email.value.trim();

              if(code == "")
              {
                document.getElementById("err-check").style.display = "initial";
                $("#err-check").append("Please enter the verification code.");
              }
                else
                {
                    document.getElementById("loader_pharmacy").style.display = "initial";
                    $.ajax(
                    {
                        url:'admin/ajax/VerifyForgetCode.php',
                        method:'POST',
                        data:{
                                code: code,
                                email: email
                        },
                        success: function (strMessage)
                        {
                            document.getElementById("loader_pharmacy").style.display = "none";
                            if(strMessage == "success")
                            {
                                document.getElementById("succeeded-check").style.display = "initial";
                                document.getElementById("input-verify").disabled = true;
                                document.getElementById("btncheck").disabled = true;
                                document.getElementById("form-change").style.display = "initial";
                            }
                            else
                            {
                                document.getElementById("err-check").style.display = "initial";
                                $("#err-check").append(strMessage);
                            }
                        },
                        dataType:'text'
                    });
                }
            });
            
            $("#btnchange").click(function(event){
            document.getElementById("err-change").style.display = "none";
            $('#err-change').empty();
            event.preventDefault();
              var email = document.f.email.value.trim();
              var pass = document.change.pass.value;
              var conf = document.change.passconfirm.value;
              var regExpPass = /^(?=.*[0-9])(?=.*[!@#$%^&*?.])[a-zA-Z0-9!@#$%^&*?.]{8,}$/;

              if(!regExpPass.test(pass))
              {
                document.getElementById("err-change").style.display = "initial";
                $("#err-change").append("Password must be eight characters or longer.<br>Password must contain:<br> - At least 1 lowercase alphabetical character.<br> - At least 1 uppercase alphabetical character.<br> - At least 1 numeric character.<br> -  At least one special character.");
              }
              else
              {
                if(pass != conf)
                {
                    document.getElementById("err-change").style.display = "initial";
                    $("#err-change").append("Please enter the verification code.");
                }
                else
                {
                    document.getElementById("loader_pharmacy").style.display = "initial";
                    $.ajax(
                    {
                        url:'admin/ajax/ChangePassword.php',
                        method:'POST',
                        data:{
                                pass: pass,
                                email: email
                        },
                        success: function (strMessage)
                        {
                            document.getElementById("loader_pharmacy").style.display = "none";
                            if(strMessage == "success")
                            {
                                document.getElementById("succeeded-change").style.display = "initial";
                            }
                            else
                            {
                                document.getElementById("err-change").style.display = "initial";
                                $("#err-change").append(strMessage);
                            }
                        },
                        dataType:'text'
                    });
                }
              }
            });
          });
        </script>
        <div id="site_content">
            <div class="container">
                <div class="row"><aside class="col-sm-3 hidden-xs" id="column-left">
                        <div class="list-group">
                            <a class="list-group-item" href="login.php">Login</a> 
                            <a class="list-group-item" href="register.php">Register</a> 
                            <a class="list-group-item" href="#">Forgotten Password</a>
                            <a class="list-group-item" onClick="goWishlist();">Favorites</a>
                            <a class="list-group-item" href="contact.php">Contact us</a>
                            <a class="list-group-item" href="about.php">About us</a>
                            <a class="list-group-item" href="privacypolicy.php">Privacy Policy</a>
                            <a class="list-group-item" href="terms.php">Terms & Conditions</a>
                        </div>
                    </aside>
                    <div class="col-sm-9" id="content">            
                        <div class="breadcrumbs">
                            <a href="index.php"><i class="fa fa-home"></i></a>
                            <a href="#">Forget Password</a>
                        </div>
                        <div class="contentText">
                            <h1>Password Reset</h1>
                            <div class="row">
                                <div style="border-left: 1px dashed #c1bebe" class="col-sm-12">
                                    <!--<div class="well">!-->
                                    <h2>We will send a verification code to your email address</h2>
                                    <form name="f" enctype="multipart/form-data" method="post" role="form" class="form-horizontal add_margin">
                                        <div class="form-group">
                                            <label for="input-email" class="control-label col-sm-3"><b>E-Mail Address</b> <span class="required-star">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="input-email" placeholder="E-Mail Address" value="" name="email" autocomplete="off">
                                            </div>
                                        </div>
                                        <div style="margin-bottom: 5px;display: none;" id="err" class="alert-danger error-field col-lg-12 col-sm-12">
                                        </div>
                                        <div style="margin-bottom: 5px;display: none;padding-top: 10px;padding-bottom: 10px;" id="succeeded" class="alert-success col-lg-12 col-sm-12">
                                            Code sent successfully.
                                        </div>
                                        <button class="btn btn-primary reg_button" id="btnsend" value="send" type="submit">
                                            <i class="fa fa-envelope"></i>&nbsp;
                                            Send Verification Code
                                        </button>
                                    </form>
                                    <form name="check" id="form-check" style="display: none;" enctype="multipart/form-data" method="post" role="form" class="form-horizontal add_margin">
                                        <div class="form-group">
                                            <label for="input-verify" class="control-label col-sm-3"><b>Verification Code</b> <span class="required-star">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="input-verify" placeholder="Verification code" value="" name="code" autocomplete="off">
                                            </div>
                                        </div>
                                        <div style="margin-bottom: 5px;display: none;" id="err-check" class="alert-danger error-field col-lg-12 col-sm-12">
                                        </div>
                                        <div style="margin-bottom: 5px;display: none;padding-top: 10px;padding-bottom: 10px;" id="succeeded-check" class="alert-success col-lg-12 col-sm-12">
                                            Success.
                                        </div>
                                        <button class="btn btn-primary reg_button" id="btncheck" value="check" type="submit">
                                            <i class="fa fa-check"></i>&nbsp;
                                            Check Verification Code
                                        </button>
                                    </form>
                                    <form name="change" id="form-change" style="display: none;" enctype="multipart/form-data" method="post" role="form" class="form-horizontal add_margin">
                                        <div class="form-group">
                                            <label for="input-pass" class="control-label col-sm-3"><b>New Password</b> <span class="required-star">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" id="input-pass" placeholder="New Password" value="" name="pass" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-confirm" class="control-label col-sm-3"><b>Password Confirmation</b> <span class="required-star">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" id="input-confirm" placeholder="Password Confirmation" value="" name="passconfirm" autocomplete="off">
                                            </div>
                                        </div>
                                        <div style="margin-bottom: 5px;display: none;" id="err-change" class="alert-danger error-field col-lg-12 col-sm-12">
                                        </div>
                                        <div style="margin-bottom: 5px;display: none;padding-top: 10px;padding-bottom: 10px;" id="succeeded-change" class="alert-success col-lg-12 col-sm-12">
                                            Password successfully changed.
                                        </div>
                                        <button class="btn btn-primary reg_button" id="btnchange" value="change" type="submit">
                                            <i class="fa fa-check"></i>&nbsp;
                                            Change Password
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once("footer.php"); ?>

        <a style="display: none" href="javascript:void(0);" class="scrollTop back-to-top" id="back-to-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </body>
</html> 