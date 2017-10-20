<?php
	require_once('session.php');
    $users = $u['user'];
    $title = $_POST['title'];
    $keyword = $_POST['keyword'];
    $deskripsi = $_POST['deskripsi'];
    $gmap = $_POST['gmap'];
    $date = date('Y-m-d H:i:s');
    $kode = date('YdmHis');
    $tipe_gambar = array('image/jpeg','image/bmp', 'image/x-png', 'image/png');
    $gbr = $_FILES['image']['name'];
    $ukuran = $_FILES['image']['size'];
    $tipe = $_FILES['image']['type'];
    $error = $_FILES['image']['error'];
    $explode = explode('.',$gbr);
    $extensi  = $explode[count($explode)-1];
    $newname = 'logo_'.$users.'_'.$kode.'.'.$extensi;
    if($_FILES['image']['size'] <= 512000){
        if($gbr !=="" && $error == 0){
           if(in_array(strtolower($tipe), $tipe_gambar)){
                move_uploaded_file($_FILES['image']['tmp_name'], '../../upload/'.$newname);
                $query = mysqli_query($conn,"UPDATE `tb_seo` SET `image` = '$newname', `title` = '$title', `keyword` = '$keyword', `deskripsi` = '$deskripsi', `gmap` = '$gmap', `date` = '$date' WHERE user = '$users'") or die(mysqli_error());
                header('location:../setting.php?notif=1');
           }
           else {
                header('location:../setting.php?notif=3');
           } 
        }
        else {
            $query = mysqli_query($conn,"UPDATE `tb_seo` SET `title` = '$title', `keyword` = '$keyword', `deskripsi` = '$deskripsi', `gmap` = '$gmap', `date` = '$date' WHERE user = '$users'") or die(mysqli_error());
                header('location:../setting.php?notif=1');
        }
    }
    else if($_FILES['image']['size'] >= 512000 || $_FILES['image']['size'] == 0){
        header('location:../setting.php?notif=2');
    }
?>