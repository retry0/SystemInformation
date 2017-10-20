<?php
date_default_timezone_set("Asia/Jakarta");
include('../config/koneksi.php');
$query = "SELECT * from jadwalku ";
$result = mysql_query($query) or die(mysql_error());

$arr = array();
while ($row = mysql_fetch_assoc($result)) {
    $temp = array(
        "date" => $row["date"],       
        "title" => $row["title"],
        "description" => $row["description"]);

    array_push($arr, $temp);}
$data = json_encode($arr);
echo $data
?>