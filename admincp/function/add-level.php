<?php
	require_once('session.php');

    $users = $u['user'];
    $level = $_POST['level'];
    $slug = strtolower($level);
    $query = mysqli_query($conn,"INSERT INTO `tb_level` (`slug`,`level`,`user`) VALUES ('$slug','$level','$users')") or die(mysqli_error());
    header('location:../level.php?notif=1');
?>