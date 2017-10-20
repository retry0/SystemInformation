<?php
	require_once('session.php');

    $id = mysqli_real_escape_string($conn,$_GET['id']);
    $now_time = date('Y-m-d H:i:s');
    // $now_time = date('Y-m-20 13:00:00');
    
    if($_GET['which']=='routine'){
        $insert = mysqli_query($conn,"UPDATE `tb_routine_progress` 
                            SET `break_end` = '".$now_time."'
                            WHERE routine_id = '$id'
                            AND user = '".$u['user']."' ") or die(mysqli_error($conn));
    }
    else{

        $insert = mysqli_query($conn,"UPDATE `tb_task_progress` SET break_end = '".$now_time."' WHERE task_id = '$id' AND user = '$users'") or die(mysqli_error());
    }
        header('location:../view-working.php');
?>