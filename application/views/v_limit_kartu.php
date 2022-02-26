<?php
$this->load->View('include/header.php');

if ($set == "limit_kartu") {
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Limit Tap Kartu Atm
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-credit-card"></i> Data Limit</a></li>
        <li class="active">Limit Tap Kartu Atm</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <?php echo "<br>";
              echo $this->session->flashdata('pesan'); ?>

              <h1 class="box-title"></h1>
            </div>
            <!-- /.box-header -->
            <div class="alert alert-warning" role="alert">
              Fitur ini untuk mengatur jumlah tap kartu dalam waktu 1 hari
            </div>
            <div class="box-body table-responsive">
              <table id="t1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="text-align:center">No</th>
                    <th style="text-align:center">id</th>
                    <th style="text-align:center">Jumlah Pengambilan</th>
                    <th style="text-align:center">Update</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (empty($limit_kartu)) { ?>
                    <tr>
                      <td>Data tidak ditemukan</td>
                      <td>Data tidak ditemukan</td>
                      <td>Data tidak ditemukan</td>
                    </tr>
                    } ?>
                    <?php } else {
                    $no = 0;
                    foreach ($limit_kartu as $row) {
                      if ($row->jml_pengambilan != "") {
                        $no++; ?>
                        <tr>
                          <td style="text-align:center"><?php echo $no; ?></td>
                          <td style="text-align:center"><b class="text-success"><?php echo $row->id_pengambilan; ?></b></td>
                          <td style="text-align:center"><?php echo $row->jml_pengambilan; ?></td>
                          <td style="text-align:center">
                            <a href="<?= base_url() ?>admin/edit_limit_kartu/<?= $row->id_pengambilan ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
                          </td>
                        </tr>
                  <?php }
                    }
                  } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php
} else if ($set == "edit-limit-kartu") {
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Limit Tap Kartu
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-credit-card"></i> Data Limit</a></li>
        <li class="active">Limit Tap Kartu</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <?php echo $this->session->flashdata('pesan'); ?>
              <h1 class="box-title"></h1>
            </div>
            <!-- /.box-header -->
            <form role="form" action="<?= base_url(); ?>admin/update_limit_kartu" method="post">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?php if (isset($id)) {
                                                          echo $id;
                                                        } ?>">
                </div>
                <div class="form-group">
                  <label>Limit Kartu</label>
                  <input type="number" name="limit_kartu" class="form-control" placeholder="limit kartu" value="<?php if (isset($pengambilan)) {
                                                                                                                  echo $pengambilan;
                                                                                                                } ?>" required>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update Limit</button>
              </div>
            </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<?php
}

$this->load->view('include/footer.php');
?>

</div> <!-- penutup header -->

<!-- jQuery 3 -->
<script src="<?= base_url(); ?>components/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url(); ?>components/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>components/dist/js/adminlte.min.js"></script>
<script src="<?= base_url(); ?>components/select2/select2.full.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url(); ?>components/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>components/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- page script -->
<!-- date-range-picker -->
<script src="<?= base_url(); ?>components/bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url(); ?>components/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url(); ?>components/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
<script>
  $(function() {
    $("#t1").DataTable();
  });

  $(function() {
    //Date range picker
    $('#reservation').daterangepicker()
    $('#tanggal_lahir').datepicker()

  })
</script>

</body>

</html>