<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="roq">
        <div class="col-lg-8">
            <?= form_open_multipart('agenda/jenisubah/' . $jenis['id_jenis']); ?>
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id" value="<?= $jenis['id_jenis']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="jenis" class="col-sm-2 col-form-label">Jenis Kegiatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="jenis" name="jenis" value="<?= $jenis['jenis_kegiatan']; ?>">
                </div>
            </div>

            <div class="form-group row justify-content-end">

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