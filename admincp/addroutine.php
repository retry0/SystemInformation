<?php 
include('session.php'); 

if(isset($_POST['submit'])){
    // var_dump($_POST);
    // die();
    /* ["title"]=> string(7) "laporan" 
    ["description"]=> string(7) "laporan" 
    ["start_date"]=> string(10) "2017-10-25" 
    ["end_date"]=> string(10) "2017-11-02" 
    ["submit"]=> string(0) ""*/
    
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);
    $for = mysqli_real_escape_string($conn, $_POST['for']);
    
    if($u['level'] != 'staff'){
        if($for=='staff')
            $staff = mysqli_real_escape_string($conn, $_POST['staff']);
        else
            $staff = $u['user'];
    }
    else{
        $staff = $u['user'];
    }
    
    $query = "INSERT INTO `tb_routine` (`title`,`description`,`start_date`,`end_date`,`user`) 
                    VALUES 
                    ('$title','$description', '$start_date','$end_date','".$staff."')";
    
    $query = mysqli_query($conn,$query) or die(mysqli_error($conn));
    if( mysqli_affected_rows($conn) > 0){
        header('location:?notif=1');
    }
    else{
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
                Form Add
                <small>Routine</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Add Routine</li>
              </ol>
            </section>
            
            <section class="content">
                <div class="alert bg-info">
                  <p class="text-info"><i class="fa fa-info-circle fa-2x pull-left"></i> This is the page for adding Routine.</p>
                </div>
                <?php
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
                            if($u['level'] != 'staff'){
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
                                            <option value=""> -- Select Staff -- </option>
                                            <?php 
                                            echo get_staff_option();
                                            ?>
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
                            </div>
                              
                        </div><!-- /.box-body -->
                        
                      </div>                
                    </div><!-- /.col -->
                    
                    <!-- RIGHT SIDE -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <div class="box">
                        <div class="box-body">
                          <table class="table">
                            <tr>
                              <td>Latest Edit</td>
                              <td>&nbsp; : &nbsp;</td>
                              <td><?php echo date('Y-m-d H:i:s'); ?></td>
                            </tr>
                            <tr>
                            <td colspan="3">
                              <div class="pull-right">
                                <button type="submit" name="submit" class="btn btn-primary">Save</button>
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
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
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
          $.widget.bridge('uibutton', $.ui.button);
            $("#example1").dataTable();
          $('.input_date').datepicker({format: 'yyyy-mm-dd'});
          
          $('input[type=radio][name=for]').change(function(){
              if($('input[type=radio][name=for][value=staff]').prop('checked') ){
                  $('div.staff-box').show();
              }
              else{
                  $('div.staff-box').hide();
              }
          })
      });
    </script>
  </body>
</html>