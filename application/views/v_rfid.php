<?php
$this->load->View('include/header.php');

if ($set == "rfid") {
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Penerima
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-credit-card"></i> Data</a></li>
        <li class="active">Penerima</li>
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
            <div class="box-body table-responsive">
              <table id="t1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="text-align:center">No</th>
                    <th style="text-align:center">UID RFID</th>
                    <th style="text-align:center">Nama</th>
                    <th style="text-align:center">Telp</th>
                    <th style="text-align:center">Gender</th>
                    <th style="text-align:center">Pekerjaan</th>
                    <th style="text-align:center">Penghasilan</th>
                    <th style="text-align:center">Alamat</th>
                    <th style="text-align:center">#</th>
                    <th style="text-align:center">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (empty($rfid)) { ?>
                    <tr>
                      <td>Data tidak ditemukan</td>
                      <td>Data tidak ditemukan</td>
                      <td>Data tidak ditemukan</td>
                      <td>Data tidak ditemukan</td>
                      <td>Data tidak ditemukan</td>
                      <td>Data tidak ditemukan</td>
                      <td>Data tidak ditemukan</td>
                      <td>Data tidak ditemukan</td>
                    </tr>
                    } ?>
                    <?php } else {
                    $no = 0;
                    foreach ($rfid as $row) {
                      if ($row->nama != "") {
                        $no++; ?>
                        <tr>
                          <td style="text-align:center"><?php echo $no; ?></td>
                          <td style="text-align:center"><b class="text-success"><?php echo $row->uid; ?></b></td>
                          <td style="text-align:center"><?php echo $row->nama; ?></td>
                          <td style="text-align:center"><?php echo $row->telp; ?></td>
                          <td style="text-align:center"><?php echo $row->gender; ?></td>
                          <td style="text-align:center"><?php echo $row->jabatan; ?></td>
                          <td style="text-align:center"><?php echo $row->penghasilan; ?></td>
                          <td style="text-align:center"><?php echo $row->alamat; ?></td>
                          <td style="text-align:center">
                            <a href="<?= base_url() ?>admin/edit_rfid/<?= $row->id_rfid ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
                            <!-- <a href="<?php site_url() ?>/admin/hapus_rfid/<?= $row->id_rfid ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a> -->
                          </td>
                          <td style="text-align:center"><?php if ($row->status == 1) { ?>
                              <small class="label label-success"><i class="fa fa-clock-o"></i>aktif</small>
                            <?php  } else { ?>
                              <small class="label label-danger"><i class="fa fa-clock-o"></i>tidak aktif</small>
                            <?php } ?></td>
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
} else if ($set == "edit-rfid") {
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data RFID
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-credit-card"></i> Data RFID</a></li>
        <li class="active">Edit Data RFID</li>
      </ol>
    </section>

    <!-- content array -->
    <?php $jenis_kelamin = ['laki-laki', 'perempuan'];
    $penghasilan = array(
      '1' => '< 100.000',
      '2' => '100.000 - 500.000',
      '3' => '1.000.000 - 2.000.000',

    );
    ?>


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
            <form role="form" action="<?= base_url(); ?>admin/save_edit_rfid" method="post">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?php if (isset($id)) {
                                                          echo $id;
                                                        } ?>">
                  <!-- <label>ID Device</label>
                  <input type="number" name="id" class="form-control" placeholder="Enter id" required> -->
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" placeholder="nama" value="<?php if (isset($nama)) {
                                                                                                  echo $nama;
                                                                                                } ?>" required>
                </div>
                <div class="form-group">
                  <label>No Hp</label>
                  <input type="number" name="telp" class="form-control" placeholder="telp" value="<?php if (isset($telp)) {
                                                                                                    echo $telp;
                                                                                                  } ?>" required>
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control" name="gender">
                    <?php foreach ($jenis_kelamin as $gender) {
                     // echo "<option>" . $gender . "</option>";
					 // print_r($gender);
                    } ?>
					 <option value="laki-laki" <?php foreach ($jenis_kelamin as $gender)  if($gender == 'laki-laki'){ echo 'selected'; } ?>> laki-laki</option>
					  <option value="perempuan" <?php foreach ($jenis_kelamin as $gender)  if($gender == 'perempuan'){ echo 'selected'; } ?>> perempuan</option>
                  </select>
					<?php  print_r($gender);?>
                </div>
                <div class="form-group">
                  <label>Tanggal Lahir:</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="tanggal_lahir" class="form-control pull-right" id="tanggal_lahir" value="<?php if (isset($tanggal_lahir)) {
                                                                                                                        echo $tanggal_lahir;
                                                                                                                      } ?>">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- <div class="form-group">
                        <label>Gender</label>
                        <input type="text" name="gender" class="form-control" placeholder="gender" value="<?//php if (isset($gender)) {
                                                                                                      //echo $gender;
                                                                                                    //} ?>" required>
                </div> -->
                <div class="form-group">
                  <label>Penghasilan</label>
                  <select name="penghasilan" class="form-control">
                    <?php foreach ($penghasilan as $p) {
                      echo '<option>' . $p . '</option>';
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <lable>Jumlah Anggota Keluarga</lable>
                  <input type="text" name="anggota_keluarga" id="" class="form-control" value="<?php if (isset($anggota_keluarga)) {
                                                                                                  echo $anggota_keluarga;
                                                                                                } ?>">
                </div>
                <div class="form-group">
                  <label>Pekerjaan</label>
                  <input type="text" name="jabatan" class="form-control" placeholder="pekerjaan" value="<?php if (isset($jabatan)) {
                                                                                                        echo $jabatan;
                                                                                                      } ?>" required>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" class="form-control" placeholder="alamat" value="<?php if (isset($alamat)) {
                                                                                                      echo $alamat;
                                                                                                    } ?>" required>

                </div>
                <div class="form-group">
                  <label>Pengambilan Beras</label>
                  <input type="number" max="3"  name="beras" class="form-control" value="<?php if (isset($beras)) {
                                                                                  echo $beras;
                                                                                } ?>">
                </div>
                <div class="form-group">
                  <label>Pengambilan Telur</label>
                  <input type="number" max="4" name="telur" class="form-control" value="<?php if (isset($telur)) {
                                                                                  echo $telur;
                                                                                } ?>">
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status">
					  <option value="1" <?php if($status == '1'){ echo 'selected'; } ?>> Aktif</option>
					  <option value="0" <?php if($status == '0'){ echo 'selected'; } ?>> Blokir</option>    
                  </select>
					
				 <?php // print_r($status);?>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
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
} else if ($set == "new") {
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kartu RFID Baru
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-credit-card"></i> RFID</a></li>
        <li class="active">Kartu RFID Baru</li>
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
            <div class="box-body table-responsive">
              <table id="t1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="text-align:center">No</th>
                    <th style="text-align:center">UID RFID</th>
                    <th style="text-align:center">Nama</th>
                    <th style="text-align:center">Telp</th>
                    <th style="text-align:center">Gender</th>
                    <th style="text-align:center">Jabatan</th>
                    <th style="text-align:center">Alamat</th>
                    <th style="text-align:center">#</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (empty($rfid)) { ?>
                    <tr>
                      <td>Data tidak ditemukan</td>
                      <td>Data tidak ditemukan</td>
                      <td>Data tidak ditemukan</td>
                      <td>Data tidak ditemukan</td>
                      <td>Data tidak ditemukan</td>
                      <td>Data tidak ditemukan</td>
                      <td>Data tidak ditemukan</td>
                      <td>Data tidak ditemukan</td>
                    </tr>
                    <?php } else {
                    $no = 0;
                    foreach ($rfid as $row) {
                      if ($row->nama == "") {
                        $no++;
                    ?>
                        <tr>
                          <td style="text-align:center"><?php echo $no; ?></td>
                          <td style="text-align:center"><b class="text-success"><?php echo $row->uid; ?></b></td>
                          <td style="text-align:center"><?php echo $row->nama; ?></td>
                          <td style="text-align:center"><?php echo $row->telp; ?></td>
                          <td style="text-align:center"><?php echo $row->gender; ?></td>
                          <td style="text-align:center"><?php echo $row->jabatan; ?></td>
                          <td style="text-align:center"><?php echo $row->alamat; ?></td>
                          <td style="text-align:center">
                            <a href="<?= base_url() ?>admin/edit_rfid/<?= $row->id_rfid ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
                            <a href="<?= base_url() ?>admin/hapus_rfid/<?= $row->id_rfid ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
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