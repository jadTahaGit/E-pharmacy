<?php require_once("header.php"); ?>
  <script>
  $(document).ready(function(){
    $(".page-title").append("Home");
    document.getElementById("charts").style.display = "none";
  });
  </script>
  <div class="page-body">
    <div class="container-xl">
      <div id="skeleton" class="row row-cards"> 
        <div class="col-lg-6 col-sm-12">
          <div class="card">
            <div class="ratio ratio-21x9 card-img-top">
              <div class="skeleton-image"></div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-sm-12">
          <div class="card">
            <div class="ratio ratio-21x9 card-img-top">
              <div class="skeleton-image"></div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="skeleton-heading"></div>
              <div class="skeleton-line"></div>
              <div class="skeleton-line"></div>
            </div>
          </div>
        </div>
      </div>
      <div id="charts" class="row row-deck row-cards">
        <div class="col-sm-6 col-lg-6">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="subheader">Revenue</div>
                <div class="subheader ms-auto lh-1">
                  Last 30 days
                </div>
              </div>
              <div class="d-flex align-items-baseline">
                <div id="total_revenue" class="h1 mb-0 me-2"></div>
              </div>
            </div>
            <div id="chart-revenue-bg" class="chart-sm"></div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-6">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="subheader">New users</div>
                <div class="subheader ms-auto lh-1">
                  Last 30 days
                </div>
              </div>
              <div class="d-flex align-items-baseline">
                <div id="all_new_users" class="h1 mb-3 me-2"></div>
              </div>
              <div id="chart-active-users" class="chart-sm"></div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="d-flex">
                <h3 class="card-title">Orders</h3>
                <div class="subheader ms-auto lh-1">
                  Last 30 days
                </div>
              </div>
              <div id="chart-social-referrals"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php require_once("footer.php"); ?>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
        $.ajax(
        {
            url:'../ajax/GetChartRevenue.php',
            method:'POST',
            success: function (ChartJSONData)
            {
              document.getElementById("total_revenue").innerHTML = "$"+ChartJSONData.total;
              window.ApexCharts && (new ApexCharts(document.getElementById('chart-revenue-bg'), {
              chart: {
                type: "area",
                fontFamily: 'inherit',
                height: 40.0,
                sparkline: {
                  enabled: true
                },
                animations: {
                  enabled: false
                },
              },
              dataLabels: {
                enabled: false,
              },
              fill: {
                opacity: .16,
                type: 'solid'
              },
              stroke: {
                width: 2,
                lineCap: "round",
                curve: "smooth",
              },
              series: [{
                name: "Amount",
                data: ChartJSONData.amount,
              }],
              grid: {
                strokeDashArray: 4,
              },
              xaxis: {
                labels: {
                  padding: 0,
                },
                tooltip: {
                  enabled: false
                },
                axisBorder: {
                  show: false,
                },
                type: 'datetime',
              },
              yaxis: {
                labels: {
                  padding: 4
                },
              },
              labels: ChartJSONData.dates,
              colors: ["#206bc4"],
              legend: {
                show: false,
              },
            })).render();
            },
            dataType:'JSON'
        });
        $.ajax(
        {
            url:'../ajax/GetChartNewUser.php',
            method:'POST',
            success: function (ChartJSONData)
            {
              document.getElementById("all_new_users").innerHTML = ChartJSONData.count;
              window.ApexCharts && (new ApexCharts(document.getElementById('chart-active-users'), {
              chart: {
                type: "bar",
                fontFamily: 'inherit',
                height: 40.0,
                sparkline: {
                  enabled: true
                },
                animations: {
                  enabled: false
                },
              },
              plotOptions: {
                bar: {
                  columnWidth: '70%',
                }
              },
              dataLabels: {
                enabled: false,
              },
              fill: {
                opacity: 1,
              },
              series: [{
                name: "Users",
                data: ChartJSONData.users
              }],
              grid: {
                strokeDashArray: 4,
              },
              xaxis: {
                labels: {
                  padding: 0,
                },
                tooltip: {
                  enabled: false
                },
                axisBorder: {
                  show: false,
                },
                type: 'datetime',
              },
              yaxis: {
                labels: {
                  padding: 4
                },
              },
              labels: ChartJSONData.dates,
              colors: ["#206bc4"],
              legend: {
                show: false,
              },
            })).render();
            },
            dataType:'JSON'
        });
        $.ajax(
        {
            url:'../ajax/GetChartOrders.php',
            method:'POST',
            success: function (ChartJSONData)
            {
              window.ApexCharts && (new ApexCharts(document.getElementById('chart-social-referrals'), {
              chart: {
                type: "line",
                fontFamily: 'inherit',
                height: 192,
                parentHeightOffset: 0,
                toolbar: {
                  show: false,
                },
                animations: {
                  enabled: false
                },
              },
              fill: {
                opacity: 1,
              },
              stroke: {
                width: 2,
                lineCap: "round",
                curve: "smooth",
              },
              series: [{
                name: "Pharmacy",
                data: ChartJSONData.pharmacy
              },{
                name: "Parapharmacy",
                data: ChartJSONData.parapharmacy
              }],
              grid: {
                padding: {
                  top: -20,
                  right: 0,
                  left: -4,
                  bottom: -4
                },
                strokeDashArray: 4,
                xaxis: {
                  lines: {
                    show: true
                  }
                },
              },
              xaxis: {
                labels: {
                  padding: 0,
                },
                tooltip: {
                  enabled: false
                },
                type: 'datetime',
              },
              yaxis: {
                labels: {
                  padding: 4
                },
              },
              labels: ChartJSONData.dates,
              colors: ["#3b5998", "#1da1f2", "#ea4c89"],
              legend: {
                show: true,
                position: 'bottom',
                offsetY: 12,
                markers: {
                  width: 10,
                  height: 10,
                  radius: 100,
                },
                itemMargin: {
                  horizontal: 8,
                  vertical: 8
                },
              },
            })).render();
            document.getElementById("skeleton").style.display = "none";
            document.getElementById("charts").style.display = "flex";

            },
            dataType:'JSON'
        });
      });
      // @formatter:on
    </script>