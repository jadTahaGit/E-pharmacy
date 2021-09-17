<?php require_once("header.php"); ?>

        <div class="main-content">
            <div class="container cart-block-style">          
                <div class="breadcrumbs">
                    <a href="home.php"><i class="fa fa-home"></i></a>
                    <a href="#">Shopping Cart</a>
                </div>
                <div class="contentText">
                    <h1>Shopping Cart
                    </h1>
                </div>
                
                <script>
                    $(document).ready(function(){
                        $.ajax(
                        {
                            url:'admin/ajax/GetMedecinesFromCart.php',
                            method:'POST',
                            success: function (strMessage)
                            {
                                if(strMessage == "empty")
                                {
                                    document.getElementById("empty-cart").style.display = "initial";
                                }
                                else
                                {
                                    document.getElementById("checkout").style.display = "initial";
                                    $('#cart_info').append(strMessage);
                                }
                            },
                            dataType:'text'
                        });
                        $('#checkout').click(function(){
                            document.getElementById("loader_pharmacy").style.display = "initial";
                            $.ajax(
                            {
                                url:'admin/ajax/GoCheckout.php',
                                method:'POST',
                                success: function (strMessage)
                                {
                                    document.getElementById("loader_pharmacy").style.display = "none";
                                    if(strMessage == "")
                                    {
                                        location.replace("checkout.php");
                                    }
                                    else
                                    {
                                        $('#stock_body').empty();
                                        $('#stock_body').append(strMessage);
                                        $('#StockError').modal('show');
                                    }
                                },
                                dataType:'text'
                            });
                        });
                    });
                </script>
                <div id='cart_info'>
                    <div style="display: none;margin-top: 5px;text-align: center;" id="empty-cart" class="alert alert-danger col-lg-12 col-md-12 col-sm-12">
                        Your cart is empty.
                    </div>
                </div>
                <div class="buttons">
                    <script>
                        $(document).ready(function(){
                            $.ajax(
                            {
                                url:'admin/ajax/GetCategoryRandomly.php',
                                method:'POST',
                                success: function (strMessage)
                                {
                                    $('#btn-continue-shopping').append(strMessage);
                                },
                                dataType:'text'
                            });
                        });
                    </script>
                    <div id="btn-continue-shopping" class="pull-left"></div>
                    <div class="pull-right"><button style="display: none;" class="btn btn-primary reg_button" id="checkout">Checkout</button></div>
                </div>
            </div>
        </div>
        <?php require_once("footer.php"); ?>
        <a style="display: none" href="javascript:void(0);" class="scrollTop back-to-top" id="back-to-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </body>
</html> 