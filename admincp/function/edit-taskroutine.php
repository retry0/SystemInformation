<?php
	require_once('session.php');
    // die('asd'.$_GET['id']);
    // var_dump($_POST);
    // die();
    $id = $_GET['id'];
    $routine_id = $_GET['routine_id'];
    // $title = $_POST['title'];
    // $newtitle = str_replace(" ","-",$title);
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
    $newname = 'routine_'.$date.'_'.$id.'_'.$routine_id.'.'.$extensi;

    
    if ($gbr !=="" && $error == 0) {
        if ( in_array($extensi, $tipe_file) ) {
            if(($_FILES['image']['size'] > $config['max_upload_size']) || ($_FILES["image"]["size"] == 0)) {
                header('location:../routine-progress.php?id='.$routine_id.'&notif=2'); 
            }
            else{
                move_uploaded_file($_FILES['image']['tmp_name'], '../../upload/'.$newname);
                
                $update = mysqli_query($conn,"UPDATE `tb_routine_progress` 
                                        SET  `progress`='$progress', `image` = '$newname', `end_date` = '$now_time',
                                        attachment_name = '".$attachment_name."', attachment_status = '".$attachment_status."'
                                        WHERE id = '$id' 
                                        AND user = '$users'") or die(mysqli_error($conn));
                // die($extensi);
                //update tb_routine
                $query = "UPDATE `tb_routine` SET `progress`='$progress', `end_date` = '$now_time', status=3 WHERE id = '$routine_id' AND user = '$users'";
                $update = mysqli_query($conn,$query) or die(mysqli_error($conn));
                
                header('location:../view-working.php?notif=1');
            }
        }
        else {
            header('location:../routine-progress.php?id='.$routine_id.'&notif=3'); 
        }
    }
    else {
        //update tb_routine_progress
        $query = "UPDATE `tb_routine_progress` SET  `progress`='$progress', `description` = '$description', `end_date` = '$now_time' WHERE id = '$id' AND user = '$users'";
        
        $update = mysqli_query($conn,$query) or die(mysqli_error($conn));
        
        //update tb_routine
        $query = "UPDATE `tb_routine` SET `progress`='$progress', `end_date` = '$now_time', status=3 WHERE id = '$routine_id' AND user = '$users'";
        $update = mysqli_query($conn,$query) or die(mysqli_error($conn));
        
        header('location:../view-working.php?notif=1');
    }
?>