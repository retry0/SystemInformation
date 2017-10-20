<?php
//meload session
include('session.php');
//submit data  if user level staff in table tb_routine
if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);
    //for assigned for staff or supervisior
    $for = mysqli_real_escape_string($conn, $_POST['for']);

    //if level staff data for staff
    if ($u['level'] != 'staff') {
        if ($for=='staff') {
            $staff = mysqli_real_escape_string($conn, $_POST['staff']);
        } else {
            $staff = $u['user'];
        }
    } else {
        $staff = $u['user'];
    }
    //query data to tb_routine
    $query = "INSERT INTO `tb_routine` (`title`,`description`,`start_date`,`end_date`,`user`)
                    VALUES
                    ('$title','$description', '$start_date','$end_date','".$staff."')";
    $query = mysqli_query($conn, $query) or die(mysqli_error($conn));
    //if data there is greather than zero muncul notifaction 1
    if (mysqli_affected_rows($conn) > 0) {
        header('location:?notif=1');
    } else {
        $_GET['notif'] = 2;//error
    }
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>System Information E-life Solutions Plt</title><link rel="shortcut icon" href="/SystemInformation/image/Icon.ico"/>
  <meta name="description" content=" ">
  <meta name="keywords" content=" ">
  <meta name="resource-type" content="document" />
  <meta http-equiv="content-type" content="text/html; charset=US-ASCII" />
  <meta http-equiv="content-language" content="en-us" />
  <meta name="author" content="LINGGA ADI PRATAMA" />
  <meta name="contact" content="linggaadi4nd@gmail.com" />
  <meta name="copyright" content="Copyright (c) elife-solutions.com. All Rights Reserved." />
  <meta name="robots" content="index, nofollow">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="css/skins/skin-black.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery-1.11.0.min.js"></script>
  </head>
  <body class="skin-black">
  	<div class="wrapper">
  		<header class="main-header">
<a href="index.php" img src="/SystemInformation/image/Logo.png" class="logo"><img src="/SystemInformation/image/Logo.png" class="logo" /></a>  			<nav class="navbar navbar-static-top" role="navigation">
	          <!-- Sidebar toggle button-->
	          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
	            <span class="sr-only">Toggle navigation</span>
	          </a>
	          <div class="navbar-custom-menu">
              <!--load file top menu for css-->
	          	<?php include('top_menu.php'); ?>
	          </div>
	        </nav>
  		</header>

  		<aside class="main-sidebar">
	        <!-- sidebar: style can be found in sidebar.less -->
	        <?php require_once('sidebar.php'); ?>
	        <!-- /.sidebar -->
	    </aside>

        <div class="content-wrapper">
            <section class="content-header">
              <h1>
                Dashboard
                <small>Control panel</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
              </ol>
              <hr>
            </section>
            <section class="content">
                <div class="row">
                  <!--count project,client and staff-->
                    <?php
                      $sql_1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `tb_project`"));// or die (mysqli_error($conn));
                      $sql_2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `tb_client`"));// or die (mysqli_error($conn));
                      $sql_3 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `tb_staff`"));// or die (mysqli_error($conn));
                    ?>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                              <h3><?php echo $sql_1; ?></h3>
                              <p>Project</p>
                            </div>
                            <div class="icon">
                              <i class="fa fa-tasks"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="small-box bg-green">
                            <div class="inner">
                              <h3><?php echo $sql_2; ?></h3>
                              <p>Client</p>
                            </div>
                            <div class="icon">
                              <i class="fa fa-address-book"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                              <h3><?php echo $sql_3; ?></h3>
                              <p>Staff</p>
                            </div>
                            <div class="icon">
                              <i class="fa fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Task Routine</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                              <div class="row">
                                <div class="col-md-12">
                                  <p class="text-center">
                                    <div class="alert bg-info">
                                     <p class="text-info"><i class="fa fa-info-circle fa-2x pull-left"></i> This is the page for adding Routine.</p>
                                   </div>
                                   <?php
                                   //notification activity add task rotuine
                                     error_reporting(0);
                                     if (!empty($_GET['notif'])) {
                                         if ($_GET['notif'] == 1) {
                                             echo '<div class="alert bg-success"><p class="text-success">Routine was saved successfully</p></div>';
                                         }
                                         if ($_GET['notif'] == 2) {
                                             echo '<div class="alert alert-warning">Oops ... Failed to save routine</div>';
                                         }
                                     }
                                   ?>
                                   <form role="form" class="form-group" action="" method="post" enctype="multipart/form-data">
                                     <div class="row">
                                     <!-- FROM INPUTS-->
                                       <div class="col-md-8 col-sm-8 col-xs-12">
                                         <div class="box">
                                           <div class="box-header"></div>
                                           <div class="box-body">
                                             <!--Form Task Routine If user level supervisior-->
                                               <div class='form-group row' >
                                                   <div class="col-md-8 col-sm-8 col-xs-12">
                                                     <label>Routine Title</label>
                                                     <input type="text" class="form-control" name="title">
                                                   </div>
                                               </div>

                                               <div class='form-group row' >
                                                   <div class="col-md-8 col-sm-8 col-xs-12">
                                                     <label>Routine Description</label>
                                                     <input type="text" class="form-control" name="description">
                                                   </div>
                                               </div>

                                               <?php
                                               if ($u['level'] != 'staff') {
                                                   ?>
                                                   <div class='form-group row' style='margin-left:10px;'>
                                                       <label>
                                                           <input type=radio name=for value='supervisor' checked=checked>
                                                           For Me
                                                       </label>
                                                       <label style='margin-left:10px;'>
                                                           <input type=radio name=for value='staff'>
                                                           For Staff
                                                       </label>
                                                   </div >

                                                   <div class='form-group row staff-box' style='display:none;'>
                                                       <div class="col-md-8 col-sm-8 col-xs-12">
                                                           <label>Staff Name</label>
                                                           <select class="form-control" name="staff">
                                                             <!--choose select data-->
                                                               <option value=""> -- Select Staff -- </option>
                                                               <?php
                                                               //data staff
                                                               echo get_staff_option(); ?>
                                                           </select>
                                                       </div>
                                                   </div><?php
                                               }
                                               ?>

                                               <div class='form-group row' >
                                                   <div class="col-md-4 col-sm-4 col-xs-12">
                                                     <label>Start Date</label>
                                                     <input type="text" class="form-control input_date" name="start_date" required="">
                                                   </div>

                                                   <div class="col-md-4 col-sm-4 col-xs-12">
                                                     <label>End Date</label>
                                                     <input type="text" class="form-control input_date" name="end_date" required="">
                                                     <br>
                                                   </div>
                                                   <div class="text-right">
                                   <button type="submit" name="submit" class="btn btn-primary">Submit</button>&nbsp;<a href="task_routine.php" class="btn btn-default">Cancel</a>
                                 </div>
                                  </p>
                                </div><!-- /.col -->
                              </div><!-- /.row -->
                            </div><!-- ./box-body -->
                            <div class="box-footer">
                            </div><!-- /.box-footer -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="box">
                        </div><!--/.box -->
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="box">
                        </div><!-- /.box -->
                    </div>
                </div>
            </section>              <!--section-->
        </div>  <!--content wrapper-->
  	</div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Morris.js charts -->
    <script src="plugins/raphael/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="js/app.min.js" type="text/javascript"></script>
  </body>
</html>
