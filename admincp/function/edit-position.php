<?php
	require_once('session.php');
	$id = $_GET['id'];
    $position = $_POST['position'];
    $slug = strtolower($position);
    $query = mysqli_query($conn,"UPDATE `tb_position` SET `slug` = '$slug', `position` = '$position' WHERE id = '$id'") or die(mysqli_error());
    header('location:../position.php?id='.$id.'&notif=2');
?>