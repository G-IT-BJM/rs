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
                    Cetak Laporan Karyawan Perpendidikan
                </div>
            </div>
            <div class="card-body">
                <form method="get" target="_blank" action="cetak-laporan-karyawan-perpendidikan.php">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <div class="control-label">
                                    Pendidikan :
                                </div>
                                <select class="form-control" id="pendidikan_akhir" name="pendidikan_akhir" required>
                                    <option value="" selected="">Pilih Pendidikan</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <div class="control-label">
                                    &nbsp;
                                </div>
                                <input class="btn btn-primary" type="submit" value="Cetak" name="cetak">
                            </div>
                        </div>
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