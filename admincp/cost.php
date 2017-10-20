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
        <img width="300" height="50" src="../logo/logo.png" class="logo"></a>
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

        <div id ="divjam" class="content-wrapper">
            <section class="content-header">
              <h1>
                View
                <small>Time Task</small>
                <br>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="working_time.php">Task</a></li>
                <li class="active">View Time Task</li>
              </ol>
              <hr>
            </section>      
              </ol>
            </section>
            <section class="content">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">View Time Task</h3>
                      </div><!-- /.box-header -->
                      <div class="box-body">
                        <div class="row">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                              <table class="table table-bordered table-striped table-hover" id="example1">
                                <thead>
                                  <tr>
                                    <th class="text-center">Work Duration</th>
                                    <th class="text-center">Work Break</th>
                                    <th class="text-center">Accept Work</th>
                                    <th class="text-center">Cost</th>
                                    <th class="text-center">Accept Cost</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $id = $_GET['id'];
                                    $sql_1 = mysqli_query($conn,"SELECT * FROM `tb_task_progress`  WHERE task_id = '$id' AND user = '$users'") or die(mysqli_error($conn));
                                    $s1 = mysqli_fetch_array($sql_1);
                                    $sql_2 = mysqli_query($conn,"SELECT * FROM `tb_task`  WHERE id = '$id'") or die(mysqli_error($conn));
                                    $s2 = mysqli_fetch_array($sql_2);
                                    $user = $s2['user'];
                                    $sql_3 = mysqli_query($conn,"SELECT * FROM `tb_staff` WHERE user = '$user'") or die(mysqli_error());
                                    $s3 = mysqli_fetch_array($sql_3);
                                    $rate = $s3['rate'];

                                    $tgl1 = strtotime($s1['start_date']);
                                    $tgl2 = strtotime($s1['end_date']);
                                    $duration = $tgl2-$tgl1;
                                    $jam   = floor($duration / (60 * 60));
                                    $menit = $duration - $jam * (60 * 60);

                                    $tgl3 = strtotime($s1['break_start']);
                                    $tgl4 = strtotime($s1['break_end']);
                                    $duration1 = $tgl4-$tgl3;
                                    $jam1   = floor($duration1 / (60 * 60));
                                    $menit1 = $duration1 - $jam1 * (60 * 60);

                                    $time = $duration - $duration1;
                                    $cost = ($time/3600) * $rate;
                                  ?>
                                  <tr>
                                    <td class="text-center" style="vertical-align: middle;"><?php echo $jam.' Hours '.round($menit/60).' Minutes'; ?></td>
                                    <td class="text-center" style="vertical-align: middle;"><?php echo $jam1.' Hours '.round($menit1/60).' Minutes'; ?></td>
                                    <td class="text-center" style="vertical-align: middle;"><?php echo round($time/60).' Minutes'; ?></td>
                                    <td class="text-center" style="vertical-align: middle;"><?php echo 'MYR '.number_format($rate).'/Hours'; ?></td>
                                    <td class="text-center" style="vertical-align: middle;"><?php echo 'MYR '.number_format($cost); ?></td>
                                  </tr>
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