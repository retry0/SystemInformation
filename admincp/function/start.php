<?php
	require_once('session.php');

    $id = mysqli_real_escape_string($conn,$_GET['id']);
    $now_time = date('Y-m-d H:i:s');
    
    
    if($_GET['which']=='routine'){
        $query = "INSERT INTO `tb_routine_progress` 
            (`routine_id`, `start_date`, `user`) 
            VALUES 
            ('$id', '".$now_time."', '".$u['user']."')";
        $insert = mysqli_query($conn,$query) or die(mysqli_error($conn));
    }
    else{
        $sql_1 = mysqli_query($conn,"SELECT * FROM `tb_task` WHERE id = '$id'") or die(mysqli_error());
        $s1 = mysqli_fetch_array($sql_1);
        $project_title = $s1['project_title'];
        $project_task = $s1['project_task'];

        $insert = mysqli_query($conn,"INSERT INTO `tb_task_progress` 
        (`task_id`, `project_title`, `project_task`, `title`, `description`, `image`, `start_date`, `end_date`, `break_start`, `break_end`, `user`) 
        VALUES 
        ('$id','$project_title','$project_task','','','', '".$now_time."','','','','$users')") or die(mysqli_error($conn));
        // header('location:../task.php');
    }
        header('location:../view-working.php');
?>