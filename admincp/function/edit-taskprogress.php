<?php
	require_once('session.php');
    // die('asd'.$_GET['id']);
    $id = $_GET['id'];
    $task_id = $_GET['task_id'];
    $title = $_POST['title'];
    $newtitle = str_replace(" ","-",$title);
    $description = $_POST['description'];
    $progress = $_POST['progress'];
    $attachment_name = $_POST['attachment_name'];
    $attachment_status = $_POST['attachment_status'];
    $now_time = date('Y-m-d H:i:s');
    // $now_time = date('Y-m-20 17:00:00');
    $date = date('Y-m-d');

    $tipe_file = array('jpg','png','bmp','doc','docx','xls','xlsx','ppt','pptx','pdf','rar','zip');
    $gbr = $_FILES['image']['name'];
    $ukuran = $_FILES['image']['size'];
    $tipe = $_FILES['image']['type'];
    $error = $_FILES['image']['error'];
    $explode = explode('.',$gbr);
    $extensi  = strtolower($explode[count($explode)-1]);
    $newname = $newtitle.'_'.$date.'.'.$extensi;

    
    if ($gbr !=="" && $error == 0) {
        if ( in_array($extensi, $tipe_file) ) {
            if(($_FILES['image']['size'] > $config['max_upload_size']) || ($_FILES["image"]["size"] == 0)) {
                header('location:../task-progress.php?id='.$task_id.'&notif=2'); 
            }
            else{
                move_uploaded_file($_FILES['image']['tmp_name'], '../../upload/'.$newname);
                
                $update = mysqli_query($conn,"UPDATE `tb_task_progress` 
                                        SET `title` = '$title', `progress`='$progress', `image` = '$newname', `end_date` = '$now_time',
                                        attachment_name = '".$attachment_name."', attachment_status = '".$attachment_status."'                                    
                                        WHERE id = '$id' AND user = '$users'") or die(mysqli_error($conn));
                // die($extensi);
                //update tb_task
                $query = "UPDATE `tb_task` SET `progress`='$progress', `end_date` = '$now_time', status=3 WHERE id = '$task_id' AND user = '$users'";
                $update = mysqli_query($conn,$query) or die(mysqli_error($conn));
                
                header('location:../view-working.php?notif=1');
            }
        }
        else {
            header('location:../task-progress.php?id='.$task_id.'&notif=3'); 
        }
    }
    else {
        //update tb_task_progress
        $query = "UPDATE `tb_task_progress` SET `title` = '$title', `progress`='$progress', `description` = '$description', `end_date` = '$now_time' WHERE id = '$id' AND user = '$users'";
        
        $update = mysqli_query($conn,$query) or die(mysqli_error($conn));
        
        //update tb_task
        $query = "UPDATE `tb_task` SET `progress`='$progress', `end_date` = '$now_time', status=3 WHERE id = '$task_id' AND user = '$users'";
        $update = mysqli_query($conn,$query) or die(mysqli_error($conn));
        
        header('location:../view-working.php?notif=1');
    }
?>