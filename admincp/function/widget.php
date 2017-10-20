<?php
	require_once('session.php');

    $users = $u['user'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $googleplus = $_POST['googleplus'];
    $instagram = $_POST['instagram'];
    $path = $_POST['path'];
    $youtube = $_POST['youtube'];
    $linkedin = $_POST['linkedin'];
    $date = date('Y-m-d H:i:s');
    $cek = mysqli_query($conn,"SELECT * FROM `tb_social` WHERE user = '$users'") or die(mysqli_error());
    $c = mysqli_num_rows($cek);
    if($c == 0){
    	$query = mysqli_query($conn,"INSERT INTO `tb_social` (`facebook`,`twitter`,`googleplus`,`instagram`,`path`,`linkedin`,`youtube`,`date`,`user`) VALUES ('$facebook','$twitter','$googleplus','$instagram','$path','$linkedin','$youtube','$date','$users')") or die(mysqli_error());
	    header('location:../widget.php?notif=1');
    }
    else {
	    $query = mysqli_query($conn,"UPDATE `tb_social` SET `facebook` = '$facebook',`twitter` = '$twitter', `googleplus` = '$googleplus', `instagram` = '$instagram', `path` = '$path', `linkedin` = '$linkedin', `youtube` = '$youtube', `date` = '$date' WHERE user = '$users'") or die(mysqli_error());
	    header('location:../widget.php?notif=1');
	}
?>