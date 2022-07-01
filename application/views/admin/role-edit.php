<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="roq">
        <div class="col-lg-8">
            <?= form_open_multipart('admin/roleubah/' . $role['id_roles']); ?>
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id" value="<?= $role['id_roles']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="rd" class="col-sm-2 col-form-label">Nama Roles</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="rd" name="rd" value="<?= $role['nama_roles']; ?>">
                    <?= form_error('rd', '<small class="text-danger pl-3">', '</small>'); ?>
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