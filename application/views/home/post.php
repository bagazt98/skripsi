    <div class="row justify-content-center mb-5">
    	<div class="col-md-8">
    		<!-- Title dari masing-masing postingan -->
    		<h1 class="mb-3"><?= $brt['judul_berita']; ?></h1>

    		<!-- menampilakan author dan kategori postingan-->
    		<p>by. <a href="<?= base_url('home/pk/') . $user['id_user']; ?>"></a><?= $brt['name']; ?> Postingan
    			<a href="<?= base_url('home/pk/') . $brt['id_kategori']; ?>" class="text-decoration-none"><?= $brt['kategori']; ?></a>
    		</p>

    		<!--menampilkan gambar upload-->
    		<div style="max-height: 350px; overflow: hidden;">
    			<img src="<?= base_url('assets/img/berita/') . $brt['gambar']; ?>" alt="" class="img-fluid">
    		</div>

    		<article class="my-3 fs-6">
    			<!--menampilkan keseluruhan body postingan -->
    			<p><?= $brt['isi_berita']; ?></p>

    		</article>

    		<!--tombol kembali-->
    		<a href="<?= base_url('home/berita') ?>" class="text-decoration-none mt-3">back to post</a>
    	</div>
    </div>
    </div>
