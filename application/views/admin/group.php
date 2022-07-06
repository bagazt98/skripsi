<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-6">
            <?= form_error('grup', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Tambah User</a>
            <div class="col-lg-3">

            </div>


            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($grup as $g) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $g['name']; ?></td>
                            <td>
                                <!-- <a href="<?= base_url('admin/groupdir/') . $g['id_user']; ?>" class="badge rounded-pill bg-warning">VP</a>
                                <a href="<?= base_url('admin/groupuser/') . $g['id_user']; ?>" class="badge rounded-pill bg-warning">Dept</a>
                                <a href="<?= base_url('admin/groupsec/') . $g['id_user']; ?>" class="badge rounded-pill bg-warning">Section</a> -->
                                <a href="<?= base_url('admin/userhapus/') . $g['id_user']; ?>" class="badge rounded-pill bg-danger">Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/group'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class=" form-group row">
                            <div class="col-sm-2">Foto</div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="img" name="img">
                                            <label class="custom-file-label" for="file">Pilih Foto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <select name="roles" id="roles" class="form-control">
                                <option value="">Pilih Roles</option>
                                <?php foreach ($role as $a) { ?>
                                    <option value="<?= $a['id_roles']; ?>">
                                        <?= $a['nama_roles']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->