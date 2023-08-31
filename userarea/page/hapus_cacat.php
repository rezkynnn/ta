<?php 
include 'header.php';
$id = base64_decode($_GET['id']);
 ?>
 <section class="content">
      <div class="container-fluid">
      <?php 
        $query = "DELETE FROM data_cacat WHERE id='$id' ";
    $hasil_query = mysqli_query($koneksi, $query);

    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {

     $url = "controller.php?page=".base64_encode("data_cacat");
      echo "<script>alert('Data berhasil dihapus.');window.location='$url';</script>";
    }
       ?>

 <?php include 'footer.php'; ?>