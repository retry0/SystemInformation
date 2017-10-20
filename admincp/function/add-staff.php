<?php
	require_once('session.php');


    $full_name = $_POST['full_name'];
    $getuser = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE id = '$full_name'") or die(mysqli_error());
    $gu = mysqli_fetch_array($getuser);
    $fullname = $gu['full_name'];
    $usernya = $gu['user'];
    $position = $_POST['position'];
    $rate = $_POST['rate'];
    $query = mysqli_query($conn,"INSERT INTO `tb_staff` (`user`,`full_name`,`position`,`rate`) VALUES ('$usernya','$fullname','$position','$rate')") or die(mysqli_error());
    header('location:../addstaff.php?notif=1');
?>