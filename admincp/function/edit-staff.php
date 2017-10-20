<?php
	require_once('session.php');

    $id = $_GET['id'];
    $full_name = $_POST['full_name'];
    $getuser = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE id = '$full_name'") or die(mysqli_error());
    $gu = mysqli_fetch_array($getuser);
    $fullname = $gu['full_name'];
    $usernya = $gu['user'];
    $position = $_POST['position'];
    $rate = $_POST['rate'];
    $query = mysqli_query($conn,"UPDATE `tb_staff` SET `user` = '$usernya', `full_name` = '$fullname', `position` = '$position', `rate` = '$rate' WHERE id = '$id'") or die(mysqli_error());
    header('location:../editstaff.php?id='.$id.'&notif=1');
?>