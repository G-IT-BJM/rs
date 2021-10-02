<?php

include 'config.php';
include 'inc/head.php';
include 'function.php';

?>

<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

<main>
  <div class="container-fluid">    
    <div class="card mt-4 mb-4">
      <div class="card-header">
        <div class="float-left">
          <i class="fas fa-table mr-1"></i>
          Form Tambah Karyawan
        </div>
      </div>
      <div class="card-body">

        <?php show_notif() ?>

        <form action="karyawan-action.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="__method" value="post">
          <div class="row">
            <div class="col-md-4 form-group">
              <div class="control-label">
                NIK
              </div>
              <input autofocus type="number" name="nik" id="nik" class="form-control" minlength="16" maxlength="16" required>
            </div>

            <div class="col-md-4 form-group">
              <div class="control-label">
                NIP
              </div>
              <input type="text" name="nip" id="nip" class="form-control" value="<?= generateNIP(); ?>" readonly>
            </div>
          
            <div class="col-md-4 form-group">
              <div class="control-label">
                Nama
              </div>
              <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 form-group">
              <div class="control-label">
                Tempat Lahir
              </div>
              <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>              
            </div>

            <div class="col-md-4 form-group">
              <div class="control-label">
                Tanggal Lahir
              </div>
              <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
            </div>
          
            <div class="col-md-4 form-group">
              <div class="control-label">
                Agama
              </div>
              <select class="form-control" id="id_agama" name="id_agama" required>
                <option value="" selected="">Pilih Agama -</option>
                <?php
                  $data = select('select id_agama, nama_agama from tb_agama');
                  foreach ($data as $key) {
                    echo "<option value='{$key['id_agama']}'>{$key['nama_agama']}</option>";
                  }
                ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-2 form-group">
              <div class="control-label">
                Jenis Kelamin
              </div>
              <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                <option value="L">L</option>
                <option value="P">P</option>
              </select>
            </div>

            <div class="col-md-2 form-group">
              <div class="control-label">
                Golongan Darah
              </div>
              <input type="text" name="gol_darah" id="gol_darah" class="form-control" required>
            </div>

            <div class="col-md-3 form-group">
              <div class="control-label">
                Tanggal Masuk
              </div>
              <input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control" required value="<?php echo date("Y-m-d"); ?>" readonly>              
            </div>
          
            <div class="col-md-4 form-group">
              <div class="control-label">
                Jabatan
              </div>
              <select class="form-control" id="id_jabatan" name="id_jabatan" required>
                <option value="" selected="">Pilih Jabatan -</option>
                <?php
                  $data = select('select id_jabatan, nama_jabatan from tb_jabatan');
                  foreach ($data as $key) {
                    echo "<option value='{$key['id_jabatan']}'>{$key['nama_jabatan']}</option>";
                  }
                ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 form-group">
              <div class="control-label">
                Alamat KTP
              </div>
              <textarea class="form-control" id="alamat_ktp" name="alamat_ktp"></textarea>
            </div>

            <div class="col-md-4 form-group">
              <div class="control-label">
                Alamat Domisili
              </div>
              <textarea class="form-control" id="alamat_domisili" name="alamat_domisili"></textarea>
            </div>
          
            <div class="col-md-4 form-group">
              <div class="control-label">
                Bagian
              </div>
              <select class="form-control" id="id_bagian" name="id_bagian" required>
                <option value="" selected="">Pilih Bagian -</option>
                <?php
                  $data = select('select id_bagian, nama_bagian from tb_bagian');
                  foreach ($data as $key) {
                    echo "<option value='{$key['id_bagian']}'>{$key['nama_bagian']}</option>";
                  }
                ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-2 form-group">
              <div class="control-label">
                Golongan
              </div>
              <input type="text" name="golongan" id="golongan" class="form-control" required>
            </div>

            <div class="col-md-3 form-group">
              <div class="control-label">
                Pendidikan Akhir
              </div>              
              <select class="form-control" id="pendidikan_akhir" name="pendidikan_akhir" required>
                <option value="" selected="">Pilih Pendidikan -</option>
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
                <option value="SMA">SMA</option>
                <option value="D3">D3</option>
                <option value="D4">D4</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
              </select>
            </div>
          
            <div class="col-md-2 form-group">
              <div class="control-label">
                Gelar
              </div>
              <input type="text" name="gelar" id="gelar" class="form-control" required>
            </div>

            <div class="col-md-5 form-group">
              <div class="control-label">
                Perguruan / Sekolah
              </div>
              <input type="text" name="nama_perguruan" id="nama_perguruan" class="form-control" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 form-group">
              <div class="control-label">
                Status
              </div>
              <input type="text" name="status" id="status" class="form-control" required>
            </div>

            <div class="col-md-4 form-group">
              <div class="control-label">
                Status Kerja
              </div>
              <select class="form-control" id="status_kerja" name="status_kerja">
                <option value="" selected="">Pilih Status Kerja -</option>
                <option value="TETAP">TETAP</option>
                <option value="KONTRAK">KONTRAK</option>
                <option value="HONORRER">HONORRER</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <input type="submit" name="save" id="save" class="btn btn-primary btn-small" value="Simpan">
            <a href="karyawan-list.php" class="btn btn-dark btn-small">Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/datatables-demo.js"></script>

<?php include 'inc/footer.php' ?>