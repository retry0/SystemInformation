<?php
	require_once('session.php');
	$id = $_GET['id'];
    $level = $_POST['level'];
    $slug = strtolower($level);
    $query = mysqli_query($conn,"UPDATE `tb_level` SET `slug` = '$slug', `level` = '$level' WHERE id = '$id'") or die(mysqli_error());
    header('location:../level.php?id='.$id.'&notif=2');
?>