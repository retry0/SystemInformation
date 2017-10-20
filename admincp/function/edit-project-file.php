<?php
	require_once('session.php');
    // die('asd'.$_GET['id']);
    // var_dump($_FILES);
    // die(var_dump($_POST));
    
    $id = $_GET['id'];
    $project_id = $_GET['project_id'];
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
    $newname = $attachment_name.'_'.$date.'.'.$extensi;

    
    if ($gbr !=="" && $error == 0) {
        if ( in_array($extensi, $tipe_file) ) {
            if(($_FILES['image']['size'] > $config['max_upload_size']) || ($_FILES["image"]["size"] == 0)) {
                header('location:../editprojectfile.php?id='.$id.'&notif=2'); 
            }
            else{
                move_uploaded_file($_FILES['image']['tmp_name'], '../../upload/'.$newname);
                $query = "UPDATE `tb_task_progress` 
                        SET `image` = '$newname',
                        attachment_name = '".$attachment_name."', attachment_status = '".$attachment_status."'                                    
                        WHERE task_id = '$id'";
                // die($query);
                $update = mysqli_query($conn,$query) or die(mysqli_error($conn));
                
                
                header('location:../projectfile.php?id='.$project_id.'&notif=1');
            }
        }
        else {
            header('location:../editprojectfile.php?id='.$id.'&notif=3'); 
        }
    }
    else {
            header('location:../editprojectfile.php?id='.$id.'&notif=3'); 
    }
?>