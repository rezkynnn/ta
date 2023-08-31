<?php 
include 'header.php';
$id = base64_decode($_GET['id']);
if (isset($id)) {
	
	$query = "SELECT * FROM data_produk WHERE id = '$id'";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		 die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
	}

	$data = mysqli_fetch_assoc($result);

	if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {

  	echo "<script>alert('Masukkan data id.');window.location='dashboard.php';</script>";
	

}





 ?>
  <section class="content">
      <div class="container-fluid">
<div class="row">
          <div class="col-md-8">
            <div class="card card-primary shadow-lg">
              <div class="card-header">
                <h3 class="card-title">Edit Produk <span class="bg-danger"><?php echo $data['nama_material']; ?></span> <i class="bi bi-bookmarks"></i></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              	<form action="" method="POST">

              		<div class="mb-3">
                	<label class="form-label" for="kode_produk">Kode Produk</label>
                	<input type="text" id="kode_produk" name="kode_produk" class="form-control" placeholder="Masukkan Kode Produk" value="<?php echo $data['kode_produk']; ?>">
                </div>

                <div class="mb-3">
                	<label class="form-label" for="nama_material">Nama Material</label>
                	<input type="text" id="nama_material" class="form-control" name="nama_material" placeholder="Masukkan Nama Material" value="<?php echo $data['nama_material']; ?>">
                </div>

                <div class="mb-3">
                	<label class="form-label" for="keterangan_produk">Keterangan Produk</label>

                	<textarea class="form-control" id="keterangan_produk" name="keterangan_produk" placeholder="Masukkan Keterangan Produk"><?php echo $data['keterangan']; ?></textarea>
                </div>

                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <input type="hidden" name="jadwal_produksi" value="<?php echo date('d F Y, h:i:s A'); ?>">
              		
                <button type="submit" name="submit" class="btn btn-primary bg-gradient">Input</button>
              	</form>
              	<?php 
              	 if (isset($_POST['submit'])) {
              	$id = htmlspecialchars($_POST['id']);
            	$kode_produk = htmlspecialchars($_POST['kode_produk']);
            	$nama_material = htmlspecialchars($_POST['nama_material']);
            	$keterangan_produk = htmlspecialchars($_POST['keterangan_produk']);
            	$jadwal_produksi = htmlspecialchars($_POST['jadwal_produksi']);

            	$query  = "UPDATE data_produk SET kode_produk = '$kode_produk', nama_material = '$nama_material', keterangan = '$keterangan_produk', jadwal_produksi = '$jadwal_produksi' WHERE id = '$id'";

            	$result = mysqli_query($koneksi, $query);

            	$url = "controller.php?page=".base64_encode("data_produk");

           

            	echo "<script>alert('Data berhasil diubah.');window.location='$url';</script>";
            }

              	 ?>

              	 </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
 <?php include 'footer.php'; ?>