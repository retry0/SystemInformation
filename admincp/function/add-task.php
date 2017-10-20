<?php
	require_once('session.php');

    $project_task = $_POST['project_task'];
    $idproject = $_POST['project_title'];
    $project = mysqli_query($conn, "SELECT * FROM `tb_project` WHERE id = '$idproject'");
    $p = mysqli_fetch_array($project);
    $project_title = $p['title'];
    $staff_name = $_POST['staff_name'];
    $staff = mysqli_query($conn, "SELECT * FROM `tb_user` WHERE user = '$staff_name' ORDER BY id ASC");
    $s = mysqli_fetch_array($staff);
    $full_name = $s['full_name'];
    $supervisor = $_POST['supervisor_user'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $query = mysqli_query($conn,"INSERT INTO `tb_task` (`project_id`,`project_title`,`staff_name`,`project_task`,`supervisor`,`start_date`,`end_date`, `user`) VALUES ('$idproject','$project_title','$full_name','$project_task','$supervisor','$start_date','$end_date','$staff_name')") or die(mysqli_error());
    header('location:../addtask.php?notif=1');
?>