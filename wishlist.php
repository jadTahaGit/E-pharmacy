<?php require_once("header.php"); ?>
<script>
    $(document).ready(function(){
        $.ajax(
        {
            url:'admin/ajax/GetWishList.php',
            method:'POST',
            success: function (strMessage)
            {
                $("#Medecines").append(strMessage);
            },
            dataType:'text'
        });
    });
</script>
        <div class="container" >
            <div class="row" id="search_manu" style="margin-top: 10px">
                <div class="col-md-6 col-xs-12">
                    <form  name="quick_find">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" placeholder="Enter search keywords here" class="form-control input-lg" id="inputGroup"/>
                                <span class="input-group-addon">
                                    <a href="#" style="color:white">Search</a>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 col-xs-12">

                    <form  name="manufacturers"> 
                        <div class="form-group">
                            <div class="">
                                <select id="manufacture" style="font-size: 14px; background: #EAEAEA; border: none;cursor: pointer;" name="manufacturers_id"  size="1" class="input-lg form-control arrow-hide date_class">
                                    <option value="1" selected="selected">Pharmacy</option>
                                    <option value="2">Parapharmacy</option>
                                </select>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="site_content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-12 left_sidebar1">
                        <div id="left_part">
                            <div class="bs-example">
                                <div class="panel-group" id="accordion">
                                <script>
                                $(document).ready(function(){
                                    var type = 1;
                                    document.getElementById("loader_pharmacy").style.display = "initial";
                                    $.ajax(
                                    {
                                        url:'admin/ajax/GetCategories.php',
                                        method:'POST',
                                        data: {
                                            type: type
                                        },
                                        success: function (strMessage)
                                        {
                                            document.getElementById("loader_pharmacy").style.display = "none";
                                            $("#accordion").append(strMessage);
                                        },
                                        dataType:'text'
                                    });
                                    $('#manufacture').on('change', function() {
                                        $("#accordion").empty();
                                        document.getElementById("loader_pharmacy").style.display = "initial";
                                        $.ajax(
                                        {
                                            url:'admin/ajax/GetCategories.php',
                                            method:'POST',
                                            data: {
                                                type: this.value
                                            },
                                            success: function (strMessage)
                                            {
                                                document.getElementById("loader_pharmacy").style.display = "none";
                                                $("#accordion").append(strMessage);
                                            },
                                            dataType:'text'
                                        });
                                    });
                                });
                                </script>

                                </div>

                            </div>
                        </div>
                        <script>
                            function toggleChevron(e) {
                                $(e.target)
                                        .prev('.panel-heading')
                                        .find("i.indicator")
                                        .toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
                            }
                            $('#accordion').on('hidden.bs.collapse', toggleChevron);
                            $('#accordion').on('shown.bs.collapse', toggleChevron);
                        </script>

                    </div>
                    <div class="col-md-9 col-sm-8 col-xs-12" id="content">            
                        <div class="contentText">
                            
                            <hr>

                            <div id="Medecines" class="row margin-top product-layout_width">
                                
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