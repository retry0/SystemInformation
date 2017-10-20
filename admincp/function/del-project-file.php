<?php
	require_once('session.php');
	$id = $_GET['id'];
	$project_id = $_GET['project_id'];
    $query = "UPDATE `tb_task_progress` 
            SET `image` = '',
            attachment_name = '', attachment_status = ''                                    
            WHERE task_id = '$id'";
    // die($query);
    $update = mysqli_query($conn,$query) or die(mysqli_error($conn));
    header('location:../projectfile.php?id='.$project_id);
?>