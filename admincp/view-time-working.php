<?php include('session.php'); 
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
                Working
                <small>Time View</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Working Time</li>
              </ol>
            </section>
            <section class="content">
            <?php
        
            if (!empty($_GET['notif'])) {
                if ($_GET['notif'] == 1) {
                  echo '<div class="alert bg-success"><p class="text-success">Progress Berhasil Disimpan</p></div>';
                }
            }
            ?>
            
            <!-- PROJECT TASK  -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">List Task</h3>
                        <!--<div class="box-tools pull-right">
                          <button class="btn btn-default btn-sm btn-box-tool"><i class="fa fa-download"></i>&nbsp; Export Excel</button>&nbsp;
                        </div>-->
                      </div><!-- /.box-header -->
                      <div class="box-body">
                        
                        <div class="row">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                              <table class="table table-bordered table-striped table-hover els_datatable" id="example1">
                                <thead>
                                  <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Project</th>
                                    <th class="text-center">Staff Name</th>
                                    <th class="text-center">Supervisor</th>
                                    <th class="text-center">Work Duration</th>
                                    <th class="text-center">Work Break</th>
                                    <th class="text-center">Accept Work</th>
                                    <th class="text-center">Cost</th>
                                    <th class="text-center">Accept Cost</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    if(isset($_GET['id'])){
                                      $idproject = $_GET['id'];
                                      $sql_1 = mysqli_query($conn,"SELECT * FROM `tb_task` WHERE project_id = '$idproject' ORDER BY id ASC") or die(mysqli_error());
                                    }
                                    else{
                                        if($u['level']=='staff'){
                                            $query = "SELECT t.*, tp.start_date as task_start, tp.end_date as task_end, tp.break_start, tp.break_end,tp.image, u.full_name, st.rate
                                                                FROM `tb_task` t
                                                                LEFT JOIN tb_task_progress tp
                                                                ON tp.task_id = t.id
                                                                LEFT JOIN tb_staff st
                                                                ON st.user=t.user
                                                                LEFT JOIN tb_user u
                                                                ON u.user = t.supervisor
                                                                WHERE t.user = '$users' 
                                                                AND t.status in (1,3)
                                                                ORDER BY t.id ASC";
                                        }
                                        else{
                                            $query = "SELECT t.* , tp.start_date as task_start, tp.end_date as task_end, tp.break_start, tp.break_end,tp.image, u.full_name,st.rate
                                                                FROM `tb_task` t
                                                                LEFT JOIN tb_task_progress tp
                                                                ON tp.task_id = t.id
                                                                LEFT JOIN tb_user u
                                                                ON u.user = t.supervisor
                                                                LEFT JOIN tb_staff st
                                                                ON st.user=t.user
                                                                WHERE t.supervisor='".$u['user']."'
                                                                ORDER BY t.id ASC";
                                        }
                                        // die($query);
                                          $sql_1 = mysqli_query($conn,$query) or die(mysqli_error($conn));
                                    }
                                    $no=0;
                                    while($s1 = mysqli_fetch_array($sql_1)){
                                        $no++;
                                        // $task_progress = get_task_progress($s1['id']);
                                        $task_start = new DateTime($s1['task_start']);
                                        $task_end = new DateTime($s1['task_end']);
                                        // The diff-methods returns a new DateInterval-object...
                                        $work_diff = $task_end->diff($task_start);
                                        
                                        $break_start = new DateTime($s1['break_start']);
                                        $break_end = new DateTime($s1['break_end']);
                                        $break_diff = $break_end->diff($break_start);
                                        
                                        
                                        $e = new DateTime('00:00');
                                        $f = clone $e;
                                        $e->add($work_diff);
                                        $e->sub($break_diff);
                                        $total_diff = $f->diff($e);
                                        
                                        $accept_hour = $total_diff->format('%h');  
                                        $accept_minutes = $total_diff->format('%i');
                                        
                                        $accept_cost_hour = $accept_hour * $s1['rate'];
                                        $accept_cost_minute = ($accept_minutes/60) * $s1['rate'];
                                          ?>
                                          <tr>
                                            <td class="text-center" style="vertical-align: middle;"><?php echo $no; ?></td>
                                            <td class="text-center" style="vertical-align: middle;"><?php echo $s1['project_title']; ?><br>Task : <?=$s1['project_task']?></td>
                                            <td class="text-center" style="vertical-align: middle;"><?php echo $s1['staff_name']; ?></td>
                                            <td class="text-center" style="vertical-align: middle;"><?php echo $s1['full_name']; ?></td>
                                            <td class="text-center" style="vertical-align: middle;"><?=$work_diff->format('%h hours %i minutes')?></td>
                                            <td class="text-center" style="vertical-align: middle;"><?=$break_diff->format('%h hours %i minutes')?></td>
                                            <td class="text-center" style="vertical-align: middle;"><?=$accept_hour.' hours '.$accept_minutes.' minutes'?></td>
                                            <td class="text-center" style="vertical-align: middle;">IDR <?=number_format($s1['rate'],0,',','.')?>/Hr</td>
                                            <td class="text-center" style="vertical-align: middle;">IDR <?=number_format(bcadd($accept_cost_hour, $accept_cost_minute,0),0,',','.')?></td>
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
                
            <!-- ROUTINE TASK  -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">List Routine</h3>
                      </div><!-- /.box-header -->
                      <div class="box-body">
                        <div class="row">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                              <table class="table table-bordered table-striped table-hover els_datatable" id="example2">
                                <thead>
                                  <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Routine Title</th>
                                    <th class="text-center">Worker</th>
                                    <th class="text-center">Work Duration</th>
                                    <th class="text-center">Work Break</th>
                                    <th class="text-center">Accept Work</th>
                                    <th class="text-center">Cost</th>
                                    <th class="text-center">Accept Cost</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    if($u['level']=='staff'){
                                        $query = "SELECT r.*, u.full_name, rp.image , rp.start_date as routine_start, rp.end_date as routine_end, rp.break_start, rp.break_end, st.rate
                                                        FROM `tb_routine`  r
                                                        LEFT JOIN tb_user u
                                                        ON u.user=r.user
                                                        LEFT JOIN tb_routine_progress rp
                                                        ON rp.routine_id = r.id
                                                        LEFT JOIN tb_staff st
                                                        ON st.user=r.user
                                                        WHERE r.user='".$u['user']."'
                                                        AND r.status in (1,3)
                                                        ORDER BY r.id DESC";
                                    }
                                    else{
                                        $query = "SELECT r.*, u.full_name , rp.image, rp.start_date as routine_start, rp.end_date as routine_end, rp.break_start, rp.break_end, st.rate
                                                        FROM `tb_routine`  r
                                                        LEFT JOIN tb_user u
                                                        ON u.user=r.user
                                                        LEFT JOIN tb_routine_progress rp
                                                        ON rp.routine_id = r.id
                                                        LEFT JOIN tb_staff st
                                                        ON st.user=r.user
                                                        ORDER BY r.id DESC";
                                    }
                                    // die($query);
                                    $sql_1 = mysqli_query($conn,$query) or die(mysqli_error());
                                    $no=0;
                                    while($s1 = mysqli_fetch_array($sql_1)){
                                      $no++;
                                        $task_start = new DateTime($s1['routine_start']);
                                        $task_end = new DateTime($s1['routine_end']);
                                        // The diff-methods returns a new DateInterval-object...
                                        $work_diff = $task_end->diff($task_start);
                                        
                                        $break_start = new DateTime($s1['break_start']);
                                        $break_end = new DateTime($s1['break_end']);
                                        $break_diff = $break_end->diff($break_start);
                                        
                                        
                                        $e = new DateTime('00:00');
                                        $f = clone $e;
                                        $e->add($work_diff);
                                        $e->sub($break_diff);
                                        $total_diff = $f->diff($e);
                                        
                                        $accept_hour = $total_diff->format('%h');  
                                        $accept_minutes = $total_diff->format('%i');
                                      
                                        $accept_cost_hour = $accept_hour * $s1['rate'];
                                        $accept_cost_minute = ($accept_minutes/60) * $s1['rate'];
                                    // $routine_progress = get_task_progress($s1['id'], 'routine');
                                        
                                  ?>
                                  <tr>
                                    <td class="text-center" style="vertical-align: middle;"><?php echo $no; ?></td>
                                    <td class="text-center" style="vertical-align: middle;"><?php echo $s1['title'].'<br>Desc : '.$s1['description']; ?></td>
                                    <td class="text-center" style="vertical-align: middle;"><?php echo $s1['full_name']; ?></td>
                                    <td class="text-center" style="vertical-align: middle;"><?=$work_diff->format('%h hours %i minutes')?></td>
                                    <td class="text-center" style="vertical-align: middle;"><?=$break_diff->format('%h hours %i minutes')?></td>
                                    <td class="text-center" style="vertical-align: middle;"><?=$accept_hour.' hours '.$accept_minutes.' minutes'?></td>
                                    <td class="text-center" style="vertical-align: middle;">IDR <?=number_format($s1['rate'], 0,',','.')?>/Hr</td>
                                    <td class="text-center" style="vertical-align: middle;">IDR <?=number_format(bcadd($accept_cost_hour, $accept_cost_minute,0), 0,',','.')?></td>
                                    
                                  </tr>
                                  <?php } ?>
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
      
      $(function () {
        $(".els_datatable").dataTable();
      });
    
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
  </body>
</html>