<?php require_once("header.php"); ?>
<script>
    $(document).ready(function(){
        document.getElementById("loader_pharmacy").style.display = "initial";
        $.ajax(
        {
            url:'admin/ajax/GetPrivacy.php',
            method:'POST',
            success: function (data)
            {
                document.getElementById("loader_pharmacy").style.display = "none";
                if(data.success == "true")
                {
                    $('#limitation').append("<p>"+data.limitation+"</p>");
                    $('#privacy').append("<p>"+data.privacy+"</p>");
                }
                else
                {
                    $('#limitation').append("No informations provided by administration.");
                    $('#privacy').append("No informations provided by administration.");
                }
            },
            dataType:'JSON'
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
                            <a class="list-group-item" href="contact.php">Contact us</a>
                            <a class="list-group-item" href="about.php">About us</a>
                            <a class="list-group-item" href="#">Privacy Policy</a>
                            <a class="list-group-item" href="terms.php">Terms & Conditions</a>
                        </div>
                    </aside>
                    <div class="col-sm-9" id="content">            
                        <div class="breadcrumbs">
                            <a href="index.php"><i class="fa fa-home"></i></a>
                            <a href="#">Privacy Policy</a>
                        </div>
                        <div class="contentText">
                            <h1>Privacy Policy</h1>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2>Limitation of liability</h2>
                                    <div id="limitation">

                                    </div>
                                    
                                    <h2>Privacy Policy</h2>
                                    <div id="privacy">

                                    </div>
                    
                                    <h2>New Customer?</h2>
                                    <p>By creating an account at E-Pharmacy, you will be able to shop faster, be up to date on an orders status,
                                        and keep track of the orders you have previously made.</p>
                                    <a class="btn btn-link" href="register.php">
                                        <i class="fa fa-caret-right"></i>&nbsp;
                                        Register
                                    </a>
                                    <h2>Already have an account?</h2>
                                    <a class="btn btn-link" href="login.php">
                                        <i class="fa fa-caret-right"></i>&nbsp;
                                        Click here to login
                                    </a>
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