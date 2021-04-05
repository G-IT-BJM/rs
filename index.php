
<?php 

include 'config.php';
include 'inc/head.php'; 
include 'function.php';

?>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        
        <?php show_notif() ?>

        <div class="card">
            <div class="card-body">
                <p class="mb-0">
                    Selamat datang di aplikasi pengelolaan surat pada rumah sakit.
                </p>
            </div>
        </div>        
    </div>
</main>

<?php include 'inc/footer.php' ?>