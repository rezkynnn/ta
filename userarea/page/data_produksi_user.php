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
                      <td><a class="btn btn-primary" href="controller.php?page=<?php echo base64_encode('kendali_kualitas'); ?>"> View Data</a></td>
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
          


<?php include 'footer.php'; ?>