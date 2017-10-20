<?php
	require_once('session.php');

    $users = $u['user'];
    $position = $_POST['position'];
    $slug = strtolower($position);
    $query = mysqli_query($conn,"INSERT INTO `tb_position` (`slug`,`position`,`user`) VALUES ('$slug','$position','$users')") or die(mysqli_error());
    header('location:../position.php?notif=1');
?>