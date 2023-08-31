<?php 
include 'header.php';
$id = base64_decode($_GET['id']);
if (isset($id)) {
	
	$query = "SELECT * FROM data_cacat WHERE id = '$id'";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		 die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
	}

	$data = mysqli_fetch_assoc($result);

	if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='dashboard.php';</script>";
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
                <h3 class="card-title">Edit Data <span class="bg-danger"><?php echo $data['nomor_cacat']; ?></span> <i class="bi bi-bookmarks"></i></h3>

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
                		<label class="form-label" for="nomor_cacat">Kode Defect</label>
                		<input type="text" name="nomor_cacat" class="form-control" id="nomor_cacat" placeholder="Masukkan Kode Defect" value="<?php echo $data['nomor_cacat']; ?>">
                	</div>

                	<div class="mb-3">
                		<label class="form-label" for="jenis_cacat">Jenis Cacat</label>
                		<textarea id="jenis_cacat" name="jenis_cacat" class="form-control" placeholder="Masukkan Jenis Cacat"><?php echo $data['jenis_cacat']; ?></textarea>
                	</div>

                	<div class="mb-3">
                		<label class="form-label" for="penyebab_cacat">Penyebab Cacat</label>
                		<textarea id="penyebab_cacat" class="form-control" name="penyebab_cacat" placeholder="Masukkan Jenis Cacat"><?php echo $data['penyebab_cacat']; ?></textarea>
                	</div>

                	<div class="mb-3">
                		<label class="form-label" for="tindakan">Tindakan</label>
                		<textarea class="form-control" id="tindakan" name="tindakan" placeholder="Masukkan Tindakan"><?php echo $data['tindakan']; ?></textarea>
                	</div>

                	<input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                	<button type="submit" name="submit" class="btn btn-primary bg-gradient">Input</button>
                </form>
                <?php 
                if (isset($_POST['submit'])) {
                	$id = htmlspecialchars($_POST['id']);
                	$nomor_cacat = htmlspecialchars($_POST['nomor_cacat']);
                	$jenis_cacat = htmlspecialchars($_POST['jenis_cacat']);
                	$penyebab_cacat = htmlspecialchars($_POST['penyebab_cacat']);
                	$tindakan = htmlspecialchars($_POST['tindakan']);

                	$query  = "UPDATE data_cacat SET nomor_cacat = '$nomor_cacat', jenis_cacat = '$jenis_cacat', penyebab_cacat = '$penyebab_cacat', tindakan = '$tindakan' WHERE id = '$id'";

                	$result = mysqli_query($koneksi, $query);
                		$url = "controller.php?page=".base64_encode("data_cacat");
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