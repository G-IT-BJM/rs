<?php

include 'config.php';
include 'inc/head.php';
include 'function.php';

?>

<main>
  <div class="container-fluid">    
    <div class="card mt-4 mb-4">
      <div class="card-header">
        <div class="float-left">
          <i class="fas fa-table mr-1"></i>
          Form Tambah Jabatan
        </div>
      </div>
      <div class="card-body">

        <?php show_notif() ?>

        <form action="jabatan-action.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="__method" value="post">
          <div class="form-group">
            <div class="control-label">
              ID Jabatan
            </div>
            <input type="text" name="id_jabatan" id="id_jabatan" class="form-control" readonly="true" required value="<?=generateID('tb_jabatan','id_jabatan','J',5)?>">
          </div>
          <div class="form-group">
            <div class="control-label">
              Jabatan
            </div>
            <input autofocus type="text" name="nama_jabatan" id="nama_jabatan" class="form-control" required>
          </div>
          <div class="form-group">
            <input type="submit" name="save" id="save" class="btn btn-primary btn-small" value="Simpan">
            <a href="jabatan-list.php" class="btn btn-dark btn-small">Kembali</a>
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