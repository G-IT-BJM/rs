<?php

include 'config.php';
include 'session.php';
include 'function.php';

if (isset($_POST['ubah'])) {
    if ($_POST['sandi_baru'] == $_POST['konfirmasi_sandi']) {
        $cek_sandi_lama = select("select * from tb_user where user = '{$_SESSION['user']}' and pass = '{$_POST['sandi_lama']}'");
        if (count($cek_sandi_lama) > 0) {
            ubah_sandi($_POST['sandi_baru'],$_SESSION['user']);
        } else {
            fail('Kata sandi lama tidak cocok!');
        }
    } else {
        fail('Sandi baru tidak sama dengan konfirmasi sandi!');
    }
    
    back();
}