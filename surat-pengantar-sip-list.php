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
          Data Pengantar SIP
        </div>
        <div class="float-right">
          <a class="btn btn-primary btn-sm" href="surat-pengantar-sip-tambah.php"><li class="fa fa-plus"></li> Tambah</a>
        </div>
      </div>
      <div class="card-body">

        <?php show_notif() ?>

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width="20%">No. Surat</th>
                <th>NIP</th>
                <th>Jenis</th>
                <th>Tanggal</th>
                <th width="10%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $data = select('select a.*, b.nama from tb_pengantar as a INNER JOIN tb_karyawan as b ON a.nip=b.nip WHERE a.jenis_surat = "SIP" ORDER BY a.no_surat DESC');
              $no = 1;
              foreach ($data as $key) {
                echo "<tr>";
                echo "<td>{$key['no_surat']}</td>";
                echo "<td>{$key['nip']} - {$key['nama']}</td>";
                echo "<td>{$key['jenis']}</td>";
                echo "<td>{$key['tgl_dibuat']}</td>";
                echo "<td class='text-center'>
                        <a target='_blank' href='surat-pengantar-sip-print.php?id={$key['no_surat']}'><li class='fa fa-print'></li></a>
                        <a href='surat-pengantar-sip-ubah.php?id={$key['no_surat']}'><li class='fa fa-edit'></li></a>
                        <a onclick='return confirm(\"Apakah anda yakin ingin menghapus data ini?\")' href='surat-pengantar-sip-action.php?id={$key['no_surat']}'><li class='fa fa-trash-alt'></li></a>
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