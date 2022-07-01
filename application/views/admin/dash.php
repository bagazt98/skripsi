<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="card mb-3" col-lg-8>
        <div class="row g-0">
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Selamat Datang Di Aplikasi Masjid Jami' Al-Hidayah</h5>
                </div>
            </div>
            <div class="col-lg-13">
                <img src="<?= base_url('assets/'); ?>img/dash/Great_mosque_in_Medan_cropped.jpg" class="card-img">
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>