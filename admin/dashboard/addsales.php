<?php require_once("header.php"); ?>
<?php
    if($anp == "false")
        die("<script>window.location.replace('index.php');</script>");
?>
    <script>
    $(document).ready(function(){
        document.getElementById("err").style.display = "none";
        document.getElementById("success").style.display = "none";
        document.getElementById("category").disabled = "true";
        document.getElementById("type").disabled = "true";
        document.getElementById("medecine").disabled = "true";
        $(".page-title").append("Add New Promotion");

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
                        var type = document.f.type.value;
                        $.ajax({
                            url:'../ajax/GetAllMedecines.php',
                            method:'POST',
                            data:{
                                type: type
                            },
                            success: function (strMessage)
                            {
                                $('#medecine').prop('disabled', false);
                                $('#medecine').append(strMessage);
                            },
                            dataType: 'text'
                        });
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
            $('#medecine').empty();
            $('#medecine').prop("disabled", true);
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
                            $('#medecine').empty();
                            var type = document.f.type.value;
                            $.ajax({
                                url:'../ajax/GetAllMedecines.php',
                                method:'POST',
                                data:{
                                    type: type
                                },
                                success: function (strMessage)
                                {
                                    $('#medecine').prop('disabled', false);
                                    $('#medecine').append(strMessage);
                                },
                                dataType: 'text'
                            });
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
            $('#medecine').empty();
            $('#medecine').prop("disabled", true);
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
                    $('#medecine').empty();
                    var type = document.f.type.value;
                    $.ajax({
                        url:'../ajax/GetAllMedecines.php',
                        method:'POST',
                        data:{
                            type: type
                        },
                        success: function (strMessage)
                        {
                            $('#medecine').prop('disabled', false);
                            $('#medecine').append(strMessage);
                        },
                        dataType: 'text'
                    });
                },
                dataType: 'text'
            });
        });

        $('#type').change(function(){
            $('#medecine').empty();
            $('#medecine').prop("disabled", true);
            var type = document.f.type.value;
            $.ajax({
                url:'../ajax/GetAllMedecines.php',
                method:'POST',
                data:{
                    type: type
                },
                success: function (strMessage)
                {
                    $('#medecine').prop('disabled', false);
                    $('#medecine').append(strMessage);
                },
                dataType: 'text'
            });
        });

        $("#btn_promote").click(function(event){
          document.getElementById("err").style.display = "none";
          document.getElementById("success").style.display = "none";
          $('.text-muted-err').empty();
          event.preventDefault();
          var medecine = document.f.medecine.value;
          var price = document.f.price.value;

          if(price == "")
          {
            document.getElementById("err").style.display = "contents";
            $(".text-muted-err").append("Please enter the new price.");
          }
          else
          {
            $.ajax(
            {
                url:'../ajax/AddNewPromotion.php',
                method:'POST',
                data:{
                    medecine: medecine,
                    price: price,
                    token: csrf_token
                },
                success: function (strMessage)
                {
                    if(strMessage == "true")
                    {
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
                                <th class="col-2">Medicine Name<br><h5><i>(click to select an option)</i></h5></th>
                                <td class="col-10">
                                    <select id="medecine" name="medecine" class="form-select">
                                        
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-2">Medicine New Price</th>
                                <td class="col-10"><input type="text" name="price" class="form-control" autocomplete="off" placeholder="Medicine new price" onkeydown="return ( event.ctrlKey || event.altKey 
                                            || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                                            || (95<event.keyCode && event.keyCode<106)
                                            || (event.keyCode==8) || (event.keyCode==9) 
                                            || (event.keyCode>34 && event.keyCode<40) 
                                            || (event.keyCode==46) )">
                                </td>
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
                                        <div class="text-muted">Medicine Successfully Added To Promotions.</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" colspan="2"><input type="button" name="btn_promote" id="btn_promote" class="btn btn-primary" value="Promote"></td>
                            </tr>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once("footer.php"); ?>