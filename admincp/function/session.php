<?php
ob_start();
session_start();
if (empty($_SESSION['user']) AND empty($_SESSION['pass'])){
  header('location:../login.php');
  exit;
}
date_default_timezone_set("Asia/Jakarta");
include('../../config/koneksi.php');

error_reporting(0);
$user =mysqli_query($conn,"SELECT * FROM `tb_user` WHERE user = '$_SESSION[user]'") or die (mysqli_error());
$u = mysqli_fetch_array($user);
$users = $u['user'];
$token_id = isset($u['token_id']) ? $u['token_id'] : false;
$level = isset($u['level']) ? $u['level'] : false;

if(!validateToken($token_id)){
	$_SESSION['token'] = "";
	$_SESSION['user'] = "";
	$_SESSION['pass'] = "";
	header('location:login.php?error=5');
	exit;
}

function validateToken($token_id){
    $conn = $GLOBALS['conn'];
	$q = mysqli_query($conn,"SELECT * FROM `tb_token` WHERE id='$token_id';") or die(mysqli_error($conn));
	if (mysqli_num_rows($q) > 0) {
		$token_data = mysqli_fetch_array($q);
		$token = $token_data['token'];
		$session_token = isset($_SESSION['token']) ? $_SESSION['token'] : "";
		
		if($token == $session_token){
			return true;
		}
	}
	
	return false;
}


//500KB = 512000byte
$config['max_upload_size'] = 15728640; //15(MB) * 1024(KB) * 1024(BYTE)

?>