<?php
    session_start();
    if(!isset($_COOKIE['sessionpharmacy']))
    {
        setcookie('sessionpharmacy', session_id(), time() + (86400 * 30), "/"); // 86400 = 1 day
        //echo "<script>alert('".$session_id."')</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="icon" href="images/favicon.png"/>
        <title>E-Pharmacy</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/style.css"/> 
        <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="css/owl-carousel.css"/>
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.form.js"></script>
        <script src="js/owl-carousel.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/custom.js"></script>
        <script>
            function getCartHeaderInfo()
            {
                $.ajax(
                {
                url:'admin/ajax/GetCartHeaderInfo.php',
                method:'POST',
                success: function (data)
                {
                    if(data.success == "true")
                    {
                        $('.cart_total').empty();
                        $('.cart_total').prepend(data.price);
                        $('.cart_total').append("$");
                        $('.cart_items').empty();
                        $('.cart_items').prepend("("+data.quantity);
                        $('.cart_items').append(" items)");
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                },
                dataType:'JSON'
                });
            }
            $(document).ready(function(){
                getCartHeaderInfo();
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4" id="logo" >
                    <a href="index.php" class="logo-text">
                        E-<span style="color:#0c2e8a;">Pharmacy</span>
                    </a>		
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12" style="display:none " id="navbar_hide" >
                    <nav  role="navigation" class="navbar navbar-inverse">
                        <a href="index.php" style="float: left" class="logo-text">
                            E-<span style="color:#0c2e8a;">Pharmacy</span>
                        </a>
                        <div id="nav">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="background: #50d8af; border: none; margin-right: 0">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="myNavbar">
                                <ul class="nav navbar-nav site_nav_menu1"  >
                                    <li class="first " ><a href="index.php">Home</a></li>
                                    <li><a href="about.php">About us</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                    <?php
                                        if(isset($_COOKIE['idpharmacy']) && isset($_COOKIE['emailpharmacy']) && isset($_COOKIE['passwordpharmacy']) && isset($_COOKIE['namepharmacy']))
                                        {
                                    ?>
                                        <li><a href="prescription.php">Prescription</a></li>
                                    <?php
                                        }
                                    ?>
                                    <li><a href="privacypolicy.php">Privacy Policy</a></li>
                                    <li><a href="terms.php">Terms & Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-md-4 col-md-offset-4 col-sm-offset-2  col-sm-6 col-xs-12" >
                    <div id="top_right">
                        <div id="cart">
                            <div class="text">
                                <div class="img">
                                    <a href="cart.php"> <img class="img-responsive" src="images/cart.png" alt="" title="" width="26" height="27" />
                                </div><span>Your cart:</span><span class="cart_total"></span><span class="cart_items"></span></a>
                            </div> 
                        </div>
                        <div id="bottom_right">
                            <div class="row">
                                <div class="col-md-6 col-xs-6 wd_auto">
                                    <div class="left">
                                        <div class="login">
                                        <?php
                                            //require_once("admin/config/function.php");
                                            if(isset($_COOKIE['idpharmacy']) && isset($_COOKIE['emailpharmacy']) && isset($_COOKIE['passwordpharmacy']) && isset($_COOKIE['namepharmacy']))
                                            {
                                                $name = $_COOKIE['namepharmacy'];
                                        ?>
                                            <?php echo "<span style='color: #0c2e8a'>".$name." </span>" ?><button class="btn btn-default reg_button" data-toggle="modal" data-target="#LogoutModal">Logout <i class="fa fa-sign-out"></i></button>
                                            <button type="button" class="btn btn-heart" id="wishlist" onClick="goWishlist();">Favorites <i class="fa fa-heart"></i></button>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                            <a class="btn btn-default reg_button" href="login.php">Login <i class="fa fa-sign-in"></i></a> 
                                            <a class="btn btn-default reg_button" href="register.php">Signup <i class="fa fa-user-plus"></i></a>
                                            <button type="button" class="btn btn-heart" id="wishlist" onClick="goWishlist();">Favorites <i class="fa fa-heart"></i></button>
                                        <?php } ?>
                                        </div>			
                                    </div>
                                </div> 
                                <div class="dropdown-bn wd-33 col-md-6 remove_PL col-xs-6">
                                    <div class="row">
                                        <div class=" pl-0 col-md-12 col-xs-12">
                                            <!--<a href="wishlist.php"><img class="img-responsive" src="images/heart.png" alt="" title="" width="40" height="40" /></a>
                                            <div class="dropdown btn-group">
                                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">language
                                                    <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">English</a></li>
                                                    <li><a href="#">French</a></li>
                                                    <li><a href="#">Arabic</a></li>
                                                </ul>
                                            </div>-->
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> 
        <div class="container-fluid bg-color">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <nav  role="navigation" class="navbar navbar-inverse" id="nav_show">
                                <div id="nav">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>

                                    </div>
                                    <div class="collapse navbar-collapse" id="myNavbar">
                                        <ul class="nav navbar-nav site_nav_menu1"  >
                                            <li class="first "><a href="index.php">Home</a></li>
                                            <li><a href="about.php">About us</a></li>
                                            <li><a href="contact.php">Contact Us</a></li>
                                            <?php
                                                if(isset($_COOKIE['idpharmacy']) && isset($_COOKIE['emailpharmacy']) && isset($_COOKIE['passwordpharmacy']) && isset($_COOKIE['namepharmacy']))
                                                {
                                            ?>
                                                <li><a href="prescription.php">Prescription</a></li>
                                            <?php
                                                }
                                            ?>
                                            <li><a href="privacypolicy.php">Privacy Policy</a></li>
                                            <li><a href="terms.php">Terms & Conditions</a></li>
                                        </ul>

                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div> 

                </div>
            </div>
        </div>
        <script>
        function goWishlist()
        {
            $.ajax(
            {
                url:'admin/ajax/GetLoggedInStatus.php',
                method:'POST',
                success: function (strMessage)
                {
                    if(strMessage == "true")
                    {
                        location.replace("wishlist.php");
                    }
                    else
                    {
                        location.replace("login.php");
                    }
                },
                dataType:'text'
            });
        }
    function CopyLink(medecine_id)
    {
        var url = "http://127.0.0.1:8000/PFE/single-product.php?med="+medecine_id;
        var modal = `
                    <div class="modal fade" id="copy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Link copied to clipboard</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                `+ url +` 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
                            </div>
                            </div>
                        </div>
                    </div>`;
        $(".container").prepend(modal);
        $('#copy').modal('show'); 
        document.addEventListener("copy", function(evt){
            // Change the copied text if you want
            evt.clipboardData.setData("text/plain", url);

            // Prevent the default copy action
            evt.preventDefault();
        }, false);

            /* Copy the text inside the text field */
            document.execCommand("copy");
    }
    function LoginStatus(medecine_id)
    {
        document.getElementById("loader_pharmacy").style.display = "initial";
        $.ajax(
        {
            url:'admin/ajax/PutToWishList.php',
            method:'POST',
            data: {
                id: medecine_id
            },
            success: function (strMessage)
            {
                document.getElementById("loader_pharmacy").style.display = "none";
                if(strMessage == "false")
                {
                    location.replace("login.php");
                }
                else
                {
                    if(strMessage == "true")
                        $('#liked').modal('show');
                    else
                        $('#exist').modal('show'); 
                }
            },
            dataType:'text'
        });
    }
    function Dislike(medecine_id)
    {
        document.getElementById("loader_pharmacy").style.display = "initial";
        $.ajax(
        {
            url:'admin/ajax/RemoveFromWishList.php',
            method:'POST',
            data: {
                id: medecine_id
            },
            success: function (strMessage)
            {
                document.getElementById("loader_pharmacy").style.display = "none";
                if(strMessage == "true")
                {
                    var divid = '#'+medecine_id;
                    $('#dislike').modal('show');
                    $(divid).css({"display": "none"});
                }
                else
                {
                    location.replace("wishlist.php");
                }
            },
            dataType:'text'
        });
    }

    function AddToCart(medecine_id,quantity)
    {
        if(quantity == -1)
            quantity = document.getElementById("ipq").value;
        document.getElementById("loader_pharmacy").style.display = "initial";
        $.ajax(
        {
            url:'admin/ajax/AddToCart.php',
            method:'POST',
            data: {
                id: medecine_id,
                quantity: quantity
            },
            success: function (strMessage)
            {
                document.getElementById("loader_pharmacy").style.display = "none";
                if(strMessage == "true")
                {
                    getCartHeaderInfo();
                    $('#AddedToCart').modal('show');
                }
                else
                {
                    $('#ExistInCart').modal('show');
                }
            },
            dataType:'text'
        });
    }
    
    function modify_price(medecine_id,action)
    {
        var unit = parseInt(document.getElementById("unit_"+medecine_id).innerHTML);
        var quantity = parseInt(document.getElementById("quantity_"+medecine_id).value);
        var total = parseInt(unit * quantity);
        document.getElementById("total_"+medecine_id).innerHTML = total;
        var subtotal = parseInt(document.getElementById("subtotal").innerHTML);
        if(action == "plus")
            document.getElementById("subtotal").innerHTML = parseInt(subtotal + unit);
        else
            document.getElementById("subtotal").innerHTML = parseInt(subtotal - unit);
        subtotal = parseInt(document.getElementById("subtotal").innerHTML);
        var tva = parseFloat((subtotal * 0.1).toFixed(1));
        document.getElementById("tva").innerHTML = tva;
        var ordertotal = parseFloat(subtotal + tva);
        document.getElementById("ordertotal").innerHTML = ordertotal;
    }

    function plus_quantity(medecine_id)
    {
        var input_quantity = "quantity_"+medecine_id;
        var q = parseInt(document.getElementById(input_quantity).value);
        if(q < 9)
        {
            q = parseInt(q + 1);
            document.getElementById(input_quantity).value = q;
            modify_price(medecine_id,"plus");
            $.ajax(
            {
                url:'admin/ajax/ModifyMedecineQuantity.php',
                method:'POST',
                data: {
                    id: medecine_id,
                    quantity: q
                },
                success: function (strMessage)
                {
                    getCartHeaderInfo();
                },
                dataType:'text'
            });
        }
    }

    function minus_quantity(medecine_id)
    {
        var input_quantity = "quantity_"+medecine_id;
        var q = parseInt(document.getElementById(input_quantity).value);
        if(q > 1)
        {
            q = parseInt(q - 1);
            document.getElementById(input_quantity).value = q;
            modify_price(medecine_id,"minus");
            $.ajax(
            {
                url:'admin/ajax/ModifyMedecineQuantity.php',
                method:'POST',
                data: {
                    id: medecine_id,
                    quantity: q
                },
                success: function (strMessage)
                {
                    getCartHeaderInfo();
                },
                dataType:'text'
            });
        }
    }

    function minus_quantity_single()
    {
        var input_quantity = document.getElementById("ipq").value;
        var q = parseInt(input_quantity);
        if(q > 1)
        {
            q = parseInt(q - 1);
            document.getElementById("ipq").value = q;
        }
    }

    function plus_quantity_single()
    {
        var input_quantity = document.getElementById("ipq").value;
        var q = parseInt(input_quantity);
        if(q < 9)
        {
            q = parseInt(q + 1);
            document.getElementById("ipq").value = q;
        }
    }

    function RemoveFromCart(medecine_id)
    {
        document.getElementById("loader_pharmacy").style.display = "initial";
        $.ajax(
        {
            url:'admin/ajax/RemoveFromCart.php',
            method:'POST',
            data: {
                id: medecine_id
            },
            success: function (strMessage)
            {
                document.getElementById("loader_pharmacy").style.display = "none";
                if(strMessage == "true")
                {
                    getCartHeaderInfo();
                    var trid = "#medecine_"+medecine_id;
                    $('#RemoveFromCart').modal('show');
                    $(trid).css({"display": "none"});
                }
                else
                {
                    location.replace("wishlist.php");
                }
            },
            dataType:'text'
        });
    }

    function search()
    {
        var search_keyword = document.getElementById("search_input").value;
        location.replace("search.php?keyword="+search_keyword);
    }
</script>

        <!-- Modals -->
        
        <!-- Logout Modal -->
        <div class="modal fade" id="LogoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to logout?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <a href="logout.php" class="btn btn-default reg_button">Logout</a>
                </div>
                </div>
            </div>
        </div>

        <!-- Add To Wishlist Modal -->
        <div class="modal fade" id="liked" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Added to Wishlist!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    This medecine added to your wishlist. 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
                </div>
                </div>
            </div>
        </div>

        <!-- Exist In Wishlist Modal -->
        <div class="modal fade" id="exist" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Medecine Already Exist!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    This medecine is already exist in your wishlist. 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
                </div>
                </div>
            </div>
        </div>

        <!-- Remove From Wishlist Modal -->
        <div class="modal fade" id="dislike" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Removed from wishlist</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    This medecine removed from your wishlist. 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
                </div>
                </div>
            </div>
        </div>

        <!-- Remove From Cart Modal -->
        <div class="modal fade" id="RemoveFromCart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Removed from cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    This medecine removed from your cart. 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
                </div>
                </div>
            </div>
        </div>

        <!-- Add To Cart Modal -->
        <div class="modal fade" id="AddedToCart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Added to Cart!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    This medecine added to your cart. 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
                </div>
                </div>
            </div>
        </div>

        <!-- Exist In Cart Modal -->
        <div class="modal fade" id="ExistInCart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Medecine Already Exist!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    This medecine is already exist in your cart. 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
                </div>
                </div>
            </div>
        </div>

        <!-- Stock Error Modal -->
        <div class="modal fade" id="StockError" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-weight: bold; color: black;" class="modal-title">Quantity isn't available in stock!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="stock_body" class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
                </div>
                </div>
            </div>
        </div>

        <!-- Loader -->
        <div style="display: none;top: 50%; left: 50%; transform: translate(-50%, -50%);position: fixed; margin-top: 0px;z-index: 999;" id="loader_pharmacy" class="loader">
            <img align="center" src="images/loader.gif" style="width: 320px;height: 48px;">
        </div>
