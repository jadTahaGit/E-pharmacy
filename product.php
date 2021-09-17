<?php require_once("header.php"); ?>
<script>
    var view = "grid";
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const categ = urlParams.get('category');
    $(document).ready(function(){
        document.getElementById("loader_pharmacy").style.display = "initial";
        $.ajax(
        {
            url:'admin/ajax/GetCategoryTypeInfo.php',
            method:'POST',
            data: {
                id: categ
            },
            success: function (strMessage)
            {
                document.getElementById("loader_pharmacy").style.display = "none";
                $(".contentText").prepend(strMessage);
            },
            dataType:'text'
        });
        var sort = document.getElementById("input-sort").value;
        var limit = document.getElementById("input-limit").value;
        var offset = 0;
        $.ajax(
        {
            url:'admin/ajax/GetMedecinesGridView.php',
            method:'POST',
            data: {
                id: categ,
                sort: sort,
                limit: limit,
                offset: offset
            },
            success: function (strMessage)
            {
                $("#Medecines").prepend(strMessage);
            },
            dataType:'text'
        });
        $("#grid-view").click(function(){
            view = "grid";
            var sort = document.getElementById("input-sort").value;
            var limit = document.getElementById("input-limit").value;
            document.getElementById("loader_pharmacy").style.display = "initial";
            var offset = 0;
            $("#Medecines").empty();
            $.ajax(
            {
                url:'admin/ajax/GetMedecinesGridView.php',
                method:'POST',
                data: {
                    id: categ,
                    sort: sort,
                    limit: limit,
                    offset: offset
                },
                success: function (strMessage)
                {
                    document.getElementById("loader_pharmacy").style.display = "none";
                    $("#Medecines").prepend(strMessage);
                },
                dataType:'text'
            });
        });
        $("#list-view").click(function(){
            view = "list";
            var sort = document.getElementById("input-sort").value;
            var limit = document.getElementById("input-limit").value;
            var offset = 0;
            document.getElementById("loader_pharmacy").style.display = "initial";
            $("#Medecines").empty();
            $.ajax(
            {
                url:'admin/ajax/GetMedecinesListView.php',
                method:'POST',
                data: {
                    id: categ,
                    sort: sort,
                    limit: limit,
                    offset: offset
                },
                success: function (strMessage)
                {
                    document.getElementById("loader_pharmacy").style.display = "none";
                    $("#Medecines").prepend(strMessage);
                },
                dataType:'text'
            });
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
                                    $.ajax(
                                    {
                                        url:'admin/ajax/GetCategories.php',
                                        method:'POST',
                                        data: {
                                            type: type
                                        },
                                        success: function (strMessage)
                                        {
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
                                    $('#input-sort, #input-limit').on('change', function() {
                                        var view_url = "";
                                        var sort = document.getElementById("input-sort").value;
                                        var limit = document.getElementById("input-limit").value;
                                        var offset = 0;
                                        if(view == "grid")
                                            view_url = 'admin/ajax/GetMedecinesGridView.php';
                                        else
                                            view_url = 'admin/ajax/GetMedecinesListView.php';
                                        $("#Medecines").empty();
                                        document.getElementById("loader_pharmacy").style.display = "initial";
                                        $.ajax(
                                        {
                                            url: view_url,
                                            method:'POST',
                                            data: {
                                                id: categ,
                                                sort: sort,
                                                limit: limit,
                                                offset: offset
                                            },
                                            success: function (strMessage)
                                            {
                                                document.getElementById("loader_pharmacy").style.display = "none";
                                                $("#Medecines").append(strMessage);
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
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="btn-group hidden-xs">
                                        <button class="btn btn-default" id="list-view"><i class="fa fa-th-list"></i></button>
                                        <button class="btn btn-default" id="grid-view"><i class="fa fa-th"></i></button>
                                    </div>
                                </div>
                                <div class="col-md-2 text-right txt-left">
                                    <label for="input-sort" class="control-label" style="margin-top: 7px">Sort By:</label>
                                </div>
                                <div class="col-md-3 text-right">
                                    <select  class="form-control" id="input-sort">
                                        <option value="1" selected="selected">Name (A - Z)</option>
                                        <option value="2">Name (Z - A)</option>
                                        <option value="3">Price - Lowest</option>
                                        <option value="4">Price - Highest</option>
                                    </select>
                                </div>
                                <div class="col-md-1 text-right txt-left">
                                    <label for="input-limit" class="control-label" style="margin-top: 7px">Show:</label>
                                </div>
                                <div class="col-md-2 text-right">
                                    <select  class="form-control" id="input-limit">
                                        <option value="9" selected="selected">9</option>
                                        <option value="15">15</option>
                                        <option value="30">30</option>
                                        <option value="60">60</option>
                                    </select>
                                </div>
                            </div>

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