<?php include 'header.php'; ?>
<section class="content">
      <div class="container-fluid">
        
        <!-- Small boxes (Stat box) -->
         <div class="row">
          <div class="col-md-8">
            <div class="card card-secondary shadow-lg">
              <div class="card-header">
                <h3 class="card-title">Data Cacat <i class="bi bi-clipboard-data"></i></h3>

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
              				<th>Kode Defect</th>
              				<th>Jenis Cacat</th>
              				<th>Penyebab Cacat</th>
              				<th>Tindakan</th>
              				<th>Action</th>
              			</tr>
              		</thead>
              		<tbody>
              			<?php 
              			$query = "SELECT * FROM data_cacat ORDER BY id";
              			$result = mysqli_query($koneksi, $query);
              			$no = 1;
              			while ($row = mysqli_fetch_assoc($result)) {
              			 ?>
              			 <tr>
              			 	<td><?php echo $no; ?></td>
              			 	<td><?php echo $row['nomor_cacat']; ?></td>
              			 	<td><?php echo $row['jenis_cacat']; ?></td>
              			 	<td><?php echo $row['penyebab_cacat']; ?></td>
              			 	<td><?php echo $row['tindakan']; ?></td>
              			 	<td>
              			 		<div class="btn-group">
              			 				<a class="btn btn-primary bg-gradient" href="controller.php?page=<?php echo base64_encode("edit_cacat"); ?>&id=<?php echo base64_encode($row['id']); ?>"><i class="bi bi-pencil-square"></i> Edit</a>
              			 				<a onclick="return confirm ('Yakin Hapus?')" class="btn btn-danger bg-gradient" href="controller.php?page=<?php echo base64_encode("hapus_cacat"); ?>&id=<?php echo base64_encode($row['id']); ?>"><i class="bi bi-trash3"></i> Hapus</a>
              			 		</div>
              			 	</td>
              			 </tr>
              			 <?php $no++; } ?>
              		</tbody>
              		<tfoot>
              			<tr>
              				<td colspan="5"><b>Total Data</b></td>
              				<td><b><?php echo hitung_data_cacat(); ?></b></td>
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
            <div class="card card-warning shadow-lg">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Cacat <i class="bi bi-input-cursor-text"></i></h3>

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
                		<label class="form-label" for="nomor_cacat">Kode Defect</label>
                		<input type="text" name="nomor_cacat" class="form-control" id="nomor_cacat" placeholder="Masukkan Kode Defect">
                	</div>

                	<div class="mb-3">
                		<label class="form-label" for="jenis_cacat">Jenis Cacat</label>
                		<textarea id="jenis_cacat" name="jenis_cacat" class="form-control" placeholder="Masukkan Jenis Cacat"></textarea>
                	</div>

                	<div class="mb-3">
                		<label class="form-label" for="penyebab_cacat">Penyebab Cacat</label>
                		<textarea id="penyebab_cacat" class="form-control" name="penyebab_cacat" placeholder="Masukkan Jenis Cacat"></textarea>
                	</div>

                	<div class="mb-3">
                		<label class="form-label" for="tindakan">Tindakan</label>
                		<textarea class="form-control" id="tindakan" name="tindakan" placeholder="Masukkan Tindakan"></textarea>
                	</div>

                	<button type="submit" name="submit" class="btn btn-primary bg-gradient">Input</button>
                </form>
                <?php 
                if (isset($_POST['submit'])) {
                	$nomor_cacat = htmlspecialchars($_POST['nomor_cacat']);
                	$jenis_cacat = htmlspecialchars($_POST['jenis_cacat']);
                	$penyebab_cacat = htmlspecialchars($_POST['penyebab_cacat']);
                	$tindakan = htmlspecialchars($_POST['tindakan']);

                	$query = "INSERT INTO data_cacat (nomor_cacat,jenis_cacat,penyebab_cacat,tindakan) VALUES ('$nomor_cacat', '$jenis_cacat', '$penyebab_cacat', '$tindakan')";

                	$result = mysqli_query($koneksi, $query);
                		echo "<script>alert('Data Berhasil Diinput');window.location='$server';</script>";
                }

                 ?>
                 </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
         


        </div>
        <!-- /.row -->



<?php include 'footer.php'; ?>


