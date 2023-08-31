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
                      <!-- <th>Action</th> -->
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
          

        </div>
        <!-- /.row -->



<?php include 'footer.php'; ?>