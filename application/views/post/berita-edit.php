<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="roq">
        <div class="col-lg-8">
            <?= form_open_multipart('post/beritaubah/' . $berita['id']); ?>
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id" value="<?= $berita['id']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="judul_berita" class="col-sm-2 col-form-label">Judul Berita</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="judul_berita" name="judul_berita" value="<?= $berita['judul_berita']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="isi_berita" class="col-sm-2 col-form-label">Isi Berita</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="isi_berita" name="isi_berita" value="<?= $berita['isi_berita']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    <select name="kategori" id="kategori" class="form-control">
                        <option value="">Kategori Berita</option>
                        <?php foreach ($kategori as $k) { ?>
                            <option value="<?= $k['id_kategori']; ?>">
                                <?= $k['kategori']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="date" name="date" value="<?= $berita['tanggal']; ?>">
                </div>
            </div>
            <div class=" form-group row">
                <div class="col-sm-2">Gambar Berita</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar" required="required">
                                <label class="custom-file-label" for="file">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="satuan" class="col-sm-2 col-form-label">Gambar Berita</label>
                <div class="col-sm-10">
                    <img src="<?= base_url('assets/img/berita/'), $berita['gambar']; ?>" class="card-img">
                </div>
            </div>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->