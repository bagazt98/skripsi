<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg">
            <div class="form-group row">
                <?= form_error('mal', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= $this->session->flashdata('message'); ?>
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Tambah Baru</a>
                <div class="col-lg-3">

                </div>

            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Atas Nama</th>
                        <th>Alamat & No. Telepon</th>
                        <th>Petugas</th>
                        <th>Bentuk & Satuan Zakat</th>
                        <th>Jumlah Jiwa</th>
                        <th>Jumlah Zakat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($muzakki as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $s['kode_transaksi'] ?></td>
                            <td><?= ($s['date']) ?></td>
                            <td><?= $s['nama'] ?></td>
                            <td><?= $s['alamat'] ?></td>
                            <td><?= $s['name'] ?></td>
                            <td><?= $s['bentuk_zakat'] ?></td>
                            <td><?= $s['jumlah_jiwa'] ?> Jiwa</td>
                            <td><?= ($s['satuan_zakat'] === "RUPIAH") ? ($s['jumlah_zakat']) : ($s['jumlah_zakat']) ?></td>
                            <td>
                                <a href="<?= base_url('zakat/fitrahubah/') . $s['id_transaksi']; ?>" class="badge rounded-pill bg-success">Edit</a>
                                <a href="<?= base_url('zakat/hapusFitrah1/') . $s['id_transaksi']; ?>" class="badge rounded-pill bg-danger">Delete</a>
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
                <form action="<?= base_url('zakat/mal'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-4">
                                <input type="hidden" name="kode_transaksi" id="kode_transaksi" value="ZM">
                                <div class="form-group">
                                    <label for="date">Tanggal *</label>
                                    <input type="date" id="date" name="date" class="form-control" required="required">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">Status *</label>
                                    <select name="status" id="status" class="form-control text-black" required="required">
                                        <option value="masuk">Zakat Masuk</option>
                                        <option value="keluar">Zakat Keluar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nama">Atas Nama*</label>
                                    <input type="text" id="nama" name="nama" class="form-control text-black" placeholder="Atas Nama" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control textarea-vert" placeholder="Alamat" cols="30" rows="1"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="no_telepon">No. Telepon</label>
                                    <input type="text" id="no_telepon" name="no_telepon" class="form-control" placeholder="No. Telepon">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bentuk_zakat">Bentuk Zakat *</label>
                                    <select name="bentuk_zakat" id="bentuk_zakat" class="form-control text-black" required="required">
                                        <option value="">Pilih Bentuk Zakat</option>
                                        <option value="beras">Beras</option>
                                        <option value="uang tunai">Uang Tunai</option>
                                        <option value="gandum">Gandum</option>
                                        <option value="emas">Emas/Dinar</option>
                                        <option value="perak">Perak/Dirham</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="satuan_zakat">Satuan Zakat *</label>
                                    <select name="satuan_zakat" id="satuan_zakat" class="form-control text-black" required="required">
                                        <option value="">Pilih Satuan Zakat</option>
                                        <option value="RUPIAH">Rupiah</option>
                                        <option value="KILOGRAM">Kilogram</option>
                                        <option value="GRAM">Gram</option>
                                        <option value="LITER">Liter</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="jumlah_jiwa">Jumlah Jiwa</label>
                                    <input type="number" id="jumlah_jiwa" name="jumlah_jiwa" class="form-control" placeholder="0">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="jumlah_zakat">Jumlah Zakat *</label>
                                    <input type="text" id="jumlah_zakat" name="jumlah_zakat" class="form-control" placeholder="0.0" pattern="^([0-9.]+)" required="required">
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