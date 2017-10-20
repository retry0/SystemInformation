<?php
	require_once('session.php');
    $users = $_GET['user'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $idprovinsi = $_POST['provinsi'];
    $provinsie = mysqli_query($conn, "SELECT * FROM `tb_province` WHERE id = '$idprovinsi'");
    $p = mysqli_fetch_array($provinsie);
    $provinsi = $p['name'];
    $idkota = $_POST['kota'];
    $kotae = mysqli_query($conn, "SELECT * FROM `tb_regency` WHERE id = '$idkota'");
    $k = mysqli_fetch_array($kotae);
    $kota = $k['name'];
    $pass = md5($_POST['pass']);
    $re_pass = $_POST['pass'];
    $kode = date('YdmHis');
    $tipe_gambar = array('image/jpeg','image/bmp', 'image/x-png', 'image/png');
    $gbr = $_FILES['image']['name'];
    $ukuran = $_FILES['image']['size'];
    $tipe = $_FILES['image']['type'];
    $error = $_FILES['image']['error'];
    $explode = explode('.',$gbr);
    $extensi  = $explode[count($explode)-1];
    $newname = 'profile_'.$users.'_'.$kode.'.'.$extensi;
    if($_FILES['image']['size'] <= 512000){
        if($gbr !=="" && $error == 0){
           if(in_array(strtolower($tipe), $tipe_gambar)){
                move_uploaded_file($_FILES['image']['tmp_name'], '../../upload/'.$newname);
                $query = mysqli_query($conn,"UPDATE `tb_user` SET `full_name` = '$full_name',
                                                                    `email` = '$email',
                                                                    `image` = '$newname',
                                                                    `no_hp` = '$no_hp',
                                                                    `alamat` = '$alamat',
                                                                    `provinsi` = '$provinsi',
                                                                    `kota` = '$kota',
                                                                    `pass` = '$pass',
                                                                    `re_pass` = '$re_pass'
                                                                    WHERE user = '$users'") or die(mysqli_error());
                header('location:../profile.php?notif=1');
           }
           else {
                header('location:../profile.php?notif=3');
           } 
        }
        else {
            $query = mysqli_query($conn,"UPDATE `tb_user` SET `full_name` = '$full_name',
                                                                    `email` = '$email',
                                                                    `image` = '$newname',
                                                                    `no_hp` = '$no_hp',
                                                                    `alamat` = '$alamat',
                                                                    `provinsi` = '$provinsi',
                                                                    `kota` = '$kota',
                                                                    `pass` = '$pass',
                                                                    `re_pass` = '$re_pass'
                                                                WHERE user = '$users'") or die(mysqli_error());
            header('location:../profile.php?notif=1');
        }
    }
    else if($_FILES['image']['size'] >= 512000 || $_FILES['image']['size'] == 0){
        header('location:../profile.php?notif=2');
    }
?>