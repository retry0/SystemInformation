<?php
ob_start();
session_start();
include('../config/koneksi.php');
$user =mysqli_query($conn,"SELECT * FROM `tb_user` WHERE user = '".$_SESSION['user']."'") or die (mysqli_error());
$u = mysqli_fetch_array($user);

error_reporting(0);
if($_POST['ids']){
    
    $kabupaten = mysqli_query($conn,"SELECT * FROM `tb_project` WHERE id = ".$_POST['ids']."");
    $kabupaten_row = mysqli_fetch_array($kabupaten);
    	echo $kabupaten_row['pm'];
}
?>