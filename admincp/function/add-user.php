<?php
	require_once('session.php');
    $user = $_POST['user'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $level = $_POST['level'];
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
    $join_date = date('Y-m-d H:i:s');
    $kode = date('YdmHis');
    $tipe_gambar = array('image/jpeg','image/bmp', 'image/x-png', 'image/png');
    $gbr = $_FILES['image']['name'];
    $ukuran = $_FILES['image']['size'];
    $tipe = $_FILES['image']['type'];
    $error = $_FILES['image']['error'];
    $explode = explode('.',$gbr);
    $extensi  = $explode[count($explode)-1];
    $newname = 'profile_'.$users.'_'.$kode.'.'.$extensi;
    if($_FILES['image']['size'] <= 1024000){
        if($gbr !=="" && $error == 0){
           if(in_array(strtolower($tipe), $tipe_gambar)){
                move_uploaded_file($_FILES['image']['tmp_name'], '../../upload/'.$newname);
                $query = mysqli_query($conn,"INSERT INTO `tb_user` (`full_name`, `email`, `image`, `no_hp`, `alamat`, `provinsi`, `kota`, `user`, `pass`, `re_pass`, `level`, `join_date`, `status`, `token_id`) VALUES ('$full_name', '$email', '$newname', '$no_hp', '$alamat', '$provinsi', '$kota', '$user', '$pass', '$re_pass', '$level', '$join_date', 1, 0)") or die(mysqli_error());
                header('location:../adduser.php?notif=1');
           }
           else {
                header('location:../adduser.php?notif=3');
           } 
        }
        else {
            $query = mysqli_query($conn,"INSERT INTO `tb_user` (`full_name`, `email`, `image`, `no_hp`, `alamat`, `provinsi`, `kota`, `user`, `pass`, `re_pass`, `level`, `join_date`, `status`, `token_id`) VALUES ('$full_name', '$email', 'avatar5.png', '$no_hp', '$alamat', '$provinsi', '$kota', '$user', '$pass', '$re_pass', '$level', '$join_date', 1, 0)") or die(mysqli_error());
            header('location:../adduser.php?notif=1');
        }
    }
    else if($_FILES['image']['size'] >= 1024000 || $_FILES['image']['size'] == 0){
        header('location:../adduser.php?notif=2');
    }
?>