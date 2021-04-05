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
          Data Karyawan
        </div>
        <div class="float-right">
          <a class="btn btn-primary btn-sm" href="karyawan-tambah.php"><li class="fa fa-plus"></li> Tambah</a>
        </div>
      </div>
      <div class="card-body">

        <?php show_notif() ?>

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width="7%">No</th>
                <th>NIK</th>
                <th>NIP</th>
                <th>NAMA</th>
                <th>JK</th>
                <th>TTL</th>
                <th>AGAMA</th>
                <th>STATUS</th>
                <th width="10%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $data = select('select a.*, b.nama_agama from tb_karyawan AS a INNER JOIN tb_agama as b ON a.id_agama=b.id_agama');
              $no = 1;
              foreach ($data as $key) {
                echo "<tr>";
                echo "<td>{$no}</td>";
                echo "<td>{$key['nik']}</td>";
                echo "<td>{$key['nip']}</td>";
                echo "<td>{$key['nama']}</td>";
                echo "<td>{$key['jenis_kelamin']}</td>";
                echo "<td>{$key['tempat_lahir']}, {$key['tgl_lahir']}</td>";
                echo "<td>{$key['nama_agama']}</td>";
                echo "<td>{$key['status_kerja']}</td>";
                echo "<td class='text-center'>
                        <a href='karyawan-ubah.php?id={$key['nip']}'><li class='fa fa-edit'></li></a>
                        <a onclick='return confirm(\"Apakah anda yakin ingin menghapus data ini?\")' href='karyawan-action.php?id={$key['nip']}'><li class='fa fa-trash-alt'></li></a>
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