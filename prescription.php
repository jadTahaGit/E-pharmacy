<?php require_once("header.php"); ?>
<script>
        $(document).ready(function(){
            $.ajax(
            {
                url:'admin/ajax/GetLoggedInStatus.php',
                method:'POST',
                success: function (strMessage)
                {
                    if(strMessage == "false")
                    {
                        location.replace("index.php");
                    }
                },
                dataType:'text'
            });
            $('#uploadPricturePrescription').submit(function(event){
                event.preventDefault();
                if($('#picture_prescription').val())
                {
                    event.preventDefault();
                    document.getElementById("loader_pharmacy").style.display = "initial";
                    $('#targetLayerPrescription').hide();
                    $(this).ajaxSubmit({
                    target: '#targetLayerPrescription',
                    beforeSubmit:function(){
                        $('.p_front').width('50%');
                    },
                    uploadProgress: function(event, position, total, percentageComplete)
                    {
                        $('.p_front').animate({
                        width: percentageComplete + '%'
                        }, {
                        duration: 1000
                        });
                    },
                    success:function(){
                        document.getElementById("loader_pharmacy").style.display = "none";
                        $('#targetLayerPrescription').show();
                    },
                    resetForm: true
                    });
                }
                return false;
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
                            <a class="list-group-item" href="privacypolicy.php">Privacy Policy</a>
                            <a class="list-group-item" href="terms.php">Terms & Conditions</a>
                        </div>
                    </aside>
                    <div class="col-sm-9" id="content">            
                        <div class="breadcrumbs">
                            <a href="index.php"><i class="fa fa-home"></i></a>
                            <a href="#">Prescription</a>
                        </div>
                        <div class="contentText">
                            <h1>Order medecines by doctor's prescription</h1>
                            <div class="row">
                                <div style="border-left: 1px dashed #c1bebe" class="col-sm-12">
                                    <!--<div class="well">!-->
                                    <h2>Please upload a picture for your prescription and hit the upload button</h2>
                                    <form id="uploadPricturePrescription" name="uploadPicturePrescription" action="admin/ajax/UploadPrescriptionPicture.php" method="post">
                                        <div class="form-group">
                                            <label><h4>Prescription Picture</h4></label>
                                            <label class="filelabel">
                                            <i class="fa fa-paperclip">
                                            </i>
                                            <span class="title">
                                                Click here to choose picture
                                            </span>
                                            <input type="file" name="picture_prescription" id="picture_prescription" accept=".jpg, .png" />
                                            </label>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar p_front" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" id="upload_prescription" class="btn btn-primary"><i class="fa fa-upload"></i>&nbsp;Upload</button>
                                        </div>
                                        <div id="targetLayerPrescription" style="display:none;"></div>
                                        <hr style="margin-bottom: 20px;">
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
<script>
$(document).ready(function(){
    $("#picture_prescription").on('change',function (e) {
    var labelVal = $(".title").text();
    var oldfileName = $(this).val();
        fileName = e.target.value.split( '\\' ).pop();

        if (oldfileName == fileName) {return false;}
        var extension = fileName.split('.').pop();

    if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
        $(".filelabel i").removeClass().addClass('fa fa-file-image-o');
        $(".filelabel i, .filelabel .title").css({'color':'#208440'});
        $(".filelabel").css({'border':' 2px solid #208440'});
    }
    else if(extension == 'pdf'){
        $(".filelabel i").removeClass().addClass('fa fa-file-pdf-o');
        $(".filelabel i, .filelabel .title").css({'color':'red'});
        $(".filelabel").css({'border':' 2px solid red'});
    }
    else if(extension == 'doc' || extension == 'docx'){
        $(".filelabel i").removeClass().addClass('fa fa-file-word-o');
        $(".filelabel i, .filelabel .title").css({'color':'#2388df'});
        $(".filelabel").css({'border':' 2px solid #2388df'});
    }
    else{
        $(".filelabel i").removeClass().addClass('fa fa-file-o');
        $(".filelabel i, .filelabel .title").css({'color':'black'});
        $(".filelabel").css({'border':' 2px solid black'});
    }

    if(fileName ){
        if (fileName.length > 10){
            $(".filelabel .title").text(fileName.slice(0,4)+'...'+extension);
        }
        else{
            $(".filelabel .title").text(fileName);
        }
    }
    else{
        $(".filelabel .title").text(labelVal);
    }
});
});
</script>