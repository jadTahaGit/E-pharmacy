<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Dashboard - Login</title>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="./dist/css/demo.min.css" rel="stylesheet"/>
    <style>
      .link-secondary:hover{
        cursor: pointer;
      }
      @font-face{
        font-family: "Macloney";
        src: url(static/macloney/Macloney.ttf);
      }

      .logo-font{
        font-family: "Macloney";
      }
    </style>
  </head>
  <body class="antialiased border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
          <div class="container-tight py-4">
            <a align="center" style="text-decoration: none;" href="./index.php">
              <h1 class="logo-font">E-Pharmacy</h1>
            </a>
        <form class="card card-md" name="f" autocomplete="off">
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Admin Login</h2>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="mb-2">
              <label class="form-label">
                Password
              </label>
              <div class="input-group input-group-flat">
                <input id="password" type="password" name="password" class="form-control" placeholder="Password"  autocomplete="off">
                <span class="input-group-text">
                  <a id="eyepass" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                  </a>
                </span>
              </div>
            </div>
            <div id="err" class="alert alert-danger" role="alert">
              <h4 class="alert-title">Something went wrong...</h4>
              <div class="text-muted"></div>
            </div>
            <div class="form-footer">
              <button type="submit" id="login" class="btn btn-primary w-100">Sign in</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js"></script>
    <script src="./dist/js/jquery.min.js"></script>
    <script>
      document.getElementById("err").style.display = "none";
      $(document).ready(function(){
        $("#eyepass").click(function(){
          var type = $("#password").attr('type');
          if(type == "password")
            $('.card').find('#password').prop({type:"text"});
          else
            $('.card').find('#password').prop({type:"password"});
        });
        $("#login").click(function(event){
          document.getElementById("err").style.display = "none";
          $('.text-muted').empty();
          event.preventDefault();
          var email = document.f.email.value;
          var password = document.f.password.value;

          if(email == "" || password == "")
          {
            document.getElementById("err").style.display = "grid";
            $(".text-muted").append("Email or password fields are empty.");
          }
          else
          {
            $.ajax(
            {
              url:'../ajax/AdminLogin.php',
              method:'POST',
              data:{
                email: email,
                password: password
              },
              success: function (strMessage)
              {
                if(strMessage == "success")
                {
                  location.replace("index.php");
                }
                else
                {
                  document.getElementById("err").style.display = "grid";
                  $(".text-muted").append(strMessage);
                }
              },
              dataType:'text'
            });
          }
        });
      });
    </script>
  </body>
</html>