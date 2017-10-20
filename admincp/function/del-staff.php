<?php
	require_once('session.php');
	$id = $_GET['id'];
    $query = mysqli_query($conn,"DELETE FROM `tb_staff` WHERE id = '$id'") or die(mysqli_error());
    header('location:../staff.php');
?>