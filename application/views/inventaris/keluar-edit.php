<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="roq">
        <div class="col-lg-8">
            <?= form_open_multipart('inventaris/keluarubah/' . $bk['id_barang']); ?>

            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id" value="<?= $bk['id_barang']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">Kode Barang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kd_barang" name="kd_barang" value="<?= $bk['kode_barang']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tgl_pendataan" name="tgl_pendataan" value="<?= $bm['tgl_pendataan']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $bk['nama_barang']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">Kuantitas Keluar</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kuantitas" name="kuantitas" value="<?= $bk['kuantitas_keluar']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $bk['keterangan']; ?>">
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