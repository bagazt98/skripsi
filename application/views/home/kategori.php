    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-1 text-white animated slideInDown text-center">POST KATEGORI</h1>
            </nav>
        </div>
    </div>
    <!-- page header end-->
    <div class="row justify-content-center mb-5">
        <div class="row mb-5">
            <?php foreach ($brt as $s) : ?>
                <div class="col-md-4 mb-3">
                    <a href="<?= base_url('home/pk/') . $s['id_kategori']; ?>">
                        <div class="card bg-dark text-white">
                            <img src="<?= base_url('assets/'); ?>img/about-1.jpg" class="card-img" alt="" style="max-height: 350px; overflow: hidden;">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color : rgba(255, 255, 255, 0.466)"><?= $s['kategori']; ?></h5>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>