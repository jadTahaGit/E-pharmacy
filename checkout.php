<?php require_once("header.php"); ?>
<script>
    $(document).ready(function(){
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
                    document.getElementById("loader_pharmacy").style.display = "initial";
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
                            document.getElementById("loader_pharmacy").style.display = "none";
                            if(strMessage == "success")
                            {
                                location.replace("checkout.php");
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
        $.ajax(
        {
            url:'admin/ajax/GetLoggedInStatus.php',
            method:'POST',
            success: function (strMessage)
            {
                if(strMessage == "true")
                {
                    $("#collapse-checkout-option").attr("class", "panel-collapse collapse clp-checkout-option");
                    $("#collapse-payment-address").attr("class", "panel-collapse collapse in");
                    $(".clp-checkout-option").attr("id", "o");
                    $(".clp-shipping-method").attr("id", "d");
                    $(".clp-payment-method").attr("id","p");
                    $(".clp-checkout-confirm").attr("id","c");
                    $.ajax(
                    {
                        url:'admin/ajax/GetUserInfo.php',
                        method:'POST',
                        success: function (data)
                        {
                            if(data.success == "true")
                            {
                                document.getElementById("input-payment-firstname").value = data.fn;
                                document.getElementById("input-payment-lastname").value = data.ln;
                                document.getElementById("input-payment-email").value = data.email;
                                document.getElementById("input-payment-telephone").value = data.phone;
                                document.getElementById("input-payment-sex").value = data.sex;
                                document.getElementById("input-payment-address").value = data.address;
                                document.getElementById("input-payment-city").value = data.city;
                            }
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            console.log(xhr.status);
                            console.log(thrownError);
                        },
                        dataType:'JSON'
                    });
                }
                else
                {
                    $("#collapse-checkout-option").attr("class", "panel-collapse collapse in");
                    $(".clp-shipping-method").attr("id", "d");
                    $(".clp-payment-method").attr("id","p");
                    $(".clp-checkout-confirm").attr("id","c");
                }
            },
            dataType:'text'
        });
        $('#btn-continue-details').click(function(){
            document.getElementById("details-validation-error").style.display = "none";
            document.getElementById("details-wrong-error").style.display = "none";
            var fn = document.getElementById("input-payment-firstname").value;
            var ln = document.getElementById("input-payment-lastname").value;
            var email = document.getElementById("input-payment-email").value;
            var phone = document.getElementById("input-payment-telephone").value;
            var sex = document.getElementById("input-payment-sex").value;
            var address = document.getElementById("input-payment-address").value;
            var city = document.getElementById("input-payment-city").value;
            var agree = document.getElementById("agree-details").checked;

            if(fn == "" || ln == "" || email == "" || phone == "" || sex == "" || address == "" || city == "" || agree == false)
            {
                document.getElementById("details-validation-error").style.display = "initial";   
            }
            else
            {   
                document.getElementById("loader_pharmacy").style.display = "initial";
                $.ajax(
                {
                    url:'admin/ajax/MakeNewOrder.php',
                    method:'POST',
                    data:{
                            fn: fn,
                            ln: ln,
                            email: email,
                            telephone: phone,
                            sex: sex,
                            adr: address,
                            city: city
                        },
                    success: function (strMessage)
                    {
                        document.getElementById("loader_pharmacy").style.display = "none";
                        if(strMessage == "success")
                        {
                            $(".clp-shipping-method").attr("id","collapse-shipping-method");
                            $("#collapse-payment-address").attr("class", "panel-collapse collapse");
                            $("#collapse-shipping-method").attr("class", "panel-collapse collapse in");
                        }
                        else
                        {
                            document.getElementById("details-wrong-error").style.display = "initial";
                        }
                    },
                    dataType:'text'
                });
            }
        });
        $('#button-shipping-method').click(function(){
            document.getElementById("shipping-wrong-error").style.display = "none";
            var choice = document.shipping_form.shipping_method.value;
            var comment = document.getElementById("order-comment").value;

            document.getElementById("loader_pharmacy").style.display = "initial";
            $.ajax(
            {
                url:'admin/ajax/UpdateOrderShippingInfo.php',
                method:'POST',
                data:{
                        choice: choice,
                        comment: comment
                    },
                success: function (strMessage)
                {
                    document.getElementById("loader_pharmacy").style.display = "none";
                    if(strMessage == "success")
                    {
                        $(".clp-payment-method").attr("id","collapse-payment-method");
                        $("#collapse-shipping-method").attr("class", "panel-collapse collapse");
                        $("#collapse-payment-method").attr("class", "panel-collapse collapse in");
                    }
                    else
                    {
                        document.getElementById("shipping-wrong-error").style.display = "initial";
                    }
                },
                dataType:'text'
            });
        });
        $('#button-payment-method').click(function(){
            var choice = document.payment_form.payment_method.value;
            var comment = document.getElementById("payment-comment").value;
            var terms = document.getElementById("terms").checked;

            if(terms == false)
            {
                document.getElementById("payment-terms-error").style.display = "initial";
            }
            else
            {
                document.getElementById("payment-wrong-error").style.display = "none";
                document.getElementById("payment-terms-error").style.display = "none";
                document.getElementById("loader_pharmacy").style.display = "initial";
                $.ajax(
                {
                    url:'admin/ajax/UpdateOrderPaymentInfo.php',
                    method:'POST',
                    data:{
                            choice: choice,
                            comment: comment
                        },
                    success: function (strMessage)
                    {
                        if(strMessage == "success")
                        {
                            $.ajax(
                            {
                                url:'admin/ajax/GetMedecinesCheckout.php',
                                method:'POST',
                                success: function (strMessage)
                                {
                                    
                                    $(".clp-checkout-confirm").attr("id","collapse-checkout-confirm");
                                    document.getElementById("loader_pharmacy").style.display = "none";
                                    $('#collapse-checkout-confirm').prepend(strMessage);
                                    $("#collapse-payment-method").attr("class", "panel-collapse collapse");
                                    $("#collapse-checkout-confirm").attr("class", "panel-collapse collapse in");
                                },
                                dataType:'text'
                            });
                        }
                        else
                        {
                            document.getElementById("loader_pharmacy").style.display = "none";
                            document.getElementById("payment-wrong-error").style.display = "initial";
                        }
                    },
                    dataType:'text'
                });
            }
        });
        $('#button-confirm').click(function(){
            document.getElementById("loader_pharmacy").style.display = "initial";
            $.ajax(
            {
                url:'admin/ajax/CheckoutConfirmation.php',
                method:'POST',
                success: function (strMessage)
                {
                    document.getElementById("loader_pharmacy").style.display = "none";
                    document.getElementById("confirmation-ok").style.display = "initial";
                },
                dataType:'text'
            });
        });
    });
</script>

        <div class="main-content">
            <div class="container checkout">
                <div class="breadcrumbs">
                    <a href="index.php"><i class="fa fa-home"></i></a>
                    <a href="checkout.php">Checkout</a>
                </div>
                <h2 class="text-center text-uppercase text-bold">checkout</h2>
                <hr class="small-line">
                <div id="accordion" class="panel-group margin-top">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a class="accordion-toggle" id="checkout-options" data-parent="#accordion" data-toggle="collapse" href="#collapse-checkout-option">Step 1: Checkout Options <i class="fa fa-caret-down"></i></a></h4>
                        </div>
                        <div id="collapse-checkout-option" class="panel-collapse collapse in clp-checkout-option" aria-expanded="false">
                            <div class="panel-body"><div class="row">
                                    <div class="col-sm-6">
                                        <h2>New Customer</h2>
                                        Register Account
                                        <p> <br>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                                        <a class="btn btn-primary" id="button-account" href="register.php">Continue</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <h2>Returning Customer</h2>
                                        <p>I am a returning customer</p>
                                        <form name="f" enctype="multipart/form-data"  role="form" class="form-horizontal add_margin">
                                        <div class="form-group">
                                            <label for="input-email" class="control-label col-sm-3"><b>E-Mail Address</b></label>
                                            <div class="col-sm-9">
                                            <input type="text" class="form-control" id="input-email" placeholder="E-Mail Address" value="" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-password" class="control-label col-sm-3"><b>Password</b></label>
                                            <div class="col-sm-9">
                                            <input type="password" class="form-control" id="input-password" placeholder="Password" value="" name="password">
                                            </div>
                                        </div>
                                        <p class="cat_name" style="text-align: left;"> <a href="#">Forgot Passowrd? Click here.</a></p>
                                        <!--<input type="submit" value="Login" class="btn btn-primary reg_button" />!-->
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapse-payment-address">Step 2: Account &amp; Billing Details <i class="fa fa-caret-down"></i></a></h4>
                        </div>
                        <div class="panel-collapse collapse" id="collapse-payment-address" style="height: auto;">
                            <div class="panel-body"><div class="row">
                                    <div class="col-sm-6">
                                        <fieldset id="account">
                                            <legend>Your Personal Details</legend>
                                            <div style="display: none;" class="form-group">
                                                <label class="control-label">Customer Group</label>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" checked="checked" value="1" name="customer_group_id">
                                                        Default</label>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-payment-firstname" class="control-label">First Name</label>
                                                <input type="text" class="form-control" id="input-payment-firstname" placeholder="First Name" value="" name="firstname">
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-payment-lastname" class="control-label">Last Name</label>
                                                <input type="text" class="form-control" id="input-payment-lastname" placeholder="Last Name" value="" name="lastname">
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-payment-email" class="control-label">E-Mail</label>
                                                <input type="text" class="form-control" disabled id="input-payment-email" placeholder="E-Mail" value="" name="email">
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-payment-telephone" class="control-label">Telephone</label>
                                                <input type="text" class="form-control" disabled id="input-payment-telephone" placeholder="Telephone" value="" name="telephone">
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-sex" class="control-label">Sex</label>
                                                <select class="form-control" id="input-payment-sex" name="sex">
                                                    <option value="M">Male</option>
                                                    <option value="F">Female</option>
                                                </select>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6">
                                        <fieldset id="address" class="required">
                                            <legend>Your Address</legend>
                                            <div class="form-group required">
                                                <label for="input-payment-address" class="control-label">Address</label>
                                                <input type="text" class="form-control" id="input-payment-address" placeholder="Address" value="" name="address_1">
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-payment-city" class="control-label">City</label>
                                                <input type="text" class="form-control" id="input-payment-city" placeholder="City" value="" name="city">
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="buttons clearfix">
                                    <div class="pull-right">I have read and agree to the <a class="agree" target="_blank" href="privacypolicy.php"><b>Privacy Policy</b></a> &nbsp;
                                        <input type="checkbox" value="1" id="agree-details" name="agree" style="vertical-align: text-bottom">
                                        <input type="button" class="btn btn-primary" id="btn-continue-details" value="Continue">
                                    </div>
                                </div>
                                
                                <div style="display: none;margin-top: 5px;" id="details-validation-error" class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <label for="input-validate" style="color: #ff0f0f;background-color: #fec1c1;border-color: #f5c6cb;margin-top: 5px;padding-top: 15px;padding-bottom: 15px;" class="col-sm-12 control-label">All fields are required.</label>
                                </div>
                                <div style="display: none;margin-top: 5px;" id="details-wrong-error" class="form-group col-lg-12 col-md-12 col-sm-12">
                                <label for="input-validate" style="color: #ff0f0f;background-color: #fec1c1;border-color: #f5c6cb;margin-top: 5px;padding-top: 15px;padding-bottom: 15px;" class="col-sm-12 control-label">Something went wrong, please contact administration.</label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapse-shipping-method">Step 3: Delivery Method <i class="fa fa-caret-down"></i></a></h4>
                        </div>
                        <div id="collapse-shipping-method" class="panel-collapse collapse clp-shipping-method" aria-expanded="true">
                            <div class="panel-body">
                            <form name="shipping_form">
                                <p><strong>Please select the preferred delivery method to use on this order.</strong></p>
                                <div class="radio">
                                    <label>
                                        <input type="radio" checked="checked" value="1" name="shipping_method">
                                        delivery - $8.00</label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="2" name="shipping_method">
                                        pickup - Free of charge</label>
                                </div>
                                <p><strong>Add Comments About Your Order</strong></p>
                                <p>
                                    <textarea class="form-control" rows="5" id="order-comment" name="comment"></textarea>
                                </p>
                                <div class="buttons">
                                    <div class="pull-right">
                                        <input type="button" class="btn btn-primary"  id="button-shipping-method" value="Continue">
                                    </div>
                                </div>
                                <div style="display: none;margin-top: 5px;" id="shipping-wrong-error" class="form-group col-lg-12 col-md-12 col-sm-12">
                                <label for="input-validate" style="color: #ff0f0f;background-color: #fec1c1;border-color: #f5c6cb;margin-top: 5px;padding-top: 15px;padding-bottom: 15px;" class="col-sm-12 control-label">Something went wrong, please contact administration.</label>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapse-payment-method" aria-expanded="true">Step 4: Payment Method <i class="fa fa-caret-down"></i></a></h4>
                        </div>
                        <div id="collapse-payment-method" class="panel-collapse collapse clp-payment-method" aria-expanded="true">
                            <div class="panel-body"><p><strong>Please select the preferred payment method to use on this order.</strong></p>
                                <form name="payment_form">
                                <div class="radio">
                                    <label>
                                        <input type="radio" checked="checked" value="1" name="payment_method">
                                        Cash      </label>
                                </div>
                                <div class="radio disabled">
                                    <label>
                                        <input disabled type="radio" value="2" name="payment_method">
                                        By Credit Card <i style="color: red;">Comming soon...</i>     </label>
                                </div>
                                <p><strong>Add Comments About Your Order</strong></p>
                                <p>
                                    <textarea class="form-control" id="payment-comment" rows="5" name="comment"></textarea>
                                </p>
                                <div class="buttons">
                                    <div class="pull-right">I have read and agree to the <a class="agree" target="_blank" href="terms.php"><b>Terms &amp; Conditions</b></a>        <input type="checkbox" value="1" id="terms" name="terms">
                                        &nbsp;
                                        <input type="button" class="btn btn-primary"  id="button-payment-method" value="Continue">
                                    </div>
                                </div>
                                <div style="display: none;margin-top: 5px;" id="payment-terms-error" class="form-group col-lg-12 col-md-12 col-sm-12">
                                <label for="input-validate" style="color: #ff0f0f;background-color: #fec1c1;border-color: #f5c6cb;margin-top: 5px;padding-top: 15px;padding-bottom: 15px;" class="col-sm-12 control-label">Please read and agree to the Terms & Conditions.</label>
                                </div>
                                <div style="display: none;margin-top: 5px;" id="payment-wrong-error" class="form-group col-lg-12 col-md-12 col-sm-12">
                                <label for="input-validate" style="color: #ff0f0f;background-color: #fec1c1;border-color: #f5c6cb;margin-top: 5px;padding-top: 15px;padding-bottom: 15px;" class="col-sm-12 control-label">Something went wrong, please contact administration.</label>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapse-checkout-confirm" aria-expanded="true">Step 5: Confirm Order <i class="fa fa-caret-down"></i></a></h4>
                        </div>
                        <div id="collapse-checkout-confirm" class="panel-collapse collapse clp-checkout-confirm" aria-expanded="true">
                        
                                <div class="buttons">
                                    <div class="pull-right">
                                        <input type="button"  class="btn btn-primary" id="button-confirm" value="Confirm Order">
                                    </div>
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