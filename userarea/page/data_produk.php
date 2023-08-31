<?php include 'header.php'; ?>
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

       	  <div class="row">
          <div class="col-md-8">
            <div class="card card-primary shadow-lg">
              <div class="card-header">
                <h3 class="card-title">Data Produk <i class="bi bi-bookmarks"></i></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                	<thead>
                		<tr>
                			<th>No</th>
                			<th>Kode Produk</th>
                			<th>Nama Material</th>
                			<th>Keterangan Produk</th>
                			<th>Jadwal Produksi</th>
                			<th>Action</th>
                		</tr>
                	</thead>
                	<tbody>
                		<?php 
                		$query = mysqli_query($koneksi, "SELECT * FROM data_produk ORDER BY id");
                		$no = 1;
                		while ($row = mysqli_fetch_assoc($query)) {
                		 ?>
                		<tr>
                			<td><?php echo $no; ?></td>
                			<td><?php echo $row['kode_produk']; ?></td>
                			<td><?php echo $row['nama_material']; ?></td>
                			<td><?php echo $row['keterangan'] ?></td>
                			<td><?php echo $row['jadwal_produksi']; ?> - <?php echo igDate($row['jadwal_produksi']); ?></td>
                			<td>
                				<div class="btn-group">
                				<a href="controller.php?page=<?php echo base64_encode("edit_produk"); ?>&id=<?php echo base64_encode($row['id']); ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                				<a onclick="return confirm ('Yakin Hapus?')" href="controller.php?page=<?php echo base64_encode("hapus_produk"); ?>&id=<?php echo base64_encode($row['id']); ?>" class="btn btn-danger"><i class="bi bi-trash3"></i> Hapus</a>
                			</div>
                			</td>
                		</tr>
                		<?php $no++; } ?>
                	</tbody>
                	<tfoot>
                		<tr>
                			<td colspan="5"><b>Total Produk</b></td>
                			<td class="text-center"><b><?php hitung_produk(); ?></b></td>
                		</tr>
                	</tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-4">
            <div class="card card-success shadow-lg">
              <div class="card-header">
                <h3 class="card-title">Tambah Produk <i class="bi bi-input-cursor-text"></i></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Input Area -->	
                <form action="" method="POST">
                <div class="mb-3">
                	<label class="form-label" for="kode_produk">Kode Produk</label>
                	<input type="text" id="kode_produk" name="kode_produk" class="form-control" placeholder="Masukkan Kode Produk" value="">
                </div>

                <div class="mb-3">
                	<label class="form-label" for="nama_material">Nama Material</label>
                	<input type="text" id="nama_material" class="form-control" name="nama_material" placeholder="Masukkan Nama Material">
                </div>

                <div class="mb-3">
                	<label class="form-label" for="keterangan_produk">Keterangan Produk</label>

                	<textarea class="form-control" id="keterangan_produk" name="keterangan_produk" placeholder="Masukkan Keterangan Produk"></textarea>
                </div>

                <input type="hidden" name="jadwal_produksi" value="<?php echo date('d F Y, h:i:s A'); ?>">

                <button type="submit" class="btn btn-primary bg-gradient" name="submit">Input</button>
            </form>
            <?php 
            if (isset($_POST['submit'])) {
            	$kode_produk = htmlspecialchars($_POST['kode_produk']);
            	$nama_material = htmlspecialchars($_POST['nama_material']);
            	$keterangan_produk = htmlspecialchars($_POST['keterangan_produk']);

            	$jadwal_produksi = htmlspecialchars($_POST['jadwal_produksi']);

            	$query = "INSERT INTO data_produk (kode_produk,nama_material,keterangan,jadwal_produksi) VALUES ('$kode_produk', '$nama_material', '$keterangan_produk', '$jadwal_produksi')";
					
					$result = mysqli_query ($koneksi,$query);

					$url = $_SERVER['REQUEST_URI'];

					echo "<script>alert('Data Berhasil Diinput');window.location='$url';</script>";

            }
             ?>

                <!-- End Input Area -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
         


        </div>
        <!-- /.row -->



<?php include 'footer.php'; ?>