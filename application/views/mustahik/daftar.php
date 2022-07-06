<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg">
            <div class="form-group row">
                <?= form_error('dm', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= $this->session->flashdata('message'); ?>
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Tambah Baru</a>
                <div class="col-lg-3">

                </div>

            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Telepon</th>
                        <th scope="col">Petugas</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dm as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $s['nama']; ?></td>
                            <td><?= $s['kategori']; ?></td>
                            <td><?= $s['alamat']; ?></td>
                            <td><?= $s['no_telpon']; ?></td>
                            <td><?= $s['petugas']; ?></td>
                            <td>
                                <a href="<?= base_url('mustahik/daftarubah/') . $s['id']; ?>" class="badge rounded-pill bg-success">Edit</a>
                                <a href="<?= base_url('mustahik/daftarhapus/') . $s['id']; ?>" class="badge rounded-pill bg-danger">Delete</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Baru</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('mustahik/daftar'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="mb-3">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                        </div>
                        <div class="col-md-16">
                            <div class="form-group">
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
                        <div class="mb-3">
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="No Telepon">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->