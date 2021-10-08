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
          Data Tunjangan
        </div>
        <div class="float-right">
          <?php if ($_SESSION['level'] == 'admin') { ?>
          <a class="btn btn-primary btn-sm" href="tunjangan-tambah.php"><li class="fa fa-plus"></li> Tambah</a>
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
                <th>NIK</th>                
                <th>Tunjangan</th>
                <th>Tgl. Buat</th>
                <th>Status</th>
                <th>Kartu Nikah</th>
                <th>Kartu Keluarga</th>
                <th width="10%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $data = select('select * from tb_tunjangan left join tb_karyawan on tb_karyawan.nip = tb_tunjangan.nip');
              $no = 1;
              foreach ($data as $key) {
                echo "<tr>";
                echo "<td>{$key['no_surat_tunjangan']}</td>";
                echo "<td>{$key['nip']}". " - " ."{$key['nama']}</td>";
                echo "<td>{$key['jenis_tunjangan']}</td>";
                echo "<td>{$key['tanggal_buat']}</td>";
                echo "<td> <a href='{$key['kartu_nikah']}' target='_blank' rel='noopener noreferrer'><img width='200px' height='200px' src='{$key['kartu_nikah']}'></a></td>";
                echo "<td> <a href='{$key['kartu_keluarga']}' target='_blank' rel='noopener noreferrer'><img width='200px' height='200px' src='{$key['kartu_keluarga']}'></a></td>";
                echo "<td>".status($key['is_approve'])."</td>";
                if ($_SESSION['level'] == 'admin') {
                  echo "<td class='text-center'>";

                  if ($key['is_approve'] == 1) { 
                    echo "<a target='_blank' href='tunjangan-print.php?id={$key['no_surat_tunjangan']}'><li class='fa fa-print'></li></a>";
                  }
                  
                  echo "<a href='tunjangan-ubah.php?id={$key['no_surat_tunjangan']}'><li class='fa fa-edit'></li></a>
                          <a onclick='return confirm(\"Apakah anda yakin ingin menghapus data ini?\")' href='tunjangan-action.php?id={$key['no_surat_tunjangan']}'><li class='fa fa-trash-alt'></li></a>
                        </td>";
                } else {
                  echo "<td>
                    <a class='btn btn-success btn-sm mb-1' href='tunjangan-status.php?id={$key['no_surat_tunjangan']}&status=1'>Setuju</a>
                    <a class='btn btn-danger btn-sm mb-1' href='tunjangan-status.php?id={$key['no_surat_tunjangan']}&status=-1'>Tolak</a>
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