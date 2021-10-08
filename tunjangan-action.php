<?php

include 'config.php';
include 'session.php';
include 'function.php';

$table   = "tb_tunjangan";
$primary = "no_surat_tunjangan";

if (isset($_POST['save'])) {
  if ($_POST['__method'] == 'post') {    

    if (isset($_FILES['kartu_nikah']) && isset($_FILES['kartu_keluarga'])) {
      $folder = 'upload/';
      if ($_FILES['kartu_nikah']['type'] == 'image/jpeg') {
        $filename = rand() . '-' . basename($_FILES["kartu_nikah"]["name"]);
        $pathKN = $folder . 'kartu_nikah/' . $filename;
        if (!move_uploaded_file($_FILES['kartu_nikah']['tmp_name'], $pathKN)) {          
          fail('Kartu nikah gagal di upload');
          back();
        }
      } else {        
        fail('Tipe file Kartu nikah tidak di perbolehkan!');
        back();
      }

      if ($_FILES['kartu_keluarga']['type'] == 'image/jpeg') {
        $filename = rand() . '-' . basename($_FILES["kartu_keluarga"]["name"]);
        $pathKK = $folder . 'kartu_keluarga/' . $filename;
        if (!move_uploaded_file($_FILES['kartu_keluarga']['tmp_name'], $pathKK)) {          
          fail('kartu keluarga gagal di upload');
          back();
        }
      } else {        
        fail('Tipe file Kartu keluarga tidak di perbolehkan!');
        back();
      }
    }
    
    $data = [
      'no_surat_tunjangan' => implode('/',$_POST['no_surat']),
      'nip'                => $_POST['nip'],
      'tanggal_buat'       => $_POST['tanggal_buat'],
      'jenis_tunjangan'    => $_POST['jenis_tunjangan'],
      'kartu_nikah' => $pathKN,
      'kartu_keluarga' => $pathKK,
      'is_approve' => 0,
    ];
    
    store($table, $data, 'Berhasil tambah data.');
    back();
  }
  if ($_POST['__method'] == 'put') {    

    $folder = 'upload/';
    
    if ($_FILES['kartu_nikah']['size'] > 0) {
      if ($_FILES['kartu_nikah']['type'] == 'image/jpeg') {
        $filename = rand() . '-' . basename($_FILES["kartu_nikah"]["name"]);
        $pathKN = $folder . 'kartu_nikah/' . $filename;
        if (!move_uploaded_file($_FILES['kartu_nikah']['tmp_name'], $pathKN)) {          
          fail('Kartu nikah gagal di upload');
          back();
        }
      } else {        
        fail('Tipe file Kartu nikah tidak di perbolehkan!');
        back();
      }
    } else {
      $pathKN = $_POST['kartu_nikah_value'];
    }

    if ($_FILES['kartu_keluarga']['size'] > 0) {
      if ($_FILES['kartu_keluarga']['type'] == 'image/jpeg') {
        $filename = rand() . '-' . basename($_FILES["kartu_keluarga"]["name"]);
        $pathKK = $folder . 'kartu_keluarga/' . $filename;
        if (!move_uploaded_file($_FILES['kartu_keluarga']['tmp_name'], $pathKK)) {          
          fail('kartu keluarga gagal di upload');
          back();
        }
      } else {        
        fail('Tipe file Kartu keluarga tidak di perbolehkan!');
        back();
      }
    } else {
      $pathKK = $_POST['kartu_keluarga_value'];
    }

    $data = [
      'no_surat_tunjangan' => implode('/',$_POST['no_surat']),
      'nip'                => $_POST['nip'],
      'tanggal_buat'       => $_POST['tanggal_buat'],
      'jenis_tunjangan'    => $_POST['jenis_tunjangan'],
      'kartu_nikah' => $pathKN,
      'kartu_keluarga' => $pathKK,
      'is_approve' => $_POST['is_approve'],
    ];    
    
    update($table, $primary, $data, 'Berhasil ubah data.');
    back();
  }
}

if (isset($_GET['id'])) {
  destroy($table, $primary, $_GET['id']);
  back();
}

?>