<?php require_once("header.php"); ?>

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
                                    document.getElementById("loader_pharmacy").style.display = "initial";
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
                    <div class="col-md-9 col-sm-8 col-xs-12 right_sidebar1">
                        <div id="right_part">
                            <div class="contentContainer">
                                <div class="contentText">
                                    <div class="breadcrumbs">
                                        <a href="index.php" class="headerNavigation"><i class="fa fa-home"></i></a>			
                                    </div>
                                </div>
                                <!----content_2 For New Products--!-->
                                <div class="contentText">
                                    <h1>Promotions</h1>
                                    <script>
                                        $(document).ready(function(){
                                            var type = 1;
                                            $.ajax(
                                            {
                                                url:'admin/ajax/GetMedecinesPromotions.php',
                                                method:'POST',
                                                data: {
                                                    type: type
                                                },
                                                success: function (strMessage)
                                                {
                                                    $('#Promotions').append(strMessage);
                                                },
                                                dataType:'text'
                                            });
                                            $('#manufacture').on('change', function() {
                                                $("#Promotions").empty();
                                                $.ajax(
                                                {
                                                    url:'admin/ajax/GetMedecinesPromotions.php',
                                                    method:'POST',
                                                    data: {
                                                        type: this.value
                                                    },
                                                    success: function (strMessage)
                                                    {
                                                        $('#Promotions').append(strMessage);
                                                    },
                                                    dataType:'text'
                                                });
                                            });
                                        });
                                    </script>
                                    <div id="Promotions" class="row margin-top product-layout_width">
                                        
                                    </div>
                                </div>
                                <!----content_2 End--!-->
                                <!----slidder start-!-->
                                <div class="contentText">
                                    <div class="infoBoxHeading"><h1>Last Purchased</h1></div>

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                        <script>
                                                    $(document).ready(function(){
                                                        var type = 1;
                                                        $.ajax(
                                                        {
                                                            url:'admin/ajax/GetMedecinesCarousel.php',
                                                            method:'POST',
                                                            data: {
                                                                type: type
                                                            },
                                                            success: function (strMessage)
                                                            {
                                                                $("#owl-ajax").append(strMessage).owlCarousel({
                                                                    loop: true,
                                                                    margin: 10,
                                                                    responsiveClass: true,
                                                                    responsive: {
                                                                        0: {
                                                                            items: 2,
                                                                            nav: true
                                                                        },
                                                                        600: {
                                                                            items: 3,
                                                                            nav: false
                                                                        },
                                                                        1000: {
                                                                            items: 5,
                                                                            nav: true,
                                                                            loop: false,
                                                                            margin: 20
                                                                        }

                                                                    }
                                                                });
                                                            },
                                                            dataType:'text'
                                                        });
                                                        $('#manufacture').on('change', function() {
                                                            $(".bg_best").empty();
                                                            $(".bg_best").append('<div id="owl-ajax" class="owl-carousel"></div>');
                                                            $.ajax(
                                                            {
                                                                url:'admin/ajax/GetMedecinesCarousel.php',
                                                                method:'POST',
                                                                data: {
                                                                    type: this.value
                                                                },
                                                                success: function (strMessage)
                                                                {
                                                                    $("#owl-ajax").append(strMessage).owlCarousel({
                                                                    loop: true,
                                                                    margin: 10,
                                                                    responsiveClass: true,
                                                                    responsive: {
                                                                        0: {
                                                                            items: 2,
                                                                            nav: true
                                                                        },
                                                                        600: {
                                                                            items: 3,
                                                                            nav: false
                                                                        },
                                                                        1000: {
                                                                            items: 5,
                                                                            nav: true,
                                                                            loop: false,
                                                                            margin: 20
                                                                        }

                                                                    }
                                                                });
                                                                },
                                                                dataType:'text'
                                                            });
                                                        });
                                                    });
                                                </script>
                                            <div class="bg_best">
                                                <div id="owl-ajax" class="owl-carousel">
                                                
                                                </div>
                                            </div>
                                            <!--                                    </div>-->
                                        </div>
                                    </div>
                                </div>
                                <!----slidder End-!-->


                                <!----content_2 For New Products--!-->
                                <div class="contentText">
                                    <h1>Most purchased this month (<?php echo date('M') ?>)</h1>
                                    <script>
                                        $(document).ready(function(){
                                            var type = 1;
                                            $.ajax(
                                            {
                                                url:'admin/ajax/GetMedecinesMostPurchased.php',
                                                method:'POST',
                                                data: {
                                                    type: type
                                                },
                                                success: function (strMessage)
                                                {
                                                    $('#MostPurchased').append(strMessage);
                                                },
                                                dataType:'text'
                                            });
                                            $('#manufacture').on('change', function() {
                                                $("#MostPurchased").empty();
                                                $.ajax(
                                                {
                                                    url:'admin/ajax/GetMedecinesMostPurchased.php',
                                                    method:'POST',
                                                    data: {
                                                        type: this.value
                                                    },
                                                    success: function (strMessage)
                                                    {
                                                        $('#MostPurchased').append(strMessage);
                                                    },
                                                    dataType:'text'
                                                });
                                            });
                                        });
                                    </script>
                                    <div id="MostPurchased" class="row margin-top product-layout_width">
                                        
                                    </div>
                                </div>
                                <!----content_2 End--!-->

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