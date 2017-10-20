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
            <img width="300" height="50" src="../logo/logo.png" class="logo">
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
            Manage
            <small>Task</small>
            <br>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Task</li>
          </ol>
          <hr>
        </section>
        <section class="content">

   <br>
  <!-- Tombol untuk menampilkan modal-->
  <button type="button" class="btn btn-success btn-sm" id="Btn-start" onclick="myStart()" data-toggle="modal" data-target="#myModal" >Start</button>
  <button type="button" class="btn btn-warning btn-sm" id="Btn-break" onclick="myBreak()" data-toggle="modal" data-target="#myModal">Break</button>
  <button type="button" class="btn btn-primary btn-sm" id="Btn-continue" onclick="myContinue()" data-toggle="modal" data-target="#myModal">Continue</button>
  <button type="button" class="btn btn-danger btn-sm" id="Btn-stop" onclick="myStop()" data-toggle="modal" data-target="#myModal">Stop</button>
</section>

<!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Working System Managment</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                    <div class="box-body">
                    <div class="row">
                        <div class="table-responsive">
                          <table class="table table-bordered table-striped table-hover" id="example1">
                            <thead>Project Task
                              <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Project Title</th>
                                <th class="text-center">Project Task</th>
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
                                <th class="text-center">Time Work</th>
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
                                  ?>
                                  <tr>
                                    <td class="text-center" style="vertical-align: middle;"><?php echo $no; ?></td>
                                    <td class="text-center" style="vertical-align: middle;"><?php echo $s1['project_title']; ?></td>
                                    <td class="text-center" style="vertical-align: middle;"><?php echo $s1['project_task']; ?></a></td>
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
                                        }
                                        else{
                                      ?>
                                      <a href="#admincp/function/start.php?id=<?php echo $s1['id']; ?>" ><button type="button" class="btn btn-success btn-sm" id="Btn-start-modal" onclick="myStart()" style="margin-bottom: 5px;"> Start</button></a><br>

                                      <?php
                                        }
                                      ?>
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;"> <a href="cost.php?id=<?php echo $s1['id']; ?>"><button type="button" data-toggle="modal" class="btn btn-info btn-sm" data-target="#myModal1" style="margin-bottom: 5px;"><font color="white"> View Time Task</a></button></font>
                                    <?php } ?>
                                  </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                <!-- footer modal -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
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
    <script >
function myStart() {
  if  (document.getElementById("Btn-break")){
    style.display='none';}
    else   (document.getElementById("Btn-continue")){
    style.display='none';
    }
  //document.getElementById("Btn-break").style.display='none';
  document.getElementById("Btn-continue").style.display='none';
  document.getElementById("Btn-stop").style.display='none';
  document.getElementById("Btn-break-modal").style.display='none';
  document.getElementById("Btn-continue-modal").style.display='none';
  document.getElementById("Btn-stop-modal").style.display='none';

}
function myBreak(){
  document.getElementById("Btn-start").style.display='none';
  document.getElementById("Btn-continue").style.display='none';
  document.getElementById("Btn-stop").style.display='none';
  document.getElementById("Btn-start-modal").style.display='none';
  document.getElementById("Btn-continue-modal").style.display='none';
  document.getElementById("Btn-stop-modal").style.display='none';
}
function myContinue(){
  document.getElementById("Btn-start").style.display='none';
  document.getElementById("Btn-break").style.display='none';
  document.getElementById("Btn-stop").style.display='none';
  document.getElementById("Btn-start-modal").style.display='none';
  document.getElementById("Btn-break-modal").style.display='none';
  document.getElementById("Btn-stop-modal").style.display='none';
}
function myStop(){
  document.getElementById("Btn-start").style.display='none';
  document.getElementById("Btn-break").style.display='none';
  document.getElementById("Btn-continue").style.display='none';
  document.getElementById("Btn-start-modal").style.display='none';
  document.getElementById("Btn-break-modal").style.display='none';
  document.getElementById("Btn-continue-modal").style.display='none';
}
</script>
<script>
  $(document).ready(function() {
    setInterval(function() {
       $('#divjam').load('clock.php?acak='+ Math.random());
    }, 1000);
  });
</script>

  </body>
</html>
