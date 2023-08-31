<?php 
include 'header.php';

function calculateControlLimits($n, $defects) {
    // Calculate proportion of defects (p)
    $p = $defects / $n;

    // Calculate CL (Center Line)
    $cl = $p;

    // Calculate UCL (Upper Control Limit)
    $ucl = $cl + 3 * sqrt($cl * (1 - $cl) / $n);

    // Calculate LCL (Lower Control Limit)
    $lcl = $cl - 3 * sqrt($cl * (1 - $cl) / $n);

    return array($ucl, $lcl, $cl);
}
 ?>
 <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->


        <!-- Content -->
                  <div class="row">
          <div class="col-md-3">
            <div class="card card-primary shadow-lg">
              <div class="card-header">
                <h3 class="card-title">Cari</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <div class="mb-3">
                <label class="form-label" for="nama_produk">Nama Produk</label>
                <select class="form-control" name="nama_produk" id="nama_produk">
                  <option value="semua_produk">Semua Produk</option>
                  <option value="nama_produk">Nama Produk</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label" for="tanggal_produksi">Tanggal Awal Produksi</label>
                <input type="date" class="form-control" id="tanggal_produksi" name="awal_produksi">
              </div>

              <div class="mb-3">
                <label class="form-label" for="akhir_produksi">Tanggal Akhir Produksi</label>
                <input type="date" class="form-control" id="akhir_produksi" name="akhir_produksi">
              </div>


              <button class="btn btn-block btn-danger" type="submit" name="submit">Cek</button>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-success shadow-lg">
              <div class="card-header">
                <h3 class="card-title">FMEA</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-xl">
                  Tambah FMEA
                </button>

                <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Peta Kendali Kualitas Produksi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>
                  <!-- Content -->
                  <div class="row">
          <div class="col-md-12">
            <div class="card card-primary shadow-lg">
              <div class="card-header">
                <h3 class="card-title">Cari</h3>

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
                <label class="form-label" for="jenis_cacat">Jenis Cacat</label>
                <select class="form-control" name="jenis_cacat" id="jenis_cacat">
                	<option value="">Pilih Jenis Cacat</option>
                	<?php 
                	$query = mysqli_query($koneksi, "SELECT * FROM data_cacat ORDER BY id");
                	while ($row = mysqli_fetch_assoc($query)) {
                	 ?>
                	 <option value="<?php echo $row['nomor_cacat'] ?>"><?php echo $row['jenis_cacat']; ?></option>
                	<?php } ?>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label" for="penyebab">Penyebab</label>
                <select class="form-control" name="penyebab" id="penyebab">
                	<option value="">Pilih Penyebab</option>
                	<?php 
                	$query = mysqli_query($koneksi, "SELECT * FROM data_cacat ORDER BY id");
                	while ($row = mysqli_fetch_assoc($query)) {
                	 ?>
                	 <option value="<?php echo $row['nomor_cacat']; ?>"><?php echo $row['penyebab_cacat']; ?></option>
                	<?php } ?>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label" for="pengaruh_buruk">Pengaruh Buruk</label>
                <input type="text" class="form-control" name="pengaruh_buruk" id="pengaruh_buruk">
              </div>

              <div>
                <label class="form-label" for="current_controls">Tindakan</label>
                <input type="text" class="form-control" name="current_controls" id="current_controls" placeholder="Masukkan tindakan">
              </div>

              <div class="mb-3">
                <label class="form-label" for="severity">Severity</label>
                <input type="number" name="s" class="form-control" id="severity">
              </div>

              <div class="mb-3">
                <label class="form-label" for="occurrence">Occurrence</label>
                <input type="number" name="o" class="form-control" id="occurrence">
              </div>

              <div class="mb-3">
                <label class="form-label" for="occurrence">Detectabillity</label>
                <input type="number" name="d" class="form-control" id="occurrence">
              </div>


              <button class="btn btn-block btn-danger"  name="submit">Cek</button>
          </form>
          <?php 
          if (isset($_POST['submit'])) {
          	$jenis_cacat = htmlspecialchars($_POST['jenis_cacat']);
          	$penyebab = htmlspecialchars($_POST['penyebab']);
            $pengaruh_buruk = htmlspecialchars($_POST['pengaruh_buruk']);
            $current_controls = htmlspecialchars($_POST['current_controls']);
          	$s = htmlspecialchars($_POST['s']);
          	$o = htmlspecialchars($_POST['o']);
          	$d = htmlspecialchars($_POST['d']);




          	$hasil = $s * $o * $d;

            // $query = "SELECT * FROM fmea_furniture ORDER BY id";
            // $result = mysqli_query($koneksi,$query);
            
            // while ($row = mysqli_fetch_assoc($result)) {
            //   if ($row['rpn'] ==  $hasil) {
            //     echo "Tindakan:" . $row['current_controls'];
            //     echo "<br>";
            //     echo "RPN:" . $row['rpn'];


                $query1 = "INSERT INTO fmea_furniture (failure_mode,potential_cause,potential_effects,current_controls,severity,occurrence,detectability,rpn) VALUES ('$jenis_cacat', '$penyebab', '$pengaruh_buruk', '$current_controls', '$s', '$o', '$d', '$hasil')";
                $result = mysqli_query($koneksi,$query1);

                var_dump($result);
               
              
            }
          


           ?>
           

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

                  <!-- End Content -->
              </p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal Produksi</th>
                      <th>Nama Material</th>
                      <th>Total Sample</th>
                      <th>Total Defect</th>
                      <th>Proporsi Cacat</th>
                      <th>Presentase</th>
                      <th>Cl</th>
                      <th>UCL</th>
                      <th>LCL</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                     $query = "SELECT * FROM data_produksi ORDER BY id";
                    $hasil = mysqli_query($koneksi,$query);
                     
                    while ($row = mysqli_fetch_assoc($hasil)) {
                      list($ucl, $lcl, $cl) = calculateControlLimits($row['total_sample'], $row['total_defect']);
                     ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['tanggal_produksi']; ?></td>
                      <td><?php echo $row['nama_material']; ?></td>
                      <td><?php echo $row['total_sample']; ?></td>
                      <td><?php echo $row['total_defect']; ?></td>
                      <td>
                        <?php
                        $proporsiCacat =  $row['total_defect'] / $row['total_sample'];
                        echo $proporsiCacat;
                        ?>  
                      </td>
                      <td>
                        <?php 
                        $persentaseCacat = $proporsiCacat * 100;
                        echo $persentaseCacat."%";
                         ?>
                      </td>
                      <td><?php echo $cl; ?></td>
                      <td><?php echo $ucl; ?></td>
                      <td><?php echo $lcl; ?></td>

                    </tr>
                    <?php $no++; } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Tanggal Produksi</th>
                      <th>Nama Material</th>
                      <th>Total Sample</th>
                      <th>Total Defect</th>
                      <th>Proporsi Cacat</th>
                      <th>Presentase</th>
                      <th>Cl</th>
                      <th>UCL</th>
                      <th>LCL</th>
                    </tr>
                  </tfoot>
                </table>



              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

                  <!-- End Content -->


 <?php include 'footer.php'; ?>