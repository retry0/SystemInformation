<?php
	require_once('session.php');

    $id = $_GET['id'];
    
    if($_GET['which']=='routine'){
        $query = mysqli_query($conn,"UPDATE `tb_routine` SET `status` = 2 WHERE id = '$id'") or die(mysqli_error());
    }
    else{
        $query = mysqli_query($conn,"UPDATE `tb_task` SET `status` = 2 WHERE id = '$id'") or die(mysqli_error());
    }
        header('location:../view-working.php');
?>