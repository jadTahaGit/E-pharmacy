<?php require_once("header.php"); ?>
<?php
    if($anm == "false")
        die("<script>window.location.replace('index.php');</script>");
?>
    <script>
    $(document).ready(function(){
        document.getElementById("err").style.display = "none";
        document.getElementById("success").style.display = "none";
        document.getElementById("category").disabled = "true";
        document.getElementById("type").disabled = "true";
        $(".page-title").append("Add New Medicine");

        var phar = document.f.pharmacy.value;
        $.ajax({
            url:'../ajax/GetAllCategories.php',
            method:'POST',
            data:{
                pharmacy: phar
            },
            success: function (strMessage)
            {
                $('#category').prop('disabled', false);
                $('#category').append(strMessage);
                var categ = document.f.category.value;
                $('#type').empty();
                $.ajax({
                    url:'../ajax/GetAllTypes.php',
                    method:'POST',
                    data:{
                        category: categ
                    },
                    success: function (strMessage)
                    {
                        $('#type').prop('disabled', false);
                        $('#type').append(strMessage);
                    },
                    dataType: 'text'
                });
            },
            dataType: 'text'
        });

        $("#pharmacy").change(function(){
            var phar = document.f.pharmacy.value;
            $('#category').empty();
            $('#category').prop("disabled", true);
            $('#type').empty();
            $('#type').prop("disabled", true);
            $.ajax({
                url:'../ajax/GetAllCategories.php',
                method:'POST',
                data:{
                    pharmacy: phar
                },
                success: function (strMessage)
                {
                    $('#category').prop('disabled', false);
                    $('#category').append(strMessage);
                    var categ = document.f.category.value;
                    $('#type').empty();
                    $.ajax({
                        url:'../ajax/GetAllTypes.php',
                        method:'POST',
                        data:{
                            category: categ
                        },
                        success: function (strMessage)
                        {
                            $('#type').prop('disabled', false);
                            $('#type').append(strMessage);
                        },
                        dataType: 'text'
                    });
                },
                dataType: 'text'
            });
        });

        $("#category").change(function(){
            var categ = document.f.category.value;
            $('#type').empty();
            $('#type').prop("disabled", true);
            $.ajax({
                url:'../ajax/GetAllTypes.php',
                method:'POST',
                data:{
                    category: categ
                },
                success: function (strMessage)
                {
                    $('#type').prop('disabled', false);
                    $('#type').append(strMessage);
                },
                dataType: 'text'
            });
        });

        $("#btn_add").click(function(event){
          document.getElementById("err").style.display = "none";
          document.getElementById("success").style.display = "none";
          $('.text-muted-err').empty();
          event.preventDefault();
          var type = document.f.type.value;
          var name = document.f.name.value;
          var price = document.f.price.value;
          var quantity = document.f.quantity.value;
          var description = document.f.description.value;

          if(name == "" || price == "" || quantity == "" || description == "")
          {
            document.getElementById("err").style.display = "contents";
            $(".text-muted-err").append("All fields are required.");
          }
          else
          {
            $.ajax(
            {
                url:'../ajax/AddNewMedecine.php',
                method:'POST',
                data:{
                    type: type,
                    name: name,
                    price: price,
                    quantity: quantity,
                    description: description,
                    token: csrf_token
                },
                success: function (strMessage)
                {
                    if(strMessage == "true")
                    {
                        document.getElementById("images").style.display = "contents";
                        document.getElementById("success").style.display = "contents";
                    }
                    else
                    {
                        document.getElementById("err").style.display = "contents";
                        $(".text-muted-err").append(strMessage);
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
                        <h3 class="card-title"><b>Please fill all informations</b></h3>
                    </div>
                    <div class="table-responsive">
                        <form name="f" method="post">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <tr>
                                <th class="col-2">Pharmacy Type<br><h5><i>(click to select an option)</i></h5></th>
                                <td class="col-10">
                                    <select id="pharmacy" name="pharmacy" class="form-select">
                                        <option value="1">Pharmacy</option>
                                        <option value="2">Parapharmacy</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-2">Category Name<br><h5><i>(click to select an option)</i></h5></th>
                                <td class="col-10">
                                    <select id="category" name="category" class="form-select">
                                        
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-2">Type Name<br><h5><i>(click to select an option)</i></h5></th>
                                <td class="col-10">
                                    <select id="type" name="type" class="form-select">
                                        
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-2">Medicine Name</th>
                                <td class="col-10"><input type="text" name="name" class="form-control" autocomplete="off" placeholder="Medicine name"></td>
                            </tr>
                            <tr>
                                <th class="col-2">Medicine Price</th>
                                <td class="col-10"><input type="text" name="price" class="form-control" autocomplete="off" placeholder="Medicine price" onkeydown="return ( event.ctrlKey || event.altKey 
                                            || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                                            || (95<event.keyCode && event.keyCode<106)
                                            || (event.keyCode==8) || (event.keyCode==9) 
                                            || (event.keyCode>34 && event.keyCode<40) 
                                            || (event.keyCode==46) )">
                                </td>
                            </tr>
                            <tr>
                                <th class="col-2">Medicine Quantity</th>
                                <td class="col-10"><input type="text" name="quantity" class="form-control" autocomplete="off" placeholder="Medicine quantity" onkeydown="return ( event.ctrlKey || event.altKey 
                                            || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                                            || (95<event.keyCode && event.keyCode<106)
                                            || (event.keyCode==8) || (event.keyCode==9) 
                                            || (event.keyCode>34 && event.keyCode<40) 
                                            || (event.keyCode==46) )">
                                </td>
                            </tr>
                            <tr>
                                <th class="col-2">Medicine's Description</th>
                                <td class="col-10"><textarea class="form-control" name="description" rows="5" placeholder="Description..."></textarea></td>
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
                                        <div class="text-muted">Medicine Successfully Added.<br>Please add images for this medicine below.</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" colspan="2"><input type="submit" name="btn_add" id="btn_add" class="btn btn-primary" value="Add Medicine"></td>
                            </tr>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12" id="images" style="display: none;">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Medicine First Image</b></h3>
                    </div>
                    <div class="table-responsive">
                        <form id="uploadPrictureFront" name="uploadPictureFront" action="../ajax/UploadMedecineFrontPicture.php" method="post">
                            <div class="form-group">
                                <input type="file" id="picture_front" name="picture_front" class="form-control" accept="image/png, image/jpeg">
                            </div>
                            <div class="progress">
                                <div class="progress-bar p_front" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div align="center" class="form-group">
                                <button type="submit" id="upload_front" class="btn btn-primary">Upload</button>
                            </div>
                            <div id="targetLayerFront" style="display:none;"></div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Medicine Second Image</b></h3>
                    </div>
                    <div class="table-responsive">
                        <form id="uploadPrictureBack" name="uploadPictureBack" action="../ajax/UploadMedecineBackPicture.php" method="post">
                            <div class="form-group">
                                <input type="file" id="picture_back" name="picture_back" class="form-control" accept="image/png, image/jpeg">
                            </div>
                            <div class="progress">
                                <div class="progress-bar p_back" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div align="center" class="form-group">
                                <button type="submit" id="upload_back" class="btn btn-primary">Upload</button>
                            </div>
                            <div id="targetLayerBack" style="display:none;"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
                <script>
                    $(document).ready(function(){
                        $('#uploadPrictureFront').submit(function(event){
                            event.preventDefault();
                            if($('#picture_front').val())
                            {
                                event.preventDefault();
                                $('#targetLayerFront').hide();
                                $(this).ajaxSubmit({
                                target: '#targetLayerFront',
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
                                    $('#targetLayerFront').show();
                                },
                                resetForm: true
                                });
                            }
                            return false;
                        });
                        $('#uploadPrictureBack').submit(function(event){
                            event.preventDefault();
                            if($('#picture_back').val())
                            {
                                event.preventDefault();
                                $('#targetLayerBack').hide();
                                $(this).ajaxSubmit({
                                target: '#targetLayerBack',
                                beforeSubmit:function(){
                                    $('.p_back').width('50%');
                                },
                                uploadProgress: function(event, position, total, percentageComplete)
                                {
                                    $('.p_back').animate({
                                    width: percentageComplete + '%'
                                    }, {
                                    duration: 1000
                                    });
                                },
                                success:function(){
                                    $('#targetLayerBack').show();
                                },
                                resetForm: true
                                });
                            }
                            return false;
                        });
                    });
                </script>
<?php require_once("footer.php"); ?>