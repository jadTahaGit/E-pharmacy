<?php
  session_start();
  
  if (empty($_SESSION['token'])) {
    if (function_exists('mcrypt_create_iv')) {
        $_SESSION['token'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
    } else {
        $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
    }
  }
  $token = $_SESSION['token'];

  if(isset($_COOKIE['idpharmacyadmin']) && isset($_COOKIE['emailpharmacyadmin']) && isset($_COOKIE['passwordpharmacyadmin']))
  {
    $vm = $_COOKIE['vm'];
    $vp = $_COOKIE['vp'];
    $anm = $_COOKIE['anm'];
    $anp = $_COOKIE['anp'];
    $edm = $_COOKIE['edm'];
    $edp = $_COOKIE['edp'];
    $vc = $_COOKIE['vc'];
    $anc = $_COOKIE['anc'];
    $edc = $_COOKIE['edc'];
    $vt = $_COOKIE['vt'];
    $ant = $_COOKIE['ant'];
    $edt = $_COOKIE['edt'];
    $vo = $_COOKIE['vo'];
    $roo = $_COOKIE['roo'];
    $vpr = $_COOKIE['vpr'];
    $rop = $_COOKIE['rop'];
    $vs = $_COOKIE['vs'];
    $esd = $_COOKIE['esd'];
    $vcm = $_COOKIE['vcm'];
    $rom = $_COOKIE['rom'];
    $vcl = $_COOKIE['vcl'];
    $dcl = $_COOKIE['dcl'];
    $vws = $_COOKIE['vws'];
    $ews = $_COOKIE['ews'];
    $snl = $_COOKIE['snl'];
  }
  else
  {
    $vm = "false";
    $vp = "false";
    $anm = "false";
    $anp = "false";
    $edm = "false";
    $edp = "false";
    $vc = "false";
    $anc = "false";
    $edc = "false";
    $vt = "false";
    $ant = "false";
    $edt = "false";
    $vo = "false";
    $roo = "false";
    $vpr = "false";
    $rop = "false";
    $vs = "false";
    $esd = "false";
    $vcm = "false";
    $rom = "false";
    $vcl = "false";
    $dcl = "false";
    $vws = "false";
    $ews = "false";
    $snl = "false";
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="csrf-token" content="<?php echo $token ?>">
    <title>Dashboard</title>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="./dist/css/demo.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="./dist/datatables/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="./dist/datatables/dataTables.bootstrap4.min.css"/>
    <!-- Scripts -->
    <script src="./dist/js/jquery.min.js"></script>
    <script src="./dist/js/jquery.form.js"></script>
    <script type="text/javascript" src="./dist/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="./dist/datatables/dataTables.bootstrap4.min.js"></script>
    <style>
      @font-face{
        font-family: "Macloney";
        src: url(static/macloney/Macloney.ttf);
      }

      .logo-font{
        font-family: "Macloney";
      }
    </style>
  </head>
  <body class="antialiased">
    <script>
      const csrf_token = $('meta[name="csrf-token"]').attr('content');

      function csrfSafeMethod(method) {
          // these HTTP methods do not require CSRF protection
          return (/^(GET|HEAD|OPTIONS)$/.test(method));
      }

      $.ajaxSetup({
          beforeSend: function(xhr, settings) {
              if (!csrfSafeMethod(settings.type) && !this.crossDomain) {
                  xhr.setRequestHeader("anti-csrf-token", csrf_token);
              }
          }
      });

      $(document).ready(function(){
        $.ajax({
          url: '../ajax/GetAdminLoggedInStatus.php',
          method: 'POST',
          success: function(strMessage)
          {
            if(strMessage == 'false')
              location.replace('login.php');
          },
          dataType: 'text'
        });
        $.ajax({
          url: '../ajax/GetAdminNotifications.php',
          method: 'POST',
          success: function(strMessage)
          {
            $('.notifications').append(strMessage);
            $('.bell_not').click(function(){
              document.getElementById("badge-lap").style.display = "none";
              document.getElementById("badge-ipad").style.display = "none";
              document.getElementById("badge-phone").style.display = "none";
              $.ajax({
                url: '../ajax/SetNotificationsRead.php',
                method: 'POST',
                success: function(strMessage)
                {
                  
                },
                dataType: 'text'
              });
            });
          },
          dataType: 'text'
        });
        $.ajax({
        url: '../ajax/GetIfNotifications.php',
        method: 'POST',
        success: function(strMessage)
        {
          if(strMessage == "yes")
          {
            document.getElementById("badge-lap").style.display = "inline-block";
            document.getElementById("badge-ipad").style.display = "inline-block";
            document.getElementById("badge-phone").style.display = "inline-block";
          }
          else
          {
            document.getElementById("badge-lap").style.display = "none";
            document.getElementById("badge-ipad").style.display = "none";
            document.getElementById("badge-phone").style.display = "none";
          }
        },
        dataType: 'text'
      });
      });
    </script>
    <div class="wrapper">
      <aside class="navbar navbar-vertical navbar-expand-lg navbar-transparent">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark">
            <a style="text-decoration: none;" href="./index.php">
              <!-- <img src="./static/logo.png" width="110" height="32" alt="Tabler" class="navbar-brand-image"> -->
              <h2 class="logo-font">E-Pharmacy</h2>
            </a>
          </h1>
          <div class="navbar-nav flex-row d-lg-none">
            <div class="nav-item dropdown d-none d-md-flex me-3">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                <span id="badge-ipad" class="badge bg-red" style="display: none;"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-card">
                <div class="card">
                  <div class="card-body notifications">
                  </div>
                </div>
              </div>
            </div>
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                <span id="badge-phone" class="badge bg-red" style="display: none;"></span>
                <div class="d-none d-xl-block ps-2">
                  <div>Notifications</div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-card">
                <div class="card">
                  <div class="card-body notifications">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="navbar-nav pt-lg-3">
              <li class="nav-item">
                <a class="nav-link" href="./index.php" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Home
                  </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="statistics.php" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/chart-infographic -->
	                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="7" cy="7" r="4" /><path d="M7 3v4h4" /><line x1="9" y1="17" x2="9" y2="21" /><line x1="17" y1="14" x2="17" y2="21" /><line x1="13" y1="13" x2="13" y2="21" /><line x1="21" y1="12" x2="21" y2="21" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Statistics
                  </span>
                </a>
              </li>
              <?php
                if($vo == "true")
                {
              ?>
              <li class="nav-item">
                <a class="nav-link" href="orders.php" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/clock -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><polyline points="12 7 12 12 15 15" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Orders
                  </span>
                </a>
              </li>
              <?php
                }
              ?>
              <?php
                if($vpr == "true")
                {
              ?>
              <li class="nav-item">
                <a class="nav-link" href="viewprescriptions.php" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/file-report -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="17" cy="17" r="4" /><path d="M17 13v4h4" /><path d="M12 3v4a1 1 0 0 0 1 1h4" /><path d="M11.5 21h-6.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v2m0 3v4" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Prescriptions
                  </span>
                </a>
              </li>
              <?php
                }
              ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/report-medical -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><rect x="9" y="3" width="6" height="4" rx="2" /><line x1="10" y1="14" x2="14" y2="14" /><line x1="12" y1="12" x2="12" y2="16" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Medecines
                  </span>
                </a>
                <div class="dropdown-menu">
                  <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">   
                      <?php
                        if($vm == "true")
                        {
                      ?>
                      <a class="dropdown-item" href="viewmedecines.php" >
                        View All
                      </a>
                      <?php
                        }
                      ?>
                      <?php
                        if($anm == "true")
                        {
                      ?>
                      <a class="dropdown-item" href="addmedecine.php" >
                        Add New
                      </a>
                      <?php
                        }
                      ?>
                      <?php
                        if($vp == "true")
                        {
                      ?>
                      <a class="dropdown-item" href="viewsales.php" >
                        View Promotions
                      </a>
                      <?php
                        }
                      ?>
                      <?php
                        if($anp == "true")
                        {
                      ?>
                      <a class="dropdown-item" href="addsales.php" >
                        Add New Promotion
                      </a>
                      <?php
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/stack -->
	                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="12 4 4 8 12 12 20 8 12 4" /><polyline points="4 12 12 16 20 12" /><polyline points="4 16 12 20 20 16" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Medecine Types
                  </span>
                </a>
                <div class="dropdown-menu">
                  <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">      
                      <?php
                        if($vt == "true")
                        {
                      ?>
                      <a class="dropdown-item" href="viewtypes.php" >
                        View All
                      </a>
                      <?php
                        }
                      ?>
                      <?php
                        if($ant == "true")
                        {
                      ?>
                      <a class="dropdown-item" href="addtype.php" >
                        Add New
                      </a>
                      <?php
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
	                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" /><line x1="12" y1="12" x2="20" y2="7.5" /><line x1="12" y1="12" x2="12" y2="21" /><line x1="12" y1="12" x2="4" y2="7.5" /><line x1="16" y1="5.25" x2="8" y2="9.75" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Medecine Categories
                  </span>
                </a>
                <div class="dropdown-menu">
                  <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                      <?php
                        if($vc == "true")
                        {
                      ?>
                      <a class="dropdown-item" href="viewcategories.php" >
                        View All
                      </a>
                      <?php
                        }
                      ?>
                      <?php
                        if($anc == "true")
                        {
                      ?>
                      <a class="dropdown-item" href="addcategory.php" >
                        Add New
                      </a>
                      <?php
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </li>
              <?php
                if($vs == "true")
                {
              ?>
              <li class="nav-item">
                <a class="nav-link" href="viewstock.php" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/box -->
	                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" /><line x1="12" y1="12" x2="20" y2="7.5" /><line x1="12" y1="12" x2="12" y2="21" /><line x1="12" y1="12" x2="4" y2="7.5" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Stock
                  </span>
                </a>
              </li>
              <?php
                }
              ?>
              <?php
                if($vcl == "true")
                {
              ?>
              <li class="nav-item">
                <a class="nav-link" href="viewclients.php" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/users -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="7" r="4" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Clients
                  </span>
                </a>
              </li>
              <?php
                }
              ?>
              <?php
                if(isset($_COOKIE['idpharmacyadmin']) && $_COOKIE['idpharmacyadmin'] == "1")
                {
              ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/user-check -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="7" r="4" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 11l2 2l4 -4" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Admins
                  </span>
                </a>
                <div class="dropdown-menu">
                  <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                      <a class="dropdown-item" href="viewadmins.php" >
                        View All
                      </a>
                      <a class="dropdown-item" href="addadmin.php" >
                        Add New
                      </a>
                    </div>
                  </div>
                </div>
              </li>
              <?php
                }
              ?>
              <?php
                if($vcm == "true")
                {
              ?>
              <li class="nav-item">
                <a class="nav-link" href="viewcontacts.php" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/mailbox -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 21v-6.5a3.5 3.5 0 0 0 -7 0v6.5h18v-6a4 4 0 0 0 -4 -4h-10.5" /><path d="M12 11v-8h4l2 2l-2 2h-4" /><path d="M6 15h1" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Contact Messages
                  </span>
                </a>
              </li>
              <?php
                }
              ?>
              <?php
                if($snl == "true")
                {
              ?>
              <li class="nav-item">
                <a class="nav-link" href="newsletters.php" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/writing-sign -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 19c3.333 -2 5 -4 5 -6c0 -3 -1 -3 -2 -3s-2.032 1.085 -2 3c.034 2.048 1.658 2.877 2.5 4c1.5 2 2.5 2.5 3.5 1c.667 -1 1.167 -1.833 1.5 -2.5c1 2.333 2.333 3.5 4 3.5h2.5" /><path d="M20 17v-12c0 -1.121 -.879 -2 -2 -2s-2 .879 -2 2v12l2 2l2 -2z" /><path d="M16 7h4" /></svg>
                  </span>
                  <span class="nav-link-title">
                    News Letters
                  </span>
                </a>
              </li>
              <?php
                }
              ?>
              <?php
                if($vws == "true")
                {
              ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/settings -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><circle cx="12" cy="12" r="3" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Settings
                  </span>
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="aboutsettings.php" >
                     About Us
                  </a>
                  <a class="dropdown-item" href="privacysettings.php" >
                     Privacy Policy
                  </a>
                  <a class="dropdown-item" href="termssettings.php" >
                     Terms & Conditions
                  </a>
                </div>
              </li>
              <?php
                }
              ?>
              <li class="nav-item">
                <a class="nav-link" href="logout.php" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/logout -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" /><path d="M7 12h14l-3 -3m0 6l3 -3" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Logout
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </aside>
      <div class="page-wrapper">
        <div class="container-xl">
          <!-- Page title -->
          <div class="page-header d-print-none">
            <div class="row align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                  Admin Dashboard
                </div>
                <h2 class="page-title">
                  
                </h2>
              </div>
              <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                  <div class="btn-list">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                      <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                      <div class="d-none d-xl-block ps-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                        <span id="badge-lap" style="margin-bottom: 45%;display: none;" class="badge bg-red"></span>
                      </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-card col-lg-2">
                      <div class="card">
                        <div class="card-body notifications">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>