<?php include 'header.php'; ?>
 <section class="content">
      <div class="container-fluid">
      	<div class="row">
          <div class="col-md-12">
            <div class="card card-primary shadow-md">
              <div class="card-header">
                <h3 class="card-title">Failure Mode and Effect Analysis</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
                	<thead>
                		<tr>
                			<th>No</th>
                			<th>Jenis Kegagalan</th>
                			<th>Penyebab</th>
                			<th>Severity</th>
                			<th>Occurrence</th>
                			<th>Detectability</th>
                			<th>RPN</th>
                			<th>Tindakan Untuk Penanggulangan Jenis</th>
                      <th>Action</th>
                		</tr>
                	</thead>
                	<tbody>
                		<?php
                		$no = 1;
                		$query = mysqli_query($koneksi, "SELECT * FROM fmea_furniture ORDER BY id");
                		while ($row = mysqli_fetch_assoc($query)) {
                		 ?>
                		<tr>
                			<td><?php echo $no; ?></td>
                			<td><?php echo $row['failure_mode']; ?></td>
                			<td><?php echo $row['potential_cause']; ?></td>
                			<td><?php echo $row['severity']; ?></td>
                			<td><?php echo $row['occurrence']; ?></td>
                			<td><?php echo $row['detectability']; ?></td>
                			<td><?php echo $row['rpn']; ?></td>
                			<td><?php echo $row['current_controls']; ?></td>
                      <td>
                        <div class="btn-group">
                          <a class="btn btn-danger" href="controller.php?page=<?php echo base64_encode("hapus_fmea"); ?>&id=<?php echo base64_encode($row['id']); ?>">Hapus</a>
                        </div>
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
<?php include 'footer.php'; ?>