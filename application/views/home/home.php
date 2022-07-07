<!-- Carousel Start | buat crud baner-->
<div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
	<div class="owl-carousel header-carousel position-relative">
		<?php foreach ($baner as $b) : ?>
			<div class="owl-carousel-item position-relative" data-dot="<img src='<?= base_url('assets/img/banner/') . $b['gambar']; ?>'>">
				<img class="d-block w-100" src="<?= base_url('assets/img/banner/') . $b['gambar']; ?> " height="500px" alt="">

				<div class="owl-carousel-inner">
					<div class="container">
						<div class="row justify-content-start">
							<div class="col-10 col-lg-8">
								<!-- tampilkan crud postingan baner -->
								<h1 class="display-1 text-white animated slideInDown"><?= $b['judul_bener']; ?></h1>
								<p class="fs-5 fw-medium text-white mb-4 pb-3"><?= $b['isi_bener']; ?></p>
								<a href="<?= base_url('home/berita'); ?>" class="btn btn-primary py-3 px-5 animated slideInLeft">Read More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<!-- Carousel End -->
<!-- team masjid -->
<div class="container-xxl py-5">
	<div class="container">
		<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
			<h4 class="section-title">Agenda Kegiatan</h4>
			<h2 class="display-5 mb-4">Masjid Jami’ Al-hidayah</h2>
		</div>

		<div class="row g-0 team-items justify-content-center">
			<?php $i = 1; ?>
			<?php foreach ($agenda_hari_ini as $s) : ?>
				<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
					<div class="team-item position-relative">
						<div class="position-relative">
							<div class="team-social text-center">
								<h4 class="section-title"><?= $s['judul_kegiatan'] ?></h4>
							</div>
						</div>
						<div class="bg-light text-center p-4">
							<h3 class="mt-2">Narasumber : <?= $s['narasumber'] ?></h3>
							<h3 class="mt-2"><?= $s['mulai'] ?> s/d <?= $s['selesai'] ?></h3>

						</div>
					</div>
				</div>
				<?php $i++; ?>

			<?php endforeach; ?>
		</div>
	</div>
</div>
<!-- Team masjid End -->



<!-- About Start | menampilkan about -->
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
				<h4 class="section-title">TENTANG KAMI</h4>
				<h1 class="display-5 mb-4">Masjid Jami’ Al-Hidayah</h1>
				<p>Jl. Margonda Raya (Kp. Stangkle Rw 06 Kemiri Muka Beji) Depok Jawa Barat 16423 Indonesia</p>
				<p>Masjid Jami’ Al-Hidayah berdiri pada tahun 1976-an, atas wakaf H. Abdul Halim, Habib Abdullah dan ali bin bantong</p>
				<a class="btn btn-primary py-3 px-5" href="<?= base_url('home/about'); ?>">Read More</a>
			</div>
		</div>
	</div>
</div>
<!-- About End -->


<!-- Menampilkan Postingan terbaru -->
<div class="container-xxl py-5">
	<div class="container">
		<div class="text-center mx-auto  " data-wow-delay="0.1s" style="max-width: 600px;">
			<h4 class="section-title">Rekomendasi Postingan Terbaru</h4>
		</div>
		<div class="row mt-4">
			<?php $i = 1; ?>
			<?php foreach ($brt as $s) : ?>
				<div class="col-md-4 mt-5" data-wow-delay="0.1s">
					<div class="card shadow-sm">
						<a href="#"><img src="<?= base_url('assets/img/berita/') . $s['gambar']; ?>" class="card-img-top" alt=""></a>
						<div class="card-body">
							<h5 class="card-title"><?= $s['judul_berita']; ?></h5>
							<p class="card-text"><small class="text-muted"><?= $s['name']; ?></small></p>
						</div>
					</div>
				</div>
				<?php $i++; ?>

			<?php endforeach; ?>

		</div>
	</div>
</div>
<!-- Postingan End -->
