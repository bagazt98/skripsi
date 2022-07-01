<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="roq">
        <div class="col-lg-8">
            <?= form_open_multipart('zakat/fitrahubah/' . $fu['id']); ?>

            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id" value="<?= $fu['id']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $fu['nama']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">Beras</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="beras" name="beras" value="<?= $fu['beras']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">Uang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="uang" name="uang" value="<?= $fu['uang']; ?>">
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