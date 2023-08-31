  <?php include 'header.php'; ?>
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- Small boxes (Stat box) -->
         <div class="row">
          <div class="col-md-8">
            <div class="card card-danger shadow-lg">
              <div class="card-header">
                <h3 class="card-title">Data Produksi <i class="bi bi-clipboard-data"></i></h3>
  
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
                      <th>No Produksi</th>
                      <th>Nama Produksi</th>
                      <th>Tanggal Produksi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM data_produksi ORDER BY id");
                    while ($row = mysqli_fetch_assoc($query)) {
                     ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['no_produksi']; ?></td>
                      <td><?php echo $row['nama_material']; ?></td>
                      <td><?php echo $row['tanggal_produksi']; ?></td>
                      <td>
                        <div class="btn-group">
                        <a class="btn btn-primary" href="controller.php?page=<?php echo base64_encode('kendali_kualitas'); ?>"> View Data</a>
                        <a class="btn btn-secondary" href="controller.php?page=<?php echo base64_encode('edit_produksi'); ?>&id=<?php echo base64_encode($row['id']); ?>"> Edit Data</a>
                        <a class="btn btn-danger" onclick="return confirm ('Yakin Hapus?')" href="controller.php?page=<?php echo base64_encode("hapus_produksi"); ?>&id=<?php echo base64_encode($row['id']); ?>">Hapus</a>
                      </td>
                    </tr>
                    <?php $no++; } ?>
                  </tbody>
                </table>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-4">
            <div class="card card-primary shadow-lg">
              <div class="card-header">
                <h3 class="card-title">Tambah Jadwal Poduksi Baru <i class="bi bi-clipboard-data"></i></h3>

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
                  <label class="form-label" for="no_produksi">Nomor Produksi</label>
                  <input type="text" id="no_produksi" name="no_produksi" class="form-control" placeholder="Masukkan Nomor Produksi">
                </div>

                <div class="mb-3">
                  <label for="nama_material" class="form-label">Nama Material</label>
                  <select class="form-control" name="nama_material">
                    <option value="">Pilih Material</option>
                    <?php
                    $query = "SELECT * FROM data_produk ORDER BY id";
                    $result = mysqli_query($koneksi, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <option value="<?php echo $row['nama_material']; ?>"><?php echo $row['nama_material']; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="tanggal_produksi">Tanggal Produksi</label>
                  <input type="date" class="form-control" name="tanggal_produksi">
                </div>

                <div class="mb-3">
                  <label class="form-label" for="total_sample">Total Sample</label>
                  <input type="number" name="total_sample" class="form-control">
                </div>

                <div class="mb-3">
                  <label class="form-label" for="total_defect">Total Defect</label>
                  <input type="number" name="total_defect" class="form-control">
                </div>


                <button type="submit" name="submit" class="btn btn-primary bg-gradient">Input</button>
</form>
<?php
if (isset($_POST['submit'])) {
  $no_produksi = htmlspecialchars($_POST['no_produksi']);
  $nama_material = htmlspecialchars($_POST['nama_material']);
  $tanggal_produksi = htmlspecialchars($_POST['tanggal_produksi']);
  $total_sample = htmlspecialchars($_POST['total_sample']);
  $total_defect = htmlspecialchars($_POST['total_defect']);

  // $proporsi_cacat = $total_sample / $total_defect;
  // $presentase_cacat = $proporsi_cacat * 100;

//   var_dump($total_sample, $total_defect);


  $proporsiCacat =  $total_defect / $total_sample;
$persentaseCacat = $proporsiCacat * 100;

$jml_sample = rand(1,999);
$jml_cacat = rand(1,999);

$query1 = "INSERT INTO data_produksi (no_produksi,nama_material,tanggal_produksi,total_sample,total_defect) VALUES ('$no_produksi', '$nama_material', '$tanggal_produksi', '$total_sample', '$total_defect')";

$result = mysqli_query($koneksi,$query1);





// echo "Proporsi cacat: " . $proporsiCacat . "\n";
// echo "Persentase cacat: " . $persentaseCacat . "%";

// $totalItem = 32;
// $jmlCacat = 12;
// $proporsiCacat = $jmlCacat / $totalItem;
// $persentaseCacat = $proporsiCacat * 100;
// echo "Proporsi cacat: " . $proporsiCacat . "\n";
// echo "Persentase cacat: " . $persentaseCacat . "%";






}



 ?>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->



<?php include 'footer.php'; ?>