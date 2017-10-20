<?php
ob_start();
session_start();
include('../config/koneksi.php');
$user =mysqli_query($conn,"SELECT * FROM `tb_user` WHERE user = '".$_SESSION['user']."'") or die (mysqli_error());
$u = mysqli_fetch_array($user);

error_reporting(0);
if($_GET['id']){
    
    $kabupaten = mysqli_query($conn, 
        "SELECT * FROM `tb_regency` 
        WHERE id_tb_province = ".$_GET['id']."
        ORDER BY name");
        
    echo"<option selected value=''> -- Pilih Kota -- </option>";
    while($kabupaten_row = mysqli_fetch_array($kabupaten)){
?>
    <option value='<?php echo $kabupaten_row['id']; ?>'<?php if($kabupaten_row['name'] == $u['kota']){ echo ' selected = selected'; } else { ''; }?>><?php echo $kabupaten_row['name']; ?></option>";
<?php
    }
    
}
?>