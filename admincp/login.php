<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrator Area | Welcome ...</title>
    <meta name="description" content=" ">
    <meta name="keywords" content=" ">
    <meta name="resource-type" content="document" />
    <meta http-equiv="content-type" content="text/html; charset=US-ASCII" />
    <meta http-equiv="content-language" content="en-us" />
    <meta name="author" content=" " />
    <meta name="contact" content=" " />
    <meta name="copyright" content="Copyright (c) All Rights Reserved." />
    <meta name="robots" content="index, nofollow">

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font.css" rel="stylesheet">
    <link href="css/gaya.css" rel="stylesheet">
    <link href="css/font.css" rel="stylesheet">
    <link href="css/responsive-tabs.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="wrapper">
            <div class="box">
              <img src="image/logo.png" class="img-responsive" style="margin-bottom: 15px;">
              <h1>Welcome</h1>
              <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 8%">
                </div>
              </div>
              <!--<p>Ini adalah halaman login Administrator, untuk dapat mengakses fitur fitur yang terdapat pada website silahkan login dengan menggunakan username dan password yang telah diberikan.</p>
              <p>Apabila Anda lupa dengan password Anda, silahkan kirim email ke <a href="mailto:arie.budip@gmail.com">arie.budip@gmail.com</a></p>!-->
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12" id="right-side">
          <div class="wrapper">
            <div class="box">
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <?php
                    if (!empty($_GET['error'])) {
                      if ($_GET['error'] == 1) {
                        echo '<div class="alert alert-warning">Username and Password can not be empty!</div>';
                      } else if ($_GET['error'] == 2) {
                        echo '<div class="alert alert-warning">The Username You Wrong Feedback!</div>';
                      } else if ($_GET['error'] == 3) {
                        echo '<div class="alert alert-warning">The Password You Wrong Feedback!</div>';
                      } else if ($_GET['error'] == 4) {
                        echo '<div class="alert alert-warning">Maaf Status Keanggotaan Anda Belum Aktif!</div>';
                      } else if ($_GET['error'] == 5) {
                        echo '<div class="alert alert-warning">Another user has logged in with your User ID!</div>';
                      }
                    }
                  ?>
                  <form role="form" name="login" class="form-group" action="login-proses.php" method="POST">
                    <div class="input-group">
                      <input type="text" name="user" class="form-control" placeholder="Username">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    </div>
                    <br>
                    <div class="input-group">
                      <input type="password" name="pass" class="form-control" placeholder="Password">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                    </div>
                    <br>
                    <button type="submit" name="doSimpan" class="btn-login" id="doSimpan" value="Login"><i class="fa fa-sign-in"></i>&nbsp; Login </button>
                  </form>
                </div>
              </div>
            </div>
          </div>          
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>