<?php
	require_once('session.php');

    $id = $_GET['id'];
    $title = $_POST['title'];
    $code = $_POST['code'];
    $client = $_POST['client'];
    $pm = $_POST['pm'];
    $status = $_POST['status'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $query = mysqli_query($conn,"UPDATE `tb_project` SET `title` = '$title', `code` = '$code', `client` = '$client', `pm` = '$pm', `status` = '$status', `start_date` = '$start_date', `end_date` = '$end_date' WHERE id = '$id'") or die(mysqli_error());
    header('location:../editproject.php?id='.$id.'&notif=1');
?>