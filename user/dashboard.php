<?php include 'header.php'; ?>
 <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
         <!--  <div class="col-lg-3 col-6">
            
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo hitung_produk(); ?></h3>

                <p>Data Produk</p>
              </div>
              <div class="icon">
                <i class="bi bi-clipboard-data" style="font-size: 50px;"></i>
              </div>
              <a href="controller.php?page=<?php echo base64_encode("data_produk"); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
           
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo hitung_data_cacat(); ?></h3>

                <p>Data Cacat</p>
              </div>
              <div class="icon">
                <i class="bi bi-database" style="font-size: 50px;"></i>
              </div>
              <a href="controller.php?page=<?php echo base64_encode("data_cacat"); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo data_produksi(); ?></h3>

                <p>Data Produksi</p>
              </div>
              <div class="icon">
                <i class="bi bi-box-seam" style="font-size: 50px;"></i>
              </div>
              <a href="controller.php?page=<?php echo base64_encode("data_produksi"); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo fmea(); ?></h3>

                <p>FMEA</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="controller.php?page=<?php echo base64_encode("kendali_kualitas"); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

         <div class="col-md-12">
            <div class="card card-danger shadow-lg">
              <div class="card-header">
                <h3 class="card-title"></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <p>
                <h1 class="text-center">Selamat Datang di <b>Sistem Pengendali Kualitas PT.MARUKI INTERNASIONAL INDONESIA</b></h1>
                <div class="d-flex justify-content-center">
                  <img src="../images/maruki.png">
                </div>
              </p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


<?php include 'footer.php'; ?>