<?php require_once("header.php"); ?>
<script>
        $(document).ready(function(){
          //Ajax for lregister
          $("#btnsend").click(function(event){
            document.getElementById("err").style.display = "none";
            $('#err').empty();
            event.preventDefault();
              var name = document.f.name.value.trim();
              var email = document.f.email.value.trim();
              var telcode = document.f.telcode.value;
              var phone = document.f.phone.value;
              var message = document.f.message.value.trim();

              if(email == "" || name == "" || phone == "" || message == "")
              {
                document.getElementById("err").style.display = "initial";
                $("#err").append("All fields are required.");
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
                        document.getElementById("loader_pharmacy").style.display = "initial";
                        $.ajax(
                        {
                            url:'admin/ajax/SendMessage.php',
                            method:'POST',
                            data:{
                                    name: name,
                                    email: email,
                                    telcode: telcode,
                                    phone: phone,
                                    message: message
                                },
                            success: function (strMessage)
                            {
                                document.getElementById("loader_pharmacy").style.display = "none";
                                if(strMessage == "success")
                                {
                                    document.getElementById("succeeded").style.display = "initial";
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
                            <a class="list-group-item" href="forgetpassword.php">Forgotten Password</a>
                            <a class="list-group-item" onClick="goWishlist();">Favorites</a>
                            <a class="list-group-item" href="#">Contact us</a>
                            <a class="list-group-item" href="about.php">About us</a>
                            <a class="list-group-item" href="privacypolicy.php">Privacy Policy</a>
                            <a class="list-group-item" href="terms.php">Terms & Conditions</a>
                        </div>
                    </aside>
                    <div class="col-sm-9" id="content">            
                        <div class="breadcrumbs">
                            <a href="index.php"><i class="fa fa-home"></i></a>
                            <a href="#">Contact Us</a>
                        </div>
                        <div class="contentText">
                            <h1>Keep in touch</h1>
                            <div class="row">
                                <div style="border-left: 1px dashed #c1bebe" class="col-sm-12">
                                    <!--<div class="well">!-->
                                    <h2>Please fill this form and tell us how we can help</h2>
                                    <form name="f" enctype="multipart/form-data" method="post" role="form" class="form-horizontal add_margin">
                                        <div class="form-group">
                                            <label for="input-name" class="control-label col-sm-3"><b>Name</b> <span class="required-star">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="input-name" placeholder="Your Name" value="" name="name" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-email" class="control-label col-sm-3"><b>E-Mail Address</b> <span class="required-star">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="input-email" placeholder="E-Mail Address" value="" name="email" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                        <label for="input-telecode" class="col-sm-3 control-label"><b>Phone Number</b> <span class="required-star">*</span></label>
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
                                        <div class="col-sm-7">
                                            <input type="tel" class="form-control" id="input-telephone" placeholder="Telephone *" onkeydown="return ( event.ctrlKey || event.altKey 
                                            || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                                            || (95<event.keyCode && event.keyCode<106)
                                            || (event.keyCode==8) || (event.keyCode==9) 
                                            || (event.keyCode>34 && event.keyCode<40) 
                                            || (event.keyCode==46) )" maxlength="6" name="phone" autocomplete="off">
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <label for="input-name" class="control-label col-sm-3"><b>Message</b> <span class="required-star">*</span></label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="message" rows="5" placeholder="Your Message..."></textarea>
                                            </div>
                                        </div>
                                        <!--<input type="submit" value="Login" class="btn btn-primary reg_button" />!-->
                                        <div style="margin-bottom: 5px;display: none;" id="err" class="alert-danger error-field col-lg-12 col-sm-12">
                                        </div>
                                        <div style="margin-bottom: 5px;display: none;padding-top: 10px;padding-bottom: 10px;" id="succeeded" class="alert-success col-lg-12 col-sm-12">
                                            Message sent successfully.
                                        </div>
                                        <button class="btn btn-primary reg_button" id="btnsend" value="send" type="submit">
                                            <i class="fa fa-envelope"></i>&nbsp;
                                            Send Message
                                        </button>
                                    </form>
                                    <!--</div>!-->
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