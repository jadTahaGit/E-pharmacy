<?php require_once("header.php"); ?>
<script>
    $(document).ready(function(){
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const med = urlParams.get('med');
        $.ajax(
        {
            url:'admin/ajax/GetMedecineInfo.php',
            method:'POST',
            data: {
                id: med
            },
            success: function (strMessage)
            {
                $("#medecine_section").append(strMessage);
                $(".galleryimg").on("click", function () {
                    var src = $(this).attr('src');
                    console.log(src)
                    $(".changeimg").attr('src', src);
                });
            },
            dataType:'text'
        });
        $.ajax(
        {
            url:'admin/ajax/GetRelatedMedecines.php',
            method:'POST',
            data: {
                id: med
            },
            success: function (strMessage)
            {
                //alert(strMessage);
                $(".rel-product").append(strMessage);
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
                                <input type="text" placeholder="Enter search keywords here" class="form-control input-lg" id="search_input" autocomplete="off"/>
                                <span class="input-group-addon">
                                    <button type="button" class="btn btn-primary" onClick="search();">Search</button>
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
                        <div id="medecine_section">
                            
                        </div>
                        <div class="rel-product">
                            
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