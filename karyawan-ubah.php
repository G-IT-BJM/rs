<?php

include 'config.php';
include 'inc/head.php';
include 'function.php';

$table   = 'tb_karyawan';
$primary = 'nip';
$row     = select("select * from {$table} where {$primary} = '{$_GET['id']}'");

$nik = ''; $nip = ''; $nama = ''; $tempat_lahir = ''; $tgl_lahir = ''; $id_agama = ''; $jenis_kelamin = '';
$gol_darah = ''; $tgl_masuk = ''; $id_jabatan = ''; $alamat_ktp = ''; $alamat_domisili = ''; $id_bagian = '';
$golongan = ''; $pendidikan_akhir = ''; $gelar = ''; $nama_perguruan = ''; $status = ''; $status_kerja = '';

foreach ($row as $key) {
  $nik              = $key['nik'];
  $nip              = $key['nip'];
  $nama             = $key['nama'];
  $tempat_lahir     = $key['tempat_lahir'];
  $tgl_lahir        = $key['tgl_lahir'];
  $id_agama         = $key['id_agama'];
  $jenis_kelamin    = $key['jenis_kelamin'];
  $gol_darah        = $key['gol_darah'];
  $tgl_masuk        = $key['tgl_masuk'];
  $id_jabatan       = $key['id_jabatan'];
  $alamat_ktp       = $key['alamat_ktp'];
  $alamat_domisili  = $key['alamat_domisili'];
  $id_bagian        = $key['id_bagian'];
  $golongan         = $key['golongan'];
  $pendidikan_akhir = $key['pendidikan_akhir'];
  $gelar            = $key['gelar'];
  $nama_perguruan   = $key['nama_perguruan'];
  $status           = $key['status'];
  $status_kerja     = $key['status_kerja'];
}

?>

<main>
  <div class="container-fluid">    
    <div class="card mt-4 mb-4">
      <div class="card-header">
        <div class="float-left">
          <i class="fas fa-table mr-1"></i>
          Form Ubah Karyawan
        </div>
      </div>
      <div class="card-body">

        <?php show_notif() ?>

        <form action="karyawan-action.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="__method" value="put">
          <div class="row">
            <div class="col-md-4 form-group">
              <div class="control-label">
                NIK
              </div>
              <input autofocus type="text" name="nik" id="nik" class="form-control" value="<?=$nik?>" required>
            </div>

            <div class="col-md-4 form-group">
              <div class="control-label">
                NIP
              </div>
              <input type="text" name="nip" id="nip" class="form-control" value="<?=$nip?>" readonly>
            </div>
          
            <div class="col-md-4 form-group">
              <div class="control-label">
                Nama
              </div>
              <input type="text" name="nama" id="nama" class="form-control" value="<?=$nama?>" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 form-group">
              <div class="control-label">
                Tempat Lahir
              </div>
              <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?=$tempat_lahir?>" required>              
            </div>

            <div class="col-md-4 form-group">
              <div class="control-label">
                Tanggal Lahir
              </div>
              <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?=$tgl_lahir?>" required>
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
                    $selected = ($id_agama == $key['id_agama']) ? "selected" : "";
                    echo "<option value='{$key['id_agama']}' ".$selected.">{$key['nama_agama']}</option>";
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
                <?php
                  if($jenis_kelamin == "L") {
                    echo '<option value="L" selected>L</option>
                          <option value="P">P</option>';
                  } else {
                    echo '<option value="L">L</option>
                          <option value="P" selected>P</option>';
                  }
                ?>
              </select>
            </div>

            <div class="col-md-2 form-group">
              <div class="control-label">
                Golongan Darah
              </div>
              <input type="text" name="gol_darah" id="gol_darah" class="form-control" value="<?=$gol_darah?>" required>
            </div>

            <div class="col-md-3 form-group">
              <div class="control-label">
                Tanggal Masuk
              </div>
              <input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control" required value="<?=$tgl_masuk?>">              
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
                    $selected = ($id_jabatan == $key['id_jabatan']) ? "selected" : "";
                    echo "<option value='{$key['id_jabatan']}' ".$selected.">{$key['nama_jabatan']}</option>";
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
              <textarea class="form-control" id="alamat_ktp" name="alamat_ktp"><?php echo $alamat_ktp; ?></textarea>
            </div>

            <div class="col-md-4 form-group">
              <div class="control-label">
                Alamat Domisili
              </div>
              <textarea class="form-control" id="alamat_domisili" name="alamat_domisili"><?php echo $alamat_domisili; ?></textarea>
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
                    $selected = ($id_bagian == $key['id_bagian']) ? "selected" : "";
                    echo "<option value='{$key['id_bagian']}' ".$selected.">{$key['nama_bagian']}</option>";
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
              <input type="text" name="golongan" id="golongan" class="form-control" value="<?=$golongan?>" required>
            </div>

            <div class="col-md-3 form-group">
              <div class="control-label">
                Pendidikan Akhir
              </div>
              <input type="text" name="pendidikan_akhir" id="pendidikan_akhir" class="form-control" value="<?=$pendidikan_akhir?>" required>
            </div>
          
            <div class="col-md-2 form-group">
              <div class="control-label">
                Gelar
              </div>
              <input type="text" name="gelar" id="gelar" class="form-control" value="<?=$gelar?>" required>
            </div>

            <div class="col-md-5 form-group">
              <div class="control-label">
                Perguruan / Sekolah
              </div>
              <input type="text" name="nama_perguruan" id="nama_perguruan" value="<?=$nama_perguruan?>" class="form-control" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 form-group">
              <div class="control-label">
                Status
              </div>
              <input type="text" name="status" id="status" class="form-control" value="<?=$status?>" required>
            </div>

            <div class="col-md-4 form-group">
              <div class="control-label">
                Status Kerja
              </div>
              <select class="form-control" id="status_kerja" name="status_kerja">
                <option value="" selected="">Pilih Status Kerja -</option>
                <?php
                  if($status_kerja == "TETAP") {
                    echo '<option value="TETAP" selected>TETAP</option>
                          <option value="KONTRAK">KONTRAK</option>
                          <option value="HONORRER">HONORRER</option>';
                  } else if($status_kerja == "KONTRAK") {
                    echo '<option value="TETAP">TETAP</option>
                          <option value="KONTRAK" selected>KONTRAK</option>
                          <option value="HONORRER">HONORRER</option>';
                  } else {
                    echo '<option value="TETAP">TETAP</option>
                          <option value="KONTRAK">KONTRAK</option>
                          <option value="HONORRER" selected>HONORRER</option>';
                  }
                ?>
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