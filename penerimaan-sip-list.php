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
          Penerimaan SIP
        </div>
        <div class="float-right">
          <a class="btn btn-primary btn-sm" href="penerimaan-sip-tambah.php"><li class="fa fa-plus"></li> Tambah</a>
        </div>
      </div>
      <div class="card-body">

        <?php show_notif() ?>

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width="20%">No. SIP</th>
                <th>NIP</th>
                <th>Tanggal Dibuat</th>
                <th>Masa Berlaku</th>
                <th width="10%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $data = select('select a.*, b.nama from tb_str_sip AS a INNER JOIN tb_karyawan AS b ON a.nip=b.nip');
              $no = 1;
              foreach ($data as $key) {
                if($key['no_sip'] == "") {
                  // echo "<tr>";
                  // echo "<td>{$key['no_sip']}</td>";
                  // echo "<td>{$key['nip']} - {$key['nama']}</td>";
                  // echo "<td>{$key['tgl_dibuat_sip']}</td>";
                  // echo "<td>{$key['berlaku_str']}</td>";
                  // echo "<td class='text-center'>
                  //         <a href='penerimaan-sip-ubah.php?id={$key['id']}'><li class='fa fa-edit'></li></a>
                  //         <a onclick='return confirm(\"Apakah anda yakin ingin menghapus data ini?\")' href='penerimaan-sip-action.php?id={$key['id']}'><li class='fa fa-trash-alt'></li></a>
                  //       </td>";
                  // echo "</tr>";
                } else {
                  echo "<tr>";
                  echo "<td>{$key['no_sip']}</td>";
                  echo "<td>{$key['nip']} - {$key['nama']}</td>";
                  echo "<td>{$key['tgl_dibuat_sip']}</td>";
                  echo "<td>{$key['berlaku_str']}</td>";
                  echo "<td class='text-center'>
                          <a href='penerimaan-sip-ubah.php?id={$key['id']}'><li class='fa fa-edit'></li></a>
                          <a onclick='return confirm(\"Apakah anda yakin ingin menghapus data ini?\")' href='penerimaan-sip-action.php?id={$key['id']}'><li class='fa fa-trash-alt'></li></a>
                        </td>";
                  echo "</tr>";
                }
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