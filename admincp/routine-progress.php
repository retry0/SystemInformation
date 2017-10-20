<?php include('session.php'); 

$id = $_GET['id'];
$sql_1 = mysqli_query($conn,"SELECT * FROM `tb_routine_progress` WHERE routine_id = '$id' ORDER BY id DESC") or die(mysqli_error());
if($s1 = mysqli_fetch_array($sql_1)){
    
}
else{
    header('location:view-working.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrator Area | Selamat Datang ...</title>
    <meta name="description" content=" ">
    <meta name="keywords" content=" ">
    <meta name="resource-type" content="document" />
    <meta http-equiv="content-type" content="text/html; charset=US-ASCII" />
    <meta http-equiv="content-language" content="en-us" />
    <meta name="author" content="Arie Budi" />
    <meta name="contact" content="arie.budip@gmail.com" />
    <meta name="copyright" content="Copyright (c) Ariebudi.com. All Rights Reserved." />
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
                Form
                <small>Routine Progress</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Routine Progress</li>
              </ol>
            </section>
            <section class="content">
                <?php
                  error_reporting(0);
                  if (!empty($_GET['notif'])) {
                    if ($_GET['notif'] == 1) {
                      echo '<div class="alert bg-success"><p class="text-success">Routine Progress Berhasil Disimpan</p></div>';
                    }
                    if ($_GET['notif'] == 2) {
                      echo '<div class="alert alert-warning">Oops ... Batas Maksimal Ukuran File adalah 500KB</div>';
                    }
                    if ($_GET['notif'] == 3) {
                      echo '<div class="alert alert-warning">Oops ... Jenis atau Tipe File yang dapat di upload adalah JPG, PNG, DOC, DOCX, XLS, XLSX, PDF, ZIP & RAR</div>';
                    }
                  }
                ?>
                <form role="form" action="function/edit-taskroutine.php?id=<?php echo $s1['id']; ?>&routine_id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12"></div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="alert bg-info">
                        <p class="text-info"><i class="fa fa-info-circle fa-2x pull-left"></i> Please Upload or Describe your job done below.</p>
                      </div>
                      <div class="box">
                        <div class="box-body">
                          <!--<div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="<?php echo $s1['title']; ?>">
                            <br>
                          </div>-->
                          <div class="form-group">
                            <label>Progress (%)</label>
                            <input type="text" class="form-control" name="progress" value="<?php echo $s1['progress']; ?>">
                            <br>
                          </div>
                          <div class="form-group">
                            <label>Upload File</label>
                            <input type="file" name="image">
                            <br>
                          </div>
                          <div class="form-group">
                            <label>Attachment Name</label>
                            <input type="text" class="form-control" name="attachment_name" value="<?php echo $s1['attachment_name']; ?>">
                            <br>
                          </div>
                          <div class="form-group">
                            <label>Attachment Status</label>
                              <select class="form-control" name="attachment_status">
                                <option value=""> -- Select Status  -- </option>
                                <option value="not available"<?php if($s1['attachment_status'] == 'Not Available'){ echo ' selected = selected'; } else { ''; }?>> Not Available</option>
                                <option value="draft"<?php if($s1['attachment_status'] == 'Draft'){ echo ' selected = selected'; } else { ''; }?>> Draft</option>
                                <option value="completed"<?php if($s1['attachment_status'] == 'Completed'){ echo ' selected = selected'; } else { ''; }?>> Completed </option>
                              </select>
                            <br>
                          </div>
                          <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" class="form-control" name="description" rows="10"><?php echo $s1['description']; ?></textarea>
                            <br>
                          </div>
                          <div class="text-right">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>&nbsp;
                            <a href="view-working.php" class="btn btn-default">Cancel</a>
                          </div>
                        </div>
                      </div>                
                    </div><!-- /.col -->
                    <div class="col-md-3 col-sm-3 col-xs-12"></div><!-- /.col -->
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
      $(document).ready(function(){
        $("#pro_title").change(function(){
          var ids = $("#pro_title").val();
          $.ajax({
            url : 'select_spv.php',
            type: 'post',
            data: 'ids='+ ids,
            dataType: 'html',
            success:function(response){
              $('#spv').val(response);
            }
          });
        });
      });
    </script>
  </body>
</html>