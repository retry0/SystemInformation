<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrator  | welcome ...</title>
    <meta name="description" content=" ">
    <meta name="keywords" content=" ">
    <meta name="resource-type" content="document" />
    <meta http-equiv="content-type" content="text/html; charset=US-ASCII" />
    <meta http-equiv="content-language" content="en-us" />
    <meta name="author" content="E-life Solutions" />
    <meta name="contact" content="linggaadi4nd@gmail.com" />
    <meta name="copyright" content="Copyright (c) E-life Solutions. All Rights Reserved." />
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
    <!-- DATA TABLES -->
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text or -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="js/jquery-1.11.0.min.js"></script>
  </head>
  <body class="skin-black">
  	<div class="wrapper">
  		<header class="main-header">
  			<a href="index.php" class="logo">ADMINISTRATOR</a>
  			<nav class="navbar navbar-static-top" role="navigation">
	          <!-- Sidebar toggle button-->
	          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
	            <span class="sr-only">Toggle navigation</span>
	          </a>
	          <div class="navbar-custom-menu">
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
                Form Edit
                <small>Asset</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Edit Asset</li>
              </ol>
              <hr>
            </section>
            <section class="content">
                <div class="alert bg-info">
                  <p class="text-info"><i class="fa fa-info-circle fa-2x pull-left"></i> This is the page to edits Asset.</p>
                </div>
                <?php
                  error_reporting(0);
                  if (!empty($_GET['notif'])) {
                    if ($_GET['notif'] == 1) {
                      echo '<div class="alert bg-success"><p class="text-success">Asset Successfully Edited</p></div>';
                    }
                    if ($_GET['notif'] == 2) {
                      echo '<div class="alert alert-warning">Oops ... Batas Maksimal Ukuran Gambar adalah 500KB</div>';
                    }
                    if ($_GET['notif'] == 2) {
                      echo '<div class="alert alert-warning">Oops ... Jenis atau Tipe Gambar yang dapat di upload adalah JPG atau PNG</div>';
                    }
                  }
                  $id = $_GET['id'];
                  $sql_0 = mysqli_query($conn,"SELECT * FROM `tb_asset` WHERE id = '$id'") or die(mysqli_error());
                  $s0 = mysqli_fetch_array($sql_0);
                ?>
                <form role="form" class="form-group" action="function/edit-asset.php?id=<?php echo $s0['id']; ?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                      <div class="box">
                        <div class="box-header"></div>
                        <div class="box-body">
                          <label>Asset Name</label>
                          <input type="text" class="form-control" name="asset_name" value="<?php echo $s0['asset_name']; ?>">
                          <br>
                          <label>Asset Desciption</label>
                          <input type="text" class="form-control" name="asset_description" value="<?php echo $s0['asset_description']; ?>">
                          <br>
                          <label>Date of Purchase</label>
                          <input type="text" class="form-control" name="date_of_purchase" id="reservation" value="<?php echo $s0['date_of_purchase']; ?>">
                          <br>
                          <label>Serial Number</label>
                          <input type="text" class="form-control" name="serial_number" value="<?php echo $s0['serial_number']; ?>">
                          <br>
                          <label>Brand</label>
                          <input type="text" class="form-control" name="brand" value="<?php echo $s0['brand']; ?>">
                          <br>
                          <label>Owner</label>
                          <input type="text" class="form-control" name="owner" value="<?php echo $s0['owner']; ?>">
                          <br>
                          <label>Status </label>
                              <select class="form-control" name="status">
                                <option value=""> -- Select Status Asset -- </option>
                                <option value="In use"<?php if($s0['status'] == 'In use'){ echo ' selected = selected'; } else { ''; }?>> In Use </option>
                                <option value="Not use"<?php if($s0['status'] == 'Not use'){ echo ' selected = selected'; } else { ''; }?>> Not Use </option>
                              </select>
                              <br>
                          <label>Image </label>
                          <input type="file" name="image">
                          <span id="helpBlock" class="help-block">Image Resolution 150px x 150px</span>
                          <br>
                          <label>Location</label>
                          <input type="text" class="form-control" name="location" value="<?php echo $s0['location']; ?>">
                          <br>
                          <label>PIC</label>
                          <input type="text" class="form-control" name="pic" value="<?php echo $s0['pic']; ?>">
                          <br>
                          
                        </div>
                      </div>                
                    </div><!-- /.col -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <div class="box">
                        <div class="box-body">
                          <table class="table">
                            <tr>
                              <td colspan="3">Note :</td>
                            </tr>
                            <tr>
                              <td colspan="3">
                                <ol>
                                  <li>Fill in the data data according to your needs.</li>
                                </ol>
                              </td>
                            </tr>
                            <tr>
                              <td>Latest Edit</td>
                              <td>&nbsp; : &nbsp;</td>
                              <td><?php echo date('Y-m-d H:i:s'); ?></td>
                            </tr>
                            <tr>
                            <td colspan="3">
                              <div class="pull-right">
                                <button type="submit" name="submit" class="btn btn-primary">Saved</button>&nbsp;<a href="asset.php" class="btn btn-default">Canceled</a>
                              </div>
                            </td>
                            </tr>
                          </table>
                        </div>
                      </div>                   
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </form>
            </section>
        </div>
  	</div>
  	

    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>   
    <!-- Morris.js charts -->
    <script src="plugins/raphael/raphael-min.js"></script>
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
    <!-- DATA TABES SCRIPT -->
    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="js/app.min.js" type="text/javascript"></script>
   <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
      });
      $('#reservation').datepicker({format: 'yyyy-mm-dd'});
      $('#reservations').datepicker({format: 'yyyy-mm-dd'});
    </script>
  </body>
</html>