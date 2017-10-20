<?php
	require_once('session.php');

    $id = $_GET['id'];   
    $asset_name = $_POST['asset_name'];
    $asset_description = $_POST['asset_description'];
    $date_of_purchase = $_POST['date_of_purchase'];
    $serial_number = $_POST['serial_number'];
    $brand = $_POST['brand'];
    $owner = $_POST['owner'];
    $status = $_POST['status'];
    $image = $_POST['image'];
    $location = $_POST['location'];
    $pic = $_POST['pic'];
    $query = mysqli_query($conn,"UPDATE `tb_asset` SET `asset_name` = '$asset_name', `asset_description` = '$asset_description', `date_of_purchase` = '$date_of_purchase', `brand` = '$brand', `status` = '$status', `image` = '$image', `location` = '$location', `pic` = '$pic' WHERE id = '$id'") or die(mysqli_error());
    header('location:../editasset.php?id='.$id.'&notif=1');
?>