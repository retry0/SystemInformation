<?php
	require_once('session.php');

    $company = $_POST['company'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
   
    
    $query = mysqli_query($conn,"INSERT INTO `tb_client` (`company`, `full_name`, `email`, `no_hp`, `alamat`) VALUES ('$company', '$full_name', '$email', '$no_hp', '$alamat')") or die(mysqli_error());
    header('location:../addclient.php?notif=1');
?>