<?php
	require_once('session.php');

    $title = $_POST['title'];
    $code = $_POST['code'];
    $client = $_POST['client'];
    $pm = $_POST['pm'];
    $status = $_POST['status'];
   // $project_value = $_POST['project_value'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
        $project_value     = str_replace(['MYR. ',',','.'],'', $_POST['project_value']);

    $query = mysqli_query($conn,"INSERT INTO `tb_project` (`title`,`code`,`client`,`pm`,`status`,`start_date`,`end_date`,`project_value`) VALUES ('$title','$code','$client','$pm','$status','$start_date','$end_date','$project_value')") or die(mysqli_error());
    header('location:../addproject.php?notif=1');
?>