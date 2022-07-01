<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="roq">
        <div class="col-lg-8">
            <?= form_open_multipart('mustahik/daftarubah/' . $dm['id']); ?>

            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id" value="<?= $dm['id']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $dm['nama']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                          <select name="kategori" id="kategori" class="form-control text-black" required="required">
                          <option value="">Pilih Kategori</option>
                            <option value="fakir">Fakir</option>
                            <option value="miskin">Miskin</option>
                            <option value="riqab">Riqab</option>
                            <option value="gharim">Gharim</option>
                            <option value="ibnu sabil">Ibnu Sabil</option>
                            <option value="mualaf">Mualaf</option>
                            <option value="amil zakat">Amil Zakat</option>
                            <option value="yatim">Yatim</option>
                            <option value="piatu">Piatu</option>
                            <option value="janda">Janda</option>
                            <option value="fi sabilillah">Fi Sabilillah</option>
                          </select>
                      </div>
                  </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $dm['alamat']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="no_telpon" class="col-sm-2 col-form-label">No Telpon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_telpon" name="no_telpon" value="<?= $dm['no_telpon']; ?>">
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