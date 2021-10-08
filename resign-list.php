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
          Data Resign
        </div>
        <div class="float-right">
          <?php if ($_SESSION['level'] == 'admin') { ?>
          <a class="btn btn-primary btn-sm" href="resign-tambah.php"><li class="fa fa-plus"></li> Tambah</a>
          <?php } ?>
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
                <th>Tgl. Resign</th>
                <th>Tgl. Surat</th>
                <th>Alasan</th>
                <th>Status</th>
                <th width="10%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $data = select('select * from tb_resign left join tb_karyawan on tb_karyawan.nip = tb_resign.nip');
              $no = 1;
              foreach ($data as $key) {
                echo "<tr>";
                echo "<td>{$key['no_surat_resign']}</td>";
                echo "<td>{$key['nip']}". " - " ."{$key['nama']}</td>";
                echo "<td>{$key['tanggal_resign']}</td>";
                echo "<td>{$key['tanggal_buat']}</td>";
                echo "<td>{$key['alasan']}</td>";                
                echo "<td>".status($key['is_approve'])."</td>";
                if ($_SESSION['level'] == 'admin') {                  
                  echo "<td class='text-center'>";

                  if ($key['is_approve'] == 1) {      
                          echo "<a target='_blank' href='resign-print.php?id={$key['no_surat_resign']}'><li class='fa fa-print'></li></a>";
                  }
                      echo "<a href='resign-ubah.php?id={$key['no_surat_resign']}'><li class='fa fa-edit'></li></a>
                      <a onclick='return confirm(\"Apakah anda yakin ingin menghapus data ini?\")' href='resign-action.php?id={$key['no_surat_resign']}'><li class='fa fa-trash-alt'></li></a>
                    </td>";
                } else {
                  echo "<td>
                    <a class='btn btn-success btn-sm mb-1' href='resign-status.php?id={$key['no_surat_resign']}&status=1'>Setuju</a>
                    <a class='btn btn-danger btn-sm mb-1' href='resign-status.php?id={$key['no_surat_resign']}&status=-1'>Tolak</a>
                  </td>";
                }
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