<?php
	require_once('session.php');

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

    $query = mysqli_query($conn,"INSERT INTO `tb_asset` (`asset_name`, `asset_description`, `date_of_purchase`, `serial_number`, `brand`, `owner`, `status`, `image`, `location`, `pic`) VALUES ('$asset_name', '$asset_description', '$date_of_purchase', '$serial_number', '$brand', '$owner', '$status', '$image', '$location', '$pic')") or die(mysqli_error());
    header('location:../addasset.php?notif=1');
?>