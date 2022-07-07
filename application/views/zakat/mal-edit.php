<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="roq">
        <div class="col-lg-8">
            <?= form_open_multipart('zakat/malubah/' . $fu['id_transaksi']); ?>

            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id" value="<?= $fu['id_transaksi']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label">Status *</label>
                <div class="col-sm-10">
                    <select name="status" id="status" class="form-control" required="required">
                        <option value="masuk">Zakat Masuk</option>
                        <option value="keluar">Zakat Keluar</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Atas Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $fu['nama']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $fu['alamat']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="no_telepon" class="col-sm-2 col-form-label">No Telepon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="<?= $fu['no_telepon']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" id="date" name="date" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="bentuk_zakat" class="col-sm-2 col-form-label">Bentuk Zakat *</label>
                <div class="col-sm-10">
                    <select name="bentuk_zakat" id="bentuk_zakat" class="form-control" required="required">
                        <option value="">Pilih Bentuk Zakat</option>
                        <option value="beras">Beras</option>
                        <option value="uang tunai">Uang Tunai</option>
                        <option value="gandum">Gandum</option>
                        <option value="emas">Emas/Dinar</option>
                        <option value="perak">Perak/Dirham</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="satuan_zakat" class="col-sm-2 col-form-label">Satuan Zakat *</label>
                <div class="col-sm-10">
                    <select name="satuan_zakat" id="satuan_zakat" class="form-control text-black" required="required">
                        <option value="">Pilih Satuan Zakat</option>
                        <option value="RUPIAH">Rupiah</option>
                        <option value="KILOGRAM">Kilogram</option>
                        <option value="GRAM">Gram</option>
                        <option value="LITER">Liter</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="jumlah_jiwa" class="col-sm-2 col-form-label">Jumlah Jiwa</label>
                <div class="col-sm-10">
                    <input type="number" id="jumlah_jiwa" name="jumlah_jiwa" class="form-control" value="<?= $fu['jumlah_jiwa']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jumlah_zakat" class="col-sm-2 col-form-label">Jumlah Zakat *</label>
                <div class="col-sm-10">
                    <input type="text" id="jumlah_zakat" name="jumlah_zakat" class="form-control" value="<?= $fu['jumlah_zakat']; ?>" pattern="^([0-9.]+)">
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