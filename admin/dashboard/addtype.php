<?php require_once("header.php"); ?>
<?php
    if($ant == "false")
        die("<script>window.location.replace('index.php');</script>");
?>
    <script>
    $(document).ready(function(){
        document.getElementById("err").style.display = "none";
        document.getElementById("success").style.display = "none";
        document.getElementById("category").disabled = "true";
        $(".page-title").append("Add New Type");

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
            },
            dataType: 'text'
        });

        $("#pharmacy").change(function(){
            var phar = document.f.pharmacy.value;
            $('#category').empty();
            $('#category').prop("disabled", true);
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
                },
                dataType: 'text'
            });
        });

        $("#btn_add").click(function(event){
          document.getElementById("err").style.display = "none";
          document.getElementById("success").style.display = "none";
          $('.text-muted-err').empty();
          event.preventDefault();
          var pharmacy = document.f.pharmacy.value;
          var category = document.f.category.value;
          var name = document.f.name.value;
          var description = document.f.description.value;

          if(name == "" || description == "")
          {
            document.getElementById("err").style.display = "contents";
            $(".text-muted-err").append("All fields are required.");
          }
          else
          {
            $.ajax(
            {
                url:'../ajax/AddNewType.php',
                method:'POST',
                data:{
                    category: category,
                    name: name,
                    description: description,
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
                        <form name="f">
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
                                <th class="col-2">Type Name</th>
                                <td class="col-10"><input type="text" name="name" class="form-control" placeholder="Type Name" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <th class="col-2">Type's Description</th>
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
                                        <div class="text-muted">Type Successfully Added</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" colspan="2"><input type="button" name="btn_add" id="btn_add" class="btn btn-primary" value="Add Type"></td>
                            </tr>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once("footer.php"); ?>