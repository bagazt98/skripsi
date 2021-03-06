<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="roq">
        <div class="col-lg-8">
            <?= form_open_multipart('post/benerubah/' . $bener['id']); ?>
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id" value="<?= $bener['id']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="judul_bener" class="col-sm-2 col-form-label">Judul Bener</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="judul_bener" name="judul_bener" value="<?= $bener['judul_bener']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="isi_bener" class="col-sm-2 col-form-label">Isi Bener</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="isi_bener" name="isi_bener" value="<?= $bener['isi_bener']; ?>">
                </div>
            </div>
            <div class=" form-group row">
                <div class="col-sm-2">Gambar Bener</div>
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