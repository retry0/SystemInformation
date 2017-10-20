<?php
	require_once('session.php');

    $id = $_GET['id'];
    $company = $_POST['company'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $query = mysqli_query($conn,"UPDATE `tb_client` SET `full_name` = '$full_name',
                                                      `email` = '$email',
                                                      `company` = '$company',
                                                      `no_hp` = '$no_hp',
                                                      `alamat` = '$alamat'
                                                      WHERE id = '$id'") or die(mysqli_error());
    header('location:../editclient.php?id='.$id.'&notif=1');
?>