<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg">
            <div class="form-group row">
                <?= form_error('sk', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= $this->session->flashdata('message'); ?>
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Tambah Baru</a>
                <div class="col-lg-3">

                </div>

            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Transaksi</th>
                        <th scope="col">Tanggal Transaksi</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Petugas</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Pemasukan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($daftar_kas as $kas) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $kas['kd_transaksi'] ?></td>
                            <td><?= ($kas['date']) ?></td>
                            <td><?= $kas['nama_kategori'] ?></td>
                            <td><?= $kas['name'] ?></td>
                            <td><?= $kas['keterangan'] ?></td>
                            <td><?= ($kas['pemasukan'] === null) ? '-' : ($kas['pemasukan']) ?></td>
                            <td>
                                <a href="<?= base_url('keuangan/masukubah/') . $kas['id'];  ?>" class="badge rounded-pill bg-success">Edit</a>
                                <a href="<?= base_url('keuangan/masukhapus/') . $kas['id']; ?> ?>" class="badge rounded-pill bg-danger">Delete</a>
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
                <form action="<?= base_url('keuangan/masuk'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="mb-3">
                            <input type="text" class="form-control" id="kd_transaksi" name="kd_transaksi" placeholder="Kode Transaksi">
                        </div>
                        <div class="mb-3">
                            <input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi">
                        </div>
                        <div class="mb-3">
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="">Kategori</option>
                                <?php foreach ($kategori as $kat) : ?>
                                    <option value="<?= $kat->id_kategori ?>"><?= $kat->nama_kategori ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan">
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" id="pemasukan" name="pemasukan" placeholder="Pemasukan" pattern="^([0-9.]+)">
                        </div>
                        <div class=" form-group row">
                            <div class="col-sm-2">File</div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="dokumentasi" name="dokumentasi">
                                            <label class="custom-file-label" for="file">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
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