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
          Data Bagian
        </div>
        <div class="float-right">
          <a class="btn btn-primary btn-sm" href="bagian-tambah.php"><li class="fa fa-plus"></li> Tambah</a>
        </div>
      </div>
      <div class="card-body">

        <?php show_notif() ?>

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width="7%">No</th>
                <th width="20%">Kode</th>
                <th>Bagian</th>
                <th>Medis/Non-Medis</th>
                <th width="10%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $data = select('select * from tb_bagian');
              $no = 1;
              foreach ($data as $key) {
                $medis = ($key['is_medis'] == 1) ? "Medis" : "Non Medis";
                echo "<tr>";
                echo "<td>{$no}</td>";
                echo "<td>{$key['id_bagian']}</td>";
                echo "<td>{$key['nama_bagian']}</td>";
                echo "<td>{$medis}</td>";                
                echo "<td class='text-center'>
                        <a href='bagian-ubah.php?id={$key['id_bagian']}'><li class='fa fa-edit'></li></a>
                        <a onclick='return confirm(\"Apakah anda yakin ingin menghapus data ini?\")' href='bagian-action.php?id={$key['id_bagian']}'><li class='fa fa-trash-alt'></li></a>
                      </td>";
                echo "</tr>";
                $no++;
              } 
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/datatables-demo.js"></script>

<?php include 'inc/footer.php' ?>