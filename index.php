<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>System Information E-life Solutions Plt</title><link rel="shortcut icon" href="/image/Icon.ico"/>
    <meta name="description" content=" ">
    <meta name="keywords" content=" ">
    <meta name="resource-type" content="document" />
    <meta http-equiv="content-type" content="text/html; charset=US-ASCII" />
    <meta http-equiv="content-language" content="en-us" />
    <meta name="author" content="LINGGA ADI PRATAMA" />
    <meta name="contact" content="linggaadi4nd@gmail.com" />
    <meta name="copyright" content="Copyright (c) elife-solutions.com. All Rights Reserved." />
    <meta name="robots" content="index, nofollow">

    <link rel="stylesheet" type="text/css" href="plugins/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="plugins/slick/slick-theme.css">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <style>
        ul{
            padding-left:5px !important;
        }
        li{
            padding:3px 5px;
        }

        .slick-prev:before,
        .slick-next:before {
          color: black;
        }
        .slider div img{
            border:1px solid gray;
            margin:auto;
            max-width:inherit;
            max-height:inherit;
        }
        .slider div{
            max-height:inherit;
        }
        .navbar, .navbar a{
            color:white;
        }
        footer li{
            list-style: none;
        }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="js/jquery-1.11.0.min.js"></script>
  </head>
  <body class="skin-black">


    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style='background-color:#7cde5e;color:white;min-height: unset; margin-bottom: unset;'>
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><span class='fa fa-phone'></span> Call us : +6011-3730-9500</li>
                <li><font-color:black><span><a href="mailto:info@elife-solutions.com" style="color: white"><span class='fa fa-envelope-o'></span> info@polibatam.ac.id</a></span></li></font>
              </ul>

              <ul class="nav navbar-nav navbar-right">
                <li><span><a href="admincp">Login</a></span></li>
              </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class='container-fluid;' style='border-bottom:1px solid gray;padding:10px;'>
        <a href="#"><img src='image/LogoMain.png'style="width:190px;height:100px;"></a>
    </div>

  	<section class="regular slider" style='width:90%;margin:auto;max-height:500px;'>
    <?php
    $dir_file = "upload/slides/";
    if (is_dir($dir_file) and $dh = opendir($dir_file)) {
        while (($file = readdir($dh))!==false) {
            $fileinfo = pathinfo($file);
            $ext = $fileinfo['extension'];
            // $dir_file.$file;
            if (getImageSize($dir_file.$file)) {
                ?>
                <div>
                  <img src="<?=$dir_file.$file?>">
                </div>
                <?php
            }
        }
        closedir($dh);
    }
    ?>
  </section>

  <footer class='container-fluid' style='background-color:#333;min-height:100px;margin-top:50px;color:white;'>

        <div class='col col-md-4' style='font-size:16px;'>
            <img src='image/LogoMain.png' style='width: 190px;margin-top: 45px;height:100px;'>
            <p></p><?=$data['content']?></p>
        </div>
        <div class='col col-md-4' style='font-size:18px;margin-top:40px;'>
            <h3 style='color:#7cde5e;font-weight:bold;'>Info</h3>
            <ul>
                <li><a href="http://elife-solutions.com/shams/website" style="color: white">Public</li></a>
                <li><a href="http://elife-solutions.com/shams/website" style="color: white">Smart Hospital Asset Management System</li></a>
                <li><a href="http://www.myhealth-screening.com/" style="color: white">My Health Screening </li></a>
            </ul>
        </div>
        <div class='col col-md-4' style='font-size:18px;margin-top:40px;'>
            <h3 style='color:#7cde5e;font-weight:bold;'>Contact Us</h3>
            <ul>
                <li>V01 Block B Level 2
Faculty of Bioscience and Medical Engineering
Universiti Teknologi Malaysia
81310 Johor Bahru, Johor, Malaysia</li>
                <li><span class='fa fa-phone-square'></span> Phone : +607-5558548</li>
                <li><span class='fa fa-phone-square'></span> Mobile : +6011-3730-9500</li>
                <li><span class='fa fa-envelope-o'></span><a href="mailto:info@elife-solutions.com" style="color: white"> info@polibatam.ac.id</li></a>
                <li style='margin-top:10px;'>Follow us</li>
                <li style='font-size:36px'>
                    <i class='fa fa-facebook-square'><a href="https://www.facebook.com/elifesolutionsplt target="_blank"></i></a>
                    <i class='fa fa-pinterest-square'></i>
                    <i class='fa fa-twitter-square'></i>
                    <i class='fa fa-google-plus-square'></i>
                </li>
            </ul>
        </div>
    </div>
  </footer>
  <footer style='background-color:#181818;color:#c3cddb;text-align:center;padding:10px 0 0 0;'>
        Copyright © <?=date('Y')?>  <font color=green; font-size='14px;'><a href="http://elife-solutions.com" style='color: #7cde5e'>  E-Life Solutions Plt</font></a>
  </footer>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
  <script src="plugins/slick/slick.js" type="text/javascript" charset="utf-8"></script>
    <script >
    $(".regular").slick({
        dots: true,
        infinite: true,
        centerMode: true,
        //centerPadding: '20px',
        //slidesToShow: 1,
        //slidesToScroll: 1,
        adaptiveHeight: true
      });

</script>
  </body>
</html>
