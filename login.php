<?php require_once("header.php"); ?>
<script>
        $(document).ready(function(){
            $.ajax(
            {
                url:'admin/ajax/GetLoggedInStatus.php',
                method:'POST',
                success: function (strMessage)
                {
                    if(strMessage == "true")
                    {
                        location.replace("index.php");
                    }
                },
                dataType:'text'
            });
          //Ajax for lregister
          $("#btnlogin").click(function(event){
            document.getElementById("err").style.display = "none";
            $('#err').empty();
            event.preventDefault();
              var email = document.f.email.value;
              var password = document.f.password.value;

              if(email == "" || password == "")
              {
                document.getElementById("err").style.display = "initial";
                $("#err").append("Email or password fields are empty.");
              }
                else
                {
                    document.getElementById("loading").style.display = "initial";
                    $.ajax(
                    {
                        url:'admin/ajax/UserLogin.php',
                        method:'POST',
                        data:{
                                email: email,
                                password: password
                            },
                        success: function (strMessage)
                        {
                            document.getElementById("loading").style.display = "none";
                            if(strMessage == "success")
                            {
                                location.replace("index.php");
                            }
                            else
                            {
                                if(strMessage == "not verified")
                                {
                                    document.getElementById("input-email").disabled = true;
                                    document.getElementById("input-password").disabled = true;
                                    document.getElementById("form-verify").style.display = "block";
                                }
                                else
                                {
                                    document.getElementById("err").style.display = "initial";
                                    $("#err").append(strMessage);
                                }
                            }
                        },
                        dataType:'text'
                    });
                }
            });
            $('#btncheck').click(function(event){
                document.getElementById("err-check").style.display = "none";
                document.getElementById("resended").style.display = "none";
                $('#err-check').empty();
                event.preventDefault();

                var code = document.verify.code.value.trim();
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
                        url:'admin/ajax/VerifyNewAccountCode.php',
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
                                document.getElementById("succeeded-check").style.display = "block";
                                document.getElementById("input-verify").disabled = true;
                                document.getElementById("btncheck").disabled = true;
                                document.getElementById("btnresend").disabled = true;
                            }
                            else
                            {
                                document.getElementById("err-check").style.display = "block";
                                $("#err-check").append(strMessage);
                            }
                        },
                        dataType:'text'
                    });
                }
            });
            $('#btnresend').click(function(event){
                document.getElementById("err-check").style.display = "none";
                document.getElementById("resended").style.display = "none";
                $('#err-check').empty();
                event.preventDefault();
                var email = document.f.email.value.trim();

                document.getElementById("loader_pharmacy").style.display = "initial";
                $.ajax(
                {
                    url:'admin/ajax/ResendVerificationCode.php',
                    method:'POST',
                    data:{
                            email: email
                    },
                    success: function (strMessage)
                    {
                        document.getElementById("loader_pharmacy").style.display = "none";
                        document.getElementById("resended").style.display = "block";
                    },
                    dataType:'text'
                });
            });
          });
        </script>
        <div id="site_content">
            <div class="container">
                <div class="row"><aside class="col-sm-3 hidden-xs" id="column-left">
                        <div class="list-group">
                            <a class="list-group-item" href="#">Login</a> 
                            <a class="list-group-item" href="register.php">Register</a> 
                            <a class="list-group-item" href="forgetpassword.php">Forgotten Password</a>
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
                            <a href="#">Login</a>
                        </div>
                        <div class="contentText">
                            <h1>Welcome, Please Sign In</h1>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!--<div class="well">!-->
                                    <h2>New Customer</h2>
                                    <p>I am a new customer.</p>
                                    <p>By creating an account at Smart Pharmacy, you will be able to shop faster, be up to date on an orders status,
                                        and keep track of the orders you have previously made.</p>
                                    <a class="btn btn-primary reg_button" href="register.php">
                                        <i class="fa fa-caret-right"></i>&nbsp;
                                        Register
                                    </a>
                                    <!--</div>!-->
                                </div>
                                <div style="border-left: 1px dashed #c1bebe" class="col-sm-6">
                                    <!--<div class="well">!-->
                                    <h2>Returning Customer</h2>
                                    <p>I am a returning customer</p>
                                    <form name="f" enctype="multipart/form-data"  role="form" class="form-horizontal add_margin">
                                        <div class="form-group">
                                            <label for="input-email" class="control-label col-sm-4">E-Mail Address</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="input-email" placeholder="E-Mail Address" value="" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-password" class="control-label col-sm-4">Password</label>
                                            <div class="col-sm-8">
                                                <input type="password" class="form-control" id="input-password" placeholder="Password" value="" name="password">
                                            </div>
                                        </div>
                                        <p class="cat_name"> <a href="forgetpassword.php">Forgot Passowrd? Click here.</a></p>
                                        <div style="margin-bottom: 5px;" id="err" class="alert-danger error-field col-lg-12 col-sm-12">
                                        </div>
                                        <div style="margin-bottom: 5px;" id="loading" class="alert-success loading-field col-lg-12 col-sm-12">
                                            <h4 class="alert-heading">Loading...</h4>
                                        </div>
                                        <button class="btn btn-primary reg_button" id="btnlogin" value="Login" type="submit">
                                            <i class="fa fa-key"></i>&nbsp;
                                            Login                            
                                        </button>
                                    </form>
                                    <form id="form-verify" style="margin-top: 20px;display: none;" name="verify">
                                    <div class="form-group">
                                        <label class="control-label col-sm-12">Your email is not verified, you must verify your email before logging in.</label>
                                    </div>
                                        <div class="form-group" style="margin-top: 5px;margin-bottom: 5px;">
                                            <label for="input-verify" class="control-label col-sm-3"><b>Verification Code</b> <span class="required-star">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="input-verify" placeholder="Verification code" value="" name="code" autocomplete="off">
                                            </div>
                                        </div>
                                        <div style="margin-bottom: 5px;margin-top: 5px;display: none;" id="err-check" class="alert-danger error-field col-lg-12 col-sm-12">
                                        </div>
                                        <div style="margin-bottom: 2px;margin-top: 2px;display: block;background-color: #F5FFFA;" id="background-illusion" class="alert-danger error-field col-lg-12 col-sm-12">
                                        </div>
                                        <div style="margin-bottom: 5px;display: none;padding-top: 10px;padding-bottom: 10px;" id="succeeded-check" class="alert-success col-lg-12 col-sm-12">
                                            Success, you can login in to your account now, just click on the login button.
                                        </div>
                                        <div style="margin-bottom: 5px;display: none;padding-top: 10px;padding-bottom: 10px;" id="resended" class="alert-success col-lg-12 col-sm-12">
                                            Success, code resended successfully.
                                        </div>
                                        <button class="btn btn-primary reg_button" id="btncheck" value="check" type="submit">
                                            <i class="fa fa-check"></i>&nbsp;
                                            Check Verification Code
                                        </button>
                                        <button class="btn btn-primary reg_button" id="btnresend" value="check" type="submit">
                                            <i class="fa fa-code"></i>&nbsp;
                                            Resend Code
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