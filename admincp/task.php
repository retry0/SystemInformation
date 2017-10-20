<?php include('session.php'); ?>
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
                Manage
                <small>Task</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Task</li>
              </ol>
              <hr>
            </section>
            <section class="content">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">List Task</h3>
                        <div class="box-tools pull-right">
                          <button class="btn btn-default btn-sm btn-box-tool"><i class="fa fa-download"></i>&nbsp; Export Excel</button>&nbsp;
                          <?php 
                            if($u['level'] == 'staff'){
                              echo '';
                            }
                            else{
                          ?>
                          <a href="addtask.php" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Add Task</a>
                          <?php } ?>
                        </div>
                      </div><!-- /.box-header -->
                      <div class="box-body">
                        
                        <div class="row">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                              <table class="table table-bordered table-striped table-hover" id="example1">
                                <thead>
                                  <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Project Title</th>
                                    <th class="text-center">Staff Name</th>
                                    <th class="text-center">Project Task</th>
                                    <th class="text-center">Supervisor</th>
                                    <th class="text-center">Progress (%)</th>
                                    <th class="text-center">Start Date</th>
                                    <th class="text-center">End Date</th>
                                    <?php 
                                      if($u['level'] != 'staff' ){
                                        echo '';
                                      }
                                      else{
                                    ?>
                                    <th class="text-center">Task Confirm</th>
                                    <?php } ?>

                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    if(isset($_GET['id'])){
                                      $idproject = $_GET['id'];
                                      $sql_1 = mysqli_query($conn,"SELECT * FROM `tb_task` WHERE project_id = '$idproject' ORDER BY id ASC") or die(mysqli_error());
                                    }
                                    else{
                                      $sql_1 = mysqli_query($conn,"SELECT * FROM `tb_task` WHERE user = '$users' ORDER BY id ASC") or die(mysqli_error());
                                    }
                                    $no=0;
                                    while($s1 = mysqli_fetch_array($sql_1)){
                                        $no++;
                                        $task_progress = get_task_progress($s1['id']);
                                          ?>
                                          <tr>
                                            <td class="text-center" style="vertical-align: middle;"><?php echo $no; ?></td>
                                            <td class="text-center" style="vertical-align: middle;"><?php echo $s1['project_title']; ?></td>
                                            <td class="text-center" style="vertical-align: middle;"><?php echo $s1['staff_name']; ?></td>
                                            <td class="text-center" style="vertical-align: middle;"><a href="view-progress.php?id=<?php echo $s1['id']; ?>"><?php echo $s1['project_task']; ?></a></td>
                                            <td class="text-center" style="vertical-align: middle;"><?php echo $s1['supervisor']; ?></td>
                                            <td class="text-center" style="vertical-align: middle;"><?php echo $s1['progress']; ?></td>
                                            <td class="text-center" style="vertical-align: middle;"><?php echo $s1['start_date']; ?></td>
                                            <td class="text-center" style="vertical-align: middle;"><?php echo $s1['end_date']; ?></td>
                                            <?php 
                                              if($u['level'] != 'staff'){
                                                echo '';
                                              }
                                              else{
                                            ?>
                                            <td class="text-center" style="vertical-align: middle;">
                                              <?php
                                                $status = $s1['status'];
                                                if($status == 0){
                                              ?>
                                              <a href="function/confirmyes.php?id=<?php echo $s1['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i>&nbsp; Yes</a>
                                              <a href="function/confirmno.php?id=<?php echo $s1['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-close"></i>&nbsp; No</a>
                                              <?php
                                                }
                                                else if($status == 2){
                                                  echo 'Task reject';
                                                }
                                                else{
                                                    if(!$task_progress OR $task_progress->start_date == 0){
                                                        echo '<a href="function/start.php?id='.$s1['id'].'" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="fa fa-play"></i>&nbsp; Work Start</a><br>';
                                                    }
                                                    elseif($task_progress AND $task_progress->start_date != 0 AND $task_progress->break_start == 0){
                                                        echo '<a href="function/break_start.php?id='.$s1['id'].'" class="btn btn-warning btn-sm" style="margin-bottom: 5px;"><i class="fa fa-pause"></i>&nbsp; Break Start</a><br>';
                                                        echo '<a href="function/stop.php?id='.$s1['id'].'" class="btn btn-danger btn-sm" style="margin-bottom: 5px;"><i class="fa fa-stop"></i>&nbsp; Work stop</a>';
                                                        
                                                    }
                                                    elseif($task_progress AND $task_progress->break_start != 0 AND $task_progress->break_end == 0){
                                                        echo '<a href="function/break_stop.php?id='.$s1['id'].'" class="btn btn-primary btn-sm" style="margin-bottom: 5px;"><i class="fa fa-play"></i>&nbsp; Continue</a>';
                                                    }
                                                    elseif($task_progress->end_date == 0){
                                                        echo '<a href="function/stop.php?id='.$s1['id'].'" class="btn btn-danger btn-sm" style="margin-bottom: 5px;"><i class="fa fa-stop"></i>&nbsp; Work stop</a>';
                                                    }
                                                    else{
                                                        echo 'Complete';
                                                    }
                                                    
                                              ?>
                                              <?php
                                                }
                                              ?>
                                            </td>
                                            <?php } ?>
                                          </tr>
                                  <?php }//end while ?>
                                </tbody>
                              </table>
                            </div>
                          </div><!-- /.col -->
                        </div><!-- /.row -->
                      </div><!-- ./box-body -->
                    </div><!-- /.box -->
                  </div><!-- /.col -->
                </div><!-- /.row -->
            </section>
        </div>
  	</div>
  	

    <script src="js/bootstrap.min.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
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
        CKEDITOR.replace("content")
      });
    </script>
  </body>
</html>