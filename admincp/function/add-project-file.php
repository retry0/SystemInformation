
<?php
    require_once('session.php');
  
    $document_name = $_POST['document_name'];
    $newdocument = str_replace(" ","-",$document_name);
    $status = $_POST['status'];

    $tipe_gambar = array('jpg','png','bmp','doc','docx','xls','xlsx','ppt','pptx','pdf');
    $gbr = $_FILES['file_name']['name'];
    $ukuran = $_FILES['file_name']['size'];
    $tipe = $_FILES['file_name']['type'];
    $error = $_FILES['file_name']['error'];
    $explode = explode('.',$gbr);
    $extensi  = $explode[count($explode)-1];
    $newname = $newdocument.'.'.$extensi;

    if ($gbr !=="" && $error == 0) {
        if ($extensi == 'jpg' || $extensi == 'png' || $extensi == 'doc' || $extensi == 'docx' || $extensi == 'xls' || $extensi == 'xlsx' || $extensi == 'ppt' || $extensi == 'pptx' || $extensi == 'pdf' || $extensi == 'bmp' ) {
            move_uploaded_file($_FILES['file_name']['tmp_name'], '../../upload/Project_File/'.$newname);
        $insert = mysqli_query($conn,"INSERT INTO `tb_project_file` (`document_name`,`file_name`,`status`) VALUES ('$document_name','$newname','$status')") or die(mysqli_error($conn));            
        header('location:../addprojectfile.php?id='.$id.'&notif=1');
        }
        else {
            header('location:../projectfile.php?id='.$id.'&notif=3'); 
        }
    }
    else {
        $insert = mysqli_query($conn,"INSERT INTO `tb_project_file` (`document_name`,`file_name`,`status`) VALUES ('$document_name','$newname','$status')") or die(mysqli_error($conn));            
            header('location:../addprojectfile.php?id='.$id.'&notif=1');
    }
?>