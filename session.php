<?php
// ob_start();
session_start();
date_default_timezone_set("Asia/Kuala_Lumpur");//Kuala_Lumpur

include('config/koneksi.php');

error_reporting(0);

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


?>
