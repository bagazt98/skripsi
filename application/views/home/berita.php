<div class="card mb-3 style=" width: 18rem;>
    <div class="row mt-4">
        <?php $i = 1; ?>
        <?php foreach ($brt as $s) : ?>
            <div class="col-md-4 mt-5" data-wow-delay="0.1s">
                <div class="card shadow-sm">
                    <a href="<?= base_url('home/post/') . $s['id']; ?>"><img src="<?= base_url('assets/img/berita/') . $s['gambar']; ?>" class="card-img-top" alt=""></a>
                    <div class="card-body">
                        <h5 class="card-title"><?= $s['judul_berita']; ?></h5>
                        <!-- <p class="card-text"><small class="text-muted"><?= $s['name']; ?></small></p> -->
                    </div>
                </div>
            </div>
            <?php $i++; ?>

        <?php endforeach; ?>

    </div>
</div>
<!-- Postingan End -->