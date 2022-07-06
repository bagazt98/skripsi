<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="roq">
        <div class="col-lg-8">
            <?= form_open_multipart('agenda/kegiatanubah/' . $ak['id']); ?>

            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id" value="<?= $ak['id']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="date" name="date" value="<?= $ak['tanggal']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jenis_kegiatan" class="col-sm-2 col-form-label">Jenis Kegiatan</label>
                <div class="col-sm-10">
                    <select name="jenis_kegiatan" id="jenis_kegiatan" class="form-control">
                        <option value="">Pilih Kategori</option>
                        <?php foreach ($jenis as $j) : ?>
                            <option value="<?= $j->id_jenis ?>"><?= $j->jenis_kegiatan ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="judul_kegiatan" class="col-sm-2 col-form-label">Judul Kegiatan</label>
                <div class="col-sm-10">
                    <input type="judul_kegiatan" class="form-control" id="judul_kegiatan" name="judul_kegiatan" value="<?= $ak['judul_kegiatan']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="narasumber" class="col-sm-2 col-form-label">Narasumber</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="narasumber" name="narasumber" value="<?= $ak['narasumber']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="mulai" class="col-sm-2 col-form-label">Jam Mulai</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="mulai" name="mulai" value="<?= $ak['mulai']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="selesai" class="col-sm-2 col-form-label">Jam selesai</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="selesai" name="selesai" value="<?= $ak['selesai']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $ak['keterangan']; ?>">
                </div>
            </div>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>
        </form>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->