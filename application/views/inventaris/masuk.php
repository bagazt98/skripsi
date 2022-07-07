<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg">
            <div class="form-group row">
                <?= form_error('bm', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= $this->session->flashdata('message'); ?>
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Tambah Baru</a>
                <div class="col-lg-3">

                </div>

            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Tanggal Pendataan</th>
                        <th scope="col">Petugas</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Kuantitas Masuk</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($barang as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $s['kode_barang']; ?></td>
                            <td><?= $s['tgl_pendataan']; ?></td>
                            <td><?= $s['name']; ?></td>
                            <td><?= $s['nama_barang']; ?></td>
                            <td><?= $s['kuantitas_masuk']; ?></td>
                            <td><?= $s['keterangan']; ?></td>
                            <td>
                                <a href="<?= base_url('inventaris/masukubah/') . $s['id_barang']; ?>" class="badge rounded-pill bg-success">Edit</a>
                                <a href="<?= base_url('inventaris/masukhapus/') . $s['id_barang']; ?>" class="badge rounded-pill bg-danger">Delete</a>
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
                <form action="<?= base_url('inventaris/masuk'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="kode_barang" id="kode_barang" value="KB">
								<input type="text" name="id_barang" id="id_barang" value="<?=  $kdBrg; ?>">
                                <input type="hidden" name="hash" id="hash" value="">
                                <div class="form-group">
                                    <label for="date">Tanggal *</label>
                                    <input type="date" id="date" name="tgl_pendataan" class="form-control" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang *</label>
                                    <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Nama Barang" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kuantitas_masuk">Kuantitas Masuk *</label>
                                    <input type="text" id="kuantitas_masuk" name="kuantitas_masuk" class="form-control" placeholder="0.0" pattern="^([0-9.]+)" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="satuan">Satuan *</label>
                                    <input type="text" id="satuan" name="satuan" class="form-control" placeholder="Satuan" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="id_kategori">Dana Pembelian dari</label>
                                    <input type="hidden" name="hidden_kategori" id="hidden_kategori" value="">
                                    <select name="id_kategori" id="id_kategori" class="form-control text-black">
                                        <option value="">Pilih Kategori</option>
                                        <?php foreach ($saldo_kas as $kat) : ?>

                                            <option value="<?= $kat['id_kategori'] ?>" data-saldo="<?= $kat['saldo'] ?>"><?= $kat['nama_kategori'] ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                    <small class="text-danger">Dipilih jika barang masuk dibeli menggunakan kas masjid.</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="saldo">Saldo</label>
                                    <input type="text" id="saldo" name="saldo" class="form-control" placeholder="0.0" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pengeluaran">Pengeluaran</label>
                                    <input type="text" id="pengeluaran" name="pengeluaran" class="form-control" placeholder="0.0" pattern="^([0-9.]+)">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Dokumentasi</label>
                                    <input type="hidden" name="dokumentasi_old" id="dokumentasi_old">
                                    <input type="file" name="dokumentasi" id="dokumentasi_barang" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Unggah Dokumentasi">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary cari-foto" type="button">Cari...</button>
                                        </span>
                                    </div>
                                    <small class="text-danger">Maksimal 5MB dengan ekstensi jpg, jpeg, atau png.</small>
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
