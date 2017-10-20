<?php
  require_once('session.php');
    // membaca id file dari link
    $id = $_GET['id'];

    // membaca informasi file dari tabel berdasarkan id nya
    $query  = mysqli_query($conn,"SELECT * FROM tb_project_file WHERE id = '$id'")or die(mysqli_error());;
    $file_name  = mysql_query($query);

    // header yang menunjukkan nama file yang akan didownload
    header("Content-Disposition: attachment; filename=".$file_name['file_name']);

    // header yang menunjukkan ukuran file yang akan didownload
    header("Content-length: ".$file_name['size']);

    // header yang menunjukkan jenis file yang akan didownload
    header("Content-type: ".$file_name['type']);

   // proses membaca isi file yang akan didownload dari folder 'data'
   $fp  = fopen("../../upload/Project_File/".$file_name['file_name'], 'r');
   $content = fread($fp, filesize('../../upload/Project_File/'.$file_name['file_name']));
   fclose($fp);

   // menampilkan isi file yang akan didownload
   echo $content;

   exit;
?>