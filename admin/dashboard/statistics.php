<?php require_once("header.php"); ?>
    <script>
        $(document).ready(function(){
            $(".page-title").append("Statistics");
            //document.getElementById("charts").style.display = "none";
        });
    </script>
     <script>
    $(document).ready(function(){
        document.getElementById("category").disabled = "true";
        document.getElementById("type").disabled = "true";
        document.getElementById("medecine").disabled = "true";

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
                            url:'../ajax/GetAllMeds.php',
                            method:'POST',
                            data:{
                                type: type
                            },
                            success: function (strMessage)
                            {
                                $('#medecine').prop('disabled', false);
                                $('#medecine').append(strMessage);
                                $.ajax(
                                {
                                    url:'../ajax/GetChartStatistics.php',
                                    method:'POST',
                                    data:{
                                        id: document.getElementById("medecine").value
                                    },
                                    success: function (ChartJSONData)
                                    {
                                        var options = {
                                            chart: {
                                                height: 400,
                                                type: "heatmap",
                                                toolbar: {
                                                    show: false,
                                                },
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            colors: ["#206bc4", ],
                                            series: ChartJSONData,
                                            xaxis: {
                                                type: "category"
                                            },
                                            legend: {
                                                show: false,
                                            },
                                        };
                                        (new ApexCharts(document.querySelector("#chart-heatmap-basic3"),options)).render();
                                    },
                                    dataType:'JSON'
                                });
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
                                url:'../ajax/GetAllMeds.php',
                                method:'POST',
                                data:{
                                    type: type
                                },
                                success: function (strMessage)
                                {
                                    $('#medecine').prop('disabled', false);
                                    $('#medecine').append(strMessage);
                                    $.ajax(
                                    {
                                        url:'../ajax/GetChartStatistics.php',
                                        method:'POST',
                                        data:{
                                            id: document.getElementById("medecine").value
                                        },
                                        success: function (ChartJSONData)
                                        {
                                            var options = {
                                                chart: {
                                                    height: 400,
                                                    type: "heatmap",
                                                    toolbar: {
                                                        show: false,
                                                    },
                                                },
                                                dataLabels: {
                                                    enabled: false
                                                },
                                                colors: ["#206bc4", ],
                                                series: ChartJSONData,
                                                xaxis: {
                                                    type: "category"
                                                },
                                                legend: {
                                                    show: false,
                                                },
                                            };
                                            (new ApexCharts(document.querySelector("#chart-heatmap-basic3"),options)).render();
                                        },
                                        dataType:'JSON'
                                    });
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
                        url:'../ajax/GetAllMeds.php',
                        method:'POST',
                        data:{
                            type: type
                        },
                        success: function (strMessage)
                        {
                            $('#medecine').prop('disabled', false);
                            $('#medecine').append(strMessage);
                            $.ajax(
                            {
                                url:'../ajax/GetChartStatistics.php',
                                method:'POST',
                                data:{
                                    id: document.getElementById("medecine").value
                                },
                                success: function (ChartJSONData)
                                {
                                    var options = {
                                        chart: {
                                            height: 400,
                                            type: "heatmap",
                                            toolbar: {
                                                show: false,
                                            },
                                        },
                                        dataLabels: {
                                            enabled: false
                                        },
                                        colors: ["#206bc4", ],
                                        series: ChartJSONData,
                                        xaxis: {
                                            type: "category"
                                        },
                                        legend: {
                                            show: false,
                                        },
                                    };
                                    (new ApexCharts(document.querySelector("#chart-heatmap-basic3"),options)).render();
                                },
                                dataType:'JSON'
                            });
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
                url:'../ajax/GetAllMeds.php',
                method:'POST',
                data:{
                    type: type
                },
                success: function (strMessage)
                {
                    $('#medecine').prop('disabled', false);
                    $('#medecine').append(strMessage);
                    $.ajax(
                    {
                        url:'../ajax/GetChartStatistics.php',
                        method:'POST',
                        data:{
                            id: document.getElementById("medecine").value
                        },
                        success: function (ChartJSONData)
                        {
                            var options = {
                                chart: {
                                    height: 400,
                                    type: "heatmap",
                                    toolbar: {
                                        show: false,
                                    },
                                },
                                dataLabels: {
                                    enabled: false
                                },
                                colors: ["#206bc4", ],
                                series: ChartJSONData,
                                xaxis: {
                                    type: "category"
                                },
                                legend: {
                                    show: false,
                                },
                            };
                            (new ApexCharts(document.querySelector("#chart-heatmap-basic3"),options)).render();
                        },
                        dataType:'JSON'
                    });
                },
                dataType: 'text'
            });
        });
        $("#medecine").change(function(){
            $.ajax(
            {
                url:'../ajax/GetChartStatistics.php',
                method:'POST',
                data:{
                    id: document.getElementById("medecine").value
                },
                success: function (ChartJSONData)
                {
                    var options = {
                        chart: {
                            height: 400,
                            type: "heatmap",
                            toolbar: {
                                show: false,
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        colors: ["#206bc4", ],
                        series: ChartJSONData,
                        xaxis: {
                            type: "category"
                        },
                        legend: {
                            show: false,
                        },
                    };
                    (new ApexCharts(document.querySelector("#chart-heatmap-basic3"),options)).render();
                },
                dataType:'JSON'
            });
        });
    });
    </script>
    <div id="chart-1" class="page-body">
        <div class="container-xl">
        <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Revenue ($) per each day of this year (<?php echo date("Y") ?>)</h3>
                    <div id="chart-heatmap-basic"></div>
                </div>
            </div>
            <script>
             document.addEventListener("DOMContentLoaded", function () {
                $.ajax(
                {
                    url:'../ajax/GetChartStatisticsRevenue.php',
                    method:'POST',
                    success: function (ChartJSONData)
                    {
                        var options = {
                            chart: {
                                height: 400,
                                type: "heatmap",
                                toolbar: {
                                    show: false,
                                },
                            },
                            dataLabels: {
                                enabled: false
                            },
                            colors: ["#206bc4", ],
                            series: ChartJSONData,
                            xaxis: {
                                type: "category"
                            },
                            legend: {
                                show: false,
                            },
                        };
                        (new ApexCharts(document.querySelector("#chart-heatmap-basic"),options)).render();
                    },
                    dataType:'JSON'
                });
            });
            </script>
        </div>
    </div>
    <div id="chart-2" class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Quantity of medicines sold out each day of this year (<?php echo date("Y") ?>)</h3>
                    <div id="chart-heatmap-basic2"></div>
                </div>
            </div>
            <script>
             document.addEventListener("DOMContentLoaded", function () {
                $.ajax(
                {
                    url:'../ajax/GetChartStatisticsQuantity.php',
                    method:'POST',
                    success: function (ChartJSONData)
                    {
                        var options = {
                            chart: {
                                height: 400,
                                type: "heatmap",
                                toolbar: {
                                    show: false,
                                },
                            },
                            dataLabels: {
                                enabled: false
                            },
                            colors: ["#206bc4", ],
                            series: ChartJSONData,
                            xaxis: {
                                type: "category"
                            },
                            legend: {
                                show: false,
                            },
                        };
                        (new ApexCharts(document.querySelector("#chart-heatmap-basic2"),options)).render();
                    },
                    dataType:'JSON'
                });
            });
            </script>
        </div>
    </div>
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
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Quantity sold out each day of this year (<?php echo date("Y") ?>)</h3>
                    <div id="chart-heatmap-basic3"></div>
                </div>
            </div>
        </div>
    </div>
<?php require_once("footer.php"); ?>

<?php
/*
[
                    { name: "Jan", data: [{x: '1', y: 23},{x: '2', y: 14},{x: '3', y: 24},{x: '4', y: 90},{x: '5', y: 99},{x: '6', y: 28},{x: '7', y: 51},{x: '8', y: 51},{x: '9', y: 98},{x: '10', y: 61},{x: '11', y: 14},{x: '12', y: 51},{x: '13', y: 32},{x: '14', y: 84},{x: '15', y: 9},{x: '16', y: 2},] },
                    { name: "Feb", data: [{x: '1', y: 82},{x: '2', y: 87},{x: '3', y: 48},{x: '4', y: 15},{x: '5', y: 21},{x: '6', y: 23},{x: '7', y: 80},{x: '8', y: 34},{x: '9', y: 46},{x: '10', y: 8},{x: '11', y: 87},{x: '12', y: 80},{x: '13', y: 23},{x: '14', y: 81},{x: '15', y: 24},{x: '16', y: 51},] },
                    { name: "Mar", data: [{x: '1', y: 100},{x: '2', y: 52},{x: '3', y: 57},{x: '4', y: 80},{x: '5', y: 14},{x: '6', y: 82},{x: '7', y: 78},{x: '8', y: 16},{x: '9', y: 29},{x: '10', y: 97},{x: '11', y: 52},{x: '12', y: 78},{x: '13', y: 47},{x: '14', y: 10},{x: '15', y: 61},{x: '16', y: 34},] },
                    { name: "Apr", data: [{x: '1', y: 60},{x: '2', y: 33},{x: '3', y: 42},{x: '4', y: 20},{x: '5', y: 87},{x: '6', y: 100},{x: '7', y: 100},{x: '8', y: 16},{x: '9', y: 57},{x: '10', y: 80},{x: '11', y: 33},{x: '12', y: 100},{x: '13', y: 6},{x: '14', y: 51},{x: '15', y: 35},{x: '16', y: 16},] },
                    { name: "May", data: [{x: '1', y: 91},{x: '2', y: 81},{x: '3', y: 54},{x: '4', y: 98},{x: '5', y: 52},{x: '6', y: 60},{x: '7', y: 61},{x: '8', y: 99},{x: '9', y: 91},{x: '10', y: 36},{x: '11', y: 81},{x: '12', y: 61},{x: '13', y: 99},{x: '14', y: 80},{x: '15', y: 72},{x: '16', y: 16},] },
                    { name: "Jun", data: [{x: '1', y: 77},{x: '2', y: 99},{x: '3', y: 64},{x: '4', y: 0},{x: '5', y: 33},{x: '6', y: 91},{x: '7', y: 7},{x: '8', y: 51},{x: '9', y: 3},{x: '10', y: 28},{x: '11', y: 99},{x: '12', y: 7},{x: '13', y: 21},{x: '14', y: 78},{x: '15', y: 19},{x: '16', y: 99},] },
                    { name: "Jul", data: [{x: '1', y: 67},{x: '2', y: 84},{x: '3', y: 90},{x: '4', y: 4},{x: '5', y: 81},{x: '6', y: 77},{x: '7', y: 3},{x: '8', y: 39},{x: '9', y: 24},{x: '10', y: 23},{x: '11', y: 84},{x: '12', y: 3},{x: '13', y: 14},{x: '14', y: 100},{x: '15', y: 98},{x: '16', y: 51},] },
                    { name: "Aug", data: [{x: '1', y: 56},{x: '2', y: 81},{x: '3', y: 45},{x: '4', y: 37},{x: '5', y: 99},{x: '6', y: 67},{x: '7', y: 9},{x: '8', y: 90},{x: '9', y: 48},{x: '10', y: 82},{x: '11', y: 81},{x: '12', y: 9},{x: '13', y: 87},{x: '14', y: 61},{x: '15', y: 32},{x: '16', y: 39},] },
                    { name: "Sep", data: [{x: '1', y: 17},{x: '2', y: 10},{x: '3', y: 59},{x: '4', y: 67},{x: '5', y: 84},{x: '6', y: 56},{x: '7', y: 24},{x: '8', y: 15},{x: '9', y: 57},{x: '10', y: 100},{x: '11', y: 10},{x: '12', y: 24},{x: '13', y: 52},{x: '14', y: 7},{x: '15', y: 82},{x: '16', y: 90},] },
                    { name: "Oct", data: [{x: '1', y: 41},{x: '2', y: 51},{x: '3', y: 79},{x: '4', y: 60},{x: '5', y: 81},{x: '6', y: 17},{x: '7', y: 61},{x: '8', y: 80},{x: '9', y: 42},{x: '10', y: 60},{x: '11', y: 51},{x: '12', y: 61},{x: '13', y: 33},{x: '14', y: 3},{x: '15', y: 53},{x: '16', y: 15},] },
                    { name: "Nov", data: [{x: '1', y: 90},{x: '2', y: 80},{x: '3', y: 30},{x: '4', y: 74},{x: '5', y: 10},{x: '6', y: 41},{x: '7', y: 35},{x: '8', y: 20},{x: '9', y: 54},{x: '10', y: 91},{x: '11', y: 80},{x: '12', y: 35},{x: '13', y: 81},{x: '14', y: 9},{x: '15', y: 12},{x: '16', y: 80},] },
                    { name: "Dec", data: [{x: '1', y: 54},{x: '2', y: 78},{x: '3', y: 42},{x: '4', y: 76},{x: '5', y: 51},{x: '6', y: 90},{x: '7', y: 72},{x: '8', y: 98},{x: '9', y: 64},{x: '10', y: 77},{x: '11', y: 78},{x: '12', y: 72},{x: '13', y: 99},{x: '14', y: 24},{x: '15', y: 10},{x: '16', y: 20},] },
                ]
*/
?>