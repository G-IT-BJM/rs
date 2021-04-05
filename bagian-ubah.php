<?php

include 'config.php';
include 'inc/head.php';
include 'function.php';

$table   = 'tb_bagian';
$primary = 'id_bagian';
$row     = select("select * from {$table} where {$primary} = '{$_GET['id']}'");

$id_bagian = '';
$nama_bagian = '';

foreach ($row as $key) {
  $id_bagian = $key['id_bagian'];
  $nama_bagian = $key['nama_bagian'];
}

?>

<main>
  <div class="container-fluid">    
    <div class="card mt-4 mb-4">
      <div class="card-header">
        <div class="float-left">
          <i class="fas fa-table mr-1"></i>
          Form Ubah Bagian
        </div>
      </div>
      <div class="card-body">

        <?php show_notif() ?>

        <form action="bagian-action.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="__method" value="put">
          <div class="form-group">
            <div class="control-label">
              ID Bagian
            </div>
            <input type="text" name="id_bagian" id="id_bagian" class="form-control" readonly="true" value="<?=$id_bagian?>" required>
          </div>
          <div class="form-group">
            <div class="control-label">
              Bagian
            </div>
            <input autofocus type="text" name="nama_bagian" id="nama_bagian" class="form-control" value="<?=$nama_bagian?>" required>
          </div>
          <div class="form-group">
            <input type="submit" name="save" id="save" class="btn btn-primary btn-small" value="Simpan">
            <a href="bagian-list.php" class="btn btn-dark btn-small">Kembali</a>
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