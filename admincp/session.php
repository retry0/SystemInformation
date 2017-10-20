<?php
// ob_start();
session_start();
$timeout=30;
$logout_redirect_url="login.php";
$timeout=$timeout*60;
if (empty($_SESSION['user']) AND empty($_SESSION['pass'])){
  header('location:login.php');
  exit;
}

date_default_timezone_set("Asia/Jakarta");//Kuala_Lumpur

include('../config/koneksi.php');

error_reporting(0);

$user =mysqli_query($conn,"SELECT * FROM `tb_user` WHERE user = '$_SESSION[user]'") or die (mysqli_error($conn));
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
if(isset($_SESSION['start_time'])){
	$elapsed_time=time()-$_SESSION['start_time'];
	if($elapsed_time>=$timeout){
		session_destroy();
        echo "<script>alert('Time Login Expired'); window.location = '$logout_redirect_url'</script>";	
    }
}

$_SESSION['start_time']=time();

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


function get_staff(){
    $conn = $GLOBALS['conn'];
    
	$staff = mysqli_query($conn, "SELECT * FROM `tb_user` 
                            WHERE level = 'staff' 
                            ORDER BY id ASC");
    $result_staff = mysqli_fetch_all($staff, MYSQLI_ASSOC);
    
    return $result_staff;
}

function get_staff_option(){
    $staff = get_staff();
    $return = '';
    
    foreach ($staff as $key => $val){
        $return .= '<option value="'.$val['user'].'">'.$val['full_name'].'</option>';
    }
    
    return $return;
}
function get_svp(){
    $conn = $GLOBALS['conn'];
    
	$staff = mysqli_query($conn, "SELECT * FROM `tb_user` 
                            WHERE level = 'supervisor' 
                            ORDER BY id ASC");
    $result_staff = mysqli_fetch_all($staff, MYSQLI_ASSOC);
    
    return $result_staff;
}

function get_svp_option(){
    $staff = get_svp();
    $return = '';
    
    foreach ($staff as $key => $val){
        $return .= '<option value="'.$val['user'].'">'.$val['full_name'].'</option>';
    }
    
    return $return;
}

function get_notification_break(){
    global $conn;
    
    $query = "SELECT COUNT(*) as total, 'routine' as type 
            FROM `tb_routine_progress` rp
            WHERE (rp.break_end='0000-00-00 00:00' OR rp.break_end IS NULL) 
            AND (rp.end_date='0000-00-00 00:00' OR rp.end_date IS NULL) 
            AND rp.break_start < date_sub(now(), interval 30 minute)
            AND rp.user='".$_SESSION['user']."'
            HAVING total >0
            UNION 
            SELECT COUNT(*) as total, 'task' as type 
            FROM `tb_task_progress` tp
            WHERE (tp.break_end='0000-00-00 00:00' OR tp.break_end IS NULL) 
            AND (tp.end_date='0000-00-00 00:00' OR tp.end_date IS NULL) 
            AND tp.break_start < date_sub(now(), interval 30 minute)
            AND tp.user='".$_SESSION['user']."'
            HAVING total >0
            ";
    $result = mysqli_query($conn, $query);
    
    return mysqli_fetch_all($result,MYSQLI_ASSOC);
}

function get_notification_deadline(){
    global $conn;
    
    $query = "SELECT COUNT(*) as total, 'routine' as type FROM `tb_routine` r
            WHERE r.end_date < date_add(now(), interval 3 day) AND r.status=1
            AND r.user='".$_SESSION['user']."'
            HAVING total >0
            UNION 
            SELECT COUNT(*) as total, 'task' as type FROM `tb_task` t
            WHERE t.end_date < date_add(now(), interval 3 day) AND t.status=1
            AND t.user='".$_SESSION['user']."'
            HAVING total >0";
    $result = mysqli_query($conn, $query);
    
    return mysqli_fetch_all($result,MYSQLI_ASSOC);
}

?>