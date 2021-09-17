<?php 
    require_once("header.php");
?>
    
  <script>
    function validationpasstrue()
    {
        document.getElementById("validationpass").style.display = "initial";
    }
    function validationpassfalse()
    {
        document.getElementById("validationpass").style.display = "none";
    }
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
          $("#btnregister").click(function(event){
            document.getElementById("err").style.display = "none";
            $('#err').empty();
            event.preventDefault();
              var fn = document.f.firstname.value.trim();
              var ln = document.f.lastname.value.trim();
              var email = document.f.email.value.trim();
              var telcode = document.f.telcode.value;
              var telephone = document.f.telephone.value;
              var sex = document.f.sex.value;
              var address = document.f.adr.value;
              var city = document.f.city.value;
              var password = document.f.password.value;
              var confirm = document.f.confirm.value;
              var subscribe = document.f.newsletter.value;
              var regExpPass = /^(?=.*[0-9])(?=.*[!@#$%^&*?.])[a-zA-Z0-9!@#$%^&*?.]{8,}$/;

              //debug
              //alert(fn + " " +ln + " " +email + " " +telephone + " " +password + " " +sex + " " +address + " " +city + " " +confirm)

              if(fn == "" || ln == "" || email == "" || telephone == "" || password == "" || sex == "" || address == "" || city == "" || confirm == "")
              {
                document.getElementById("err").style.display = "initial";
                $("#err").append("All Fields are required.");
              }
              else
              {
                if(email.indexOf("@")<=0 || email.indexOf(".")<=0)
                {
                    document.getElementById("err").style.display = "initial";
                    $("#err").append("Email should be like 'email@provider.com'.");
                }
                else
                {
                    if(document.getElementById("agree").checked == false)
                    {
                        document.getElementById("err").style.display = "initial";
                        $("#err").append("You should agree to the privacy policy.");
                    }
                    else
                    {
                        if(password != confirm)
                        {
                            document.getElementById("err").style.display = "initial";
                            $("#err").append("Password and confirmation should be identical.");
                        }
                        else
                        {
                            if(!regExpPass.test(password))
                            {
                                document.getElementById("err").style.display = "initial";
                                $("#err").append("Password must be eight characters or longer.<br>Password must contain:<br> - At least 1 lowercase alphabetical character.<br> - At least 1 uppercase alphabetical character.<br> - At least 1 numeric character.<br> -  At least one special character.");
                            }
                            else
                            {
                                document.getElementById("loading").style.display = "initial";
                                $.ajax(
                                {
                                    url:'admin/ajax/UserRegister.php',
                                    method:'POST',
                                    data:{
                                            fn: fn,
                                            ln: ln,
                                            email: email,
                                            telecode: telcode,
                                            telephone: telephone,
                                            sex: sex,
                                            adr: address,
                                            city: city,
                                            password: password,
                                            subscribe: subscribe
                                        },
                                    success: function (strMessage)
                                    {
                                        document.getElementById("loading").style.display = "none";
                                        if(strMessage == "success")
                                        {
                                            document.getElementById("btnregister").disabled = true;
                                            document.getElementById("input-firstname").readOnly = true;
                                            document.getElementById("input-lastname").readOnly = true;
                                            document.getElementById("input-email").readOnly = true;
                                            document.getElementById("input-telephone").readOnly = true;
                                            document.getElementById("input-sex").disabled = true;
                                            document.getElementById("input-telecode").disabled = true;
                                            document.getElementById("input-address").readOnly = true;
                                            document.getElementById("input-city").readOnly = true;
                                            document.getElementById("input-password").readOnly = true;
                                            document.getElementById("input-confirm").readOnly = true;
                                            //document.getElementById("success").style.display = "initial";
                                            document.getElementById("form-verify").style.display = "block";
                                        }
                                        else
                                        {
                                            document.getElementById("err").style.display = "initial";
                                            var loginlink = "<hr><p class='mb-0'><a href='login.php' style='font-weight: bold;text-decoration: underline;' class='alert-link'>Click here to login.</a></p>";
                                            $("#err").append(strMessage + loginlink);
                                        }
                                    },
                                    dataType:'text'
                                });
                            }
                        }
                    }
                }
              }
            });
            $('#btncheck').click(function(event){
                document.getElementById("err-check").style.display = "none";
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
                                document.getElementById("success").style.display = "block";
                                document.getElementById("form-verify").style.display = "none";
                                document.getElementById("input-verify").disabled = true;
                                document.getElementById("btncheck").disabled = true;
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
          });
        </script>
        <div id="site_content">
            <div class="container">
                <div class="row"><aside class="col-sm-3 hidden-xs" id="column-left">
                        <div class="list-group">
                            <a class="list-group-item" href="login.php">Login</a> 
                            <a class="list-group-item" href="#">Register</a> 
                            <a class="list-group-item" href="forgetpassword.php">Forgotten Password</a>
                            <a class="list-group-item" onClick="goWishlist();">Favorites</a>
                            <a class="list-group-item" href="contact.php">Contact us</a>
                            <a class="list-group-item" href="about.php">About us</a>
                            <a class="list-group-item" href="privacypolicy.php">Privacy Policy</a>
                            <a class="list-group-item" href="terms.php">Terms & Conditions</a>
                        </div>
                    </aside>
                    <div class="col-sm-9" id="content">            <div class="breadcrumbs">
                            <a href="index.php"><i class="fa fa-home"></i></a>
                            <a href="#">Register</a>
                        </div>
                        <h1>My Account Information</h1>
                        <p style="text-align: left;" class="cat_name"> <small><strong class="define_note"></strong></small>If you already have an account with us, please login at the 
                            <a href="login.php">login page</a>.</p>
                        <form name="f" class="form-horizontal">
                            <div class="contentText">  
                                <fieldset id="account">
                                    <h1>Your Personal Details</h1>
                                    <div style="display: none;" class="form-group required">
                                        <label class="col-sm-2 control-label">Customer Group</label>
                                        <div class="col-sm-10">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" checked="checked" value="1" name="customer_group_id">
                                                    Default</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-firstname" class="col-sm-2 control-label">First Name <span class="required-star">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" style="text-transform: capitalize;" class="form-control" id="input-firstname" placeholder="First Name *" name="firstname">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-lastname" class="col-sm-2 control-label">Last Name <span class="required-star">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" style="text-transform: capitalize;" class="form-control" id="input-lastname" placeholder="Last Name *" name="lastname">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-email" class="col-sm-2 control-label"><acronym title="(name@provider.com)">E-Mail <span class="required-star">*</span></acronym></label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="input-email" placeholder="E-Mail *" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-telecode" class="col-sm-2 control-label">Telephone <span class="required-star">*</span></label>
                                        <div class="col-sm-2">
                                            <select class="form-control" id="input-telecode" name="telcode">
                                                <option value="03">03</option>
                                                <option value="70">70</option>
                                                <option value="71">71</option>
                                                <option value="76">76</option>
                                                <option value="78">78</option>
                                                <option value="79">79</option>
                                                <option value="81">81</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="tel" class="form-control" id="input-telephone" placeholder="Telephone *" onkeydown="return ( event.ctrlKey || event.altKey 
                                            || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                                            || (95<event.keyCode && event.keyCode<106)
                                            || (event.keyCode==8) || (event.keyCode==9) 
                                            || (event.keyCode>34 && event.keyCode<40) 
                                            || (event.keyCode==46) )" maxlength="6" name="telephone">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-sex" class="col-sm-2 control-label">Sex <span class="required-star">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="input-sex" name="sex">
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset id="address">
                                    <h1>Your Address</h1>
                                    <div class="form-group required">
                                        <label for="input-address" class="col-sm-2 control-label">Full Address <span class="required-star">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" style="text-transform: capitalize;" class="form-control" id="input-address" placeholder="Full Address *" name="adr">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-city" class="col-sm-2 control-label">City <span class="required-star">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" style="text-transform: capitalize;" class="form-control" id="input-city" placeholder="City *" name="city">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <h1>Your Password</h1>
                                    <div class="form-group required">
                                        <label for="input-password" class="col-sm-2 control-label"><acronym title="Password must be eight characters or longer. Password must contain: - At least 1 lowercase alphabetical character. - At least 1 uppercase alphabetical character. - At least 1 numeric character. -  At least one special character.">Password <span class="required-star">*</span></acronym></label>
                                        <div class="col-sm-10">
                                            <input type="password" onFocus="validationpasstrue();" onBlur="validationpassfalse();" class="form-control" id="input-password" placeholder="Password *" name="password">
                                        </div>
                                    </div>
                                    <div style="display: none;" id="validationpass" class="form-group required">
                                        <label for="input-validate" style="color: #FF4136;background-color: #f8d7da;border-color: #f5c6cb;" class="col-sm-12 control-label">Password must be eight characters or longer.<br> Password must contain:<br> - At least 1 lowercase alphabetical character.<br> - At least 1 uppercase alphabetical character.<br> - At least 1 numeric character.<br> -  At least one special character.</label>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-confirm" class="col-sm-2 control-label">Password Confirm</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="input-confirm" placeholder="Password Confirm *" name="confirm">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <h1>Newsletter</h1>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Subscribe</label>
                                        <div class="col-sm-10">
                                            <label class="radio-inline">
                                                <input type="radio" value="1" name="newsletter">
                                                Yes</label>
                                            <label class="radio-inline">
                                                <input type="radio" checked="checked" value="0" name="newsletter">
                                                No</label>
                                        </div>
                                    </div>
                                </fieldset>
                                <div id="err" class="alert-danger error-field col-lg-12 col-sm-12">
                                </div>
                                <div id="loading" class="alert-success loading-field col-lg-12 col-sm-12">
                                    <h4 class="alert-heading">Loading...</h4>
                                </div>
                                <div id="success" class="alert-success loading-field col-lg-12 col-sm-12" role="alert">
                                    <h4 class="alert-heading">Well done!</h4>
                                    <p>Account created succesfully.</p>
                                    <hr>
                                    <p class="mb-0"><a href="login.php" style="font-weight: bold;text-decoration: underline;" class="alert-link">Click here to login.</a></p>
                                </div>
                                <div class="buttons">
                                    <div class="pull-right">I have read and agree to the <a class="agree" target="_blank" href="privacypolicy.php"><b>Privacy Policy</b></a>&nbsp;<input type="checkbox" value="1" id="agree" name="agree">
                                        &nbsp;
                                        <input type="submit" id="btnregister" class="btn btn-primary reg_button" value="Register" >
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form id="form-verify" style="margin-top: 70px;display: none;" name="verify">
                            <div class="form-group">
                                <label class="control-label col-sm-12">Verification code has been sent to your email address.</label>
                            </div>
                            <div class="form-group">
                                <label for="input-verify" class="control-label col-sm-3"><b>Verification Code</b> <span class="required-star">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="input-verify" placeholder="Verification code" value="" name="code" autocomplete="off">
                                </div>
                            </div>
                            <div style="margin-bottom: 5px;margin-top: 5px;display: none;" id="err-check" class="alert-danger error-field col-lg-12 col-sm-12">
                            </div>
                            <div style="margin-bottom: 5px;display: none;padding-top: 10px;padding-bottom: 10px;" id="succeeded-check" class="alert-success col-lg-12 col-sm-12">
                                Success.
                            </div>
                            <button class="btn btn-primary reg_button" id="btncheck" value="check" type="submit">
                                <i class="fa fa-check"></i>&nbsp;
                                Check Verification Code
                            </button>
                        </form>
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