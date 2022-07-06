<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="roq">
        <div class="col-lg-8">
            <?= form_open_multipart('keuangan/keluarubah/' . $km['id']); ?>

            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id" value="<?= $km['id']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">Kode Transaksi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kd_transaksi" name="kd_transaksi" value="<?= $km['kd_transaksi']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    <select name="kategori" id="kategori" class="form-control">
                        <option value="">Kategori</option>
                        <?php foreach ($kat as $k) { ?>
                            <option value="<?= $k['id_kategori']; ?>">
                                <?= $k['nama_kategori']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="date" name="date" value="<?= $km['date']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $km['keterangan']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="pengeluaran" class="col-sm-2 col-form-label">pengeluaran</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pengeluaran" name="pengeluaran" value="<?= $km['pengeluaran']; ?>">
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