    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-1 text-white animated slideInDown">Tentang Kami</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <h1 class="display-1 text-white animated slideInDown">Masjid Jami’ Al-Hidayah</h1>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img class="img-fluid" src="<?= base_url('assets/'); ?>img/alhidayah.png" alt="">
                        <img class="img-fluid" src="<?= base_url('assets/'); ?>img/alhidayah.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h4 class="section-title">Tentang</h4>
                    <h1 class="display-5 mb-4">Masjid Jami' Al-hidayah</h1>
                    <p>Masjid Jami’ Al-Hidayah berdiri pada tahun 1976-an, atas wakaf H. Abdul Halim, Habib Abdullah dan ali bin bantong, namun sebelumnya Masjid Jami’ Al-Hidayah adalah pindahan dari kampus universitas Indonesia (UI), sebelumnya Masjid Jami’ Al-Hidayah sempat tertunda 2 tahun karena saat pembangunannya meliputi tiang-tiang saja, proses berdirinya Masjid Jami’ Al-Hidayah Selesai pada tahun 1984 dan itupun masih belum tersusun Organisasi DKMnya,</p>
                    <p class="mb-4">pada tahun 1987-1989 masjid jami’ Al-Hidayah Kembali di bangun 1 lantai. Pada tahun 1990 telah tersusun dan membentuk sebuah struktur organisasi dari Bpk H. M. Hamzah yaitu ketua DKM pertama, itupun belum ada Strukturnya dan masih di tunjuk untuk menjadi ketua, kemudian pada tahun 1998 di gantikan dengan Bpk H. M. Khotib, pada tahun 2012 yaitu permilihan DKM Secara resmi berdasarkan Voting dari warga-warga sekitar yaitu Bpk. H. Amin Fauzi, S, Pdi </p>
                    <p class="mb-4">pada tahun 2012 sudah tersusun organisasi yang meliputi Ketua DKM, Sekertaris, Bendahara. Kemudian dengan adanya perubahan-perubahan struktur pada tahun 2017 sampai sekarang yang meliputi Ketua DKM, Sekertaris, Bendahara, Seksi Humas, Seksi Dakwah, Seksi Pemuda dan Seksi Pembangunan.</p>
                    <div class="d-flex align-items-center mb-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center border border-5 border-primary" style="width: 120px; height: 120px;">
                            <h1 class="display-1 mb-n2" data-toggle="counter-up"><?= date('Y') - 1976; ?></h1>
                        </div>
                        <div class="ps-4">
                            <h3>Tahun</h3>
                            <h3>Masjid Jami’Al-Hidayah berdiri</h3>
                            <h3 class="mb-0">tahun 1976-an</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- team masjid -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Pengurus</h4>
                <h2 class="display-5 mb-4">Masjid Jami’ Al-hidayah</h2>
            </div>

            <div class="row g-0 team-items justify-content-center">
                <?php $i = 1; ?>
                <?php foreach ($user as $s) : ?>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item position-relative">
                            <div class="position-relative">
                                <div class="team-social text-center">
                                    <h4 class="section-title"><?= $s['nama_roles'] ?></h4>
                                </div>
                            </div>
                            <div class="bg-light text-center p-4">
                                <h3 class="mt-2"><?= $s['name'] ?></h3>
                                <span class="text-primary"></span>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Team masjid End -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Pengembangan</h4>
                <h4 class="section-title">Kelompok</h4>
                <h2 class="display-5 mb-4">Universitas Nusamandiri</h2>
            </div>
            <div class="row g-0 team-items justify-content-center">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative">
                        <div class="position-relative">
                            <!-- <img class="img-fluid" src="img/team-1.jpg" alt=""> -->
                            <div class="team-social text-center">
                                <!-- <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a> -->
                                <a class="btn btn-square" href="https://www.instagram.com/bagazttkc/"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h3 class="mt-2">BAGAZT SETYO NUGROHO</h3>
                            <span class="text-primary">PROGRAMER BACK END</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item position-relative">
                        <div class="position-relative">
                            <!-- <img class="img-fluid" src="img/team-2.jpg" alt=""> -->
                            <div class="team-social text-center">
                                <!-- <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a> -->
                                <a class="btn btn-square" href="https://www.instagram.com/permanahlo/"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h3 class="mt-2">IRVAN ADAM PERMANA</h3>
                            <span class="text-primary">PROGRAMER FRONT END</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item position-relative">
                        <div class="position-relative">
                            <!-- <img class="img-fluid" src="img/team-3.jpg" alt=""> -->
                            <div class="team-social text-center">
                                <!-- <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a> -->
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h3 class="mt-2">MOCH. DICKY OKTAVIANTO</h3>
                            <span class="text-primary">DATABASE DESIGNER</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->