<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg">
            <div class="form-group row">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>
                <?= $this->session->flashdata('message'); ?>
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Tambah Baru</a>
                <div class="col-lg-3">

                </div>

            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jenis Kegiatan</th>
                        <th scope="col">Judul Kegiatan</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Narasumber</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($agenda as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $s['tanggal']; ?></td>
                            <td><?= $s['jenis_kegiatan']; ?></td>
                            <td><?= $s['judul_kegiatan']; ?></td>
                            <td><?= $s['mulai']; ?> s/d <?= is_null($s['selesai']) ? 'Selesai' : $s['selesai'] ?></td>
                            <td><?= $s['narasumber']; ?></td>
                            <td><?= $s['keterangan']; ?></td>
                            <td>
                                <a href="<?= base_url('agenda/kegiatanubah/') . $s['id']; ?>" class="badge rounded-pill bg-success">Edit</a>
                                <a href="<?= base_url('agenda/kegiatanhapus/') . $s['id']; ?>" class="badge rounded-pill bg-danger">Delete</a>
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
                <form action="<?= base_url('agenda/kegiatan'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="id_kegiatan" id="id_kegiatan" value="">
                                <div class="form-group">
                                    <label for="date">Tanggal *</label>
                                    <input type="date" id="date" name="date" class="form-control" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_jenis">Jenis Agenda *</label>
                                    <select name="id_jenis" id="id_jenis" class="form-control" required="required">
                                        <option value="">Pilih Kategori</option>
                                        <?php foreach ($jenis as $j) : ?>

                                            <option value="<?= $j->id_jenis ?>"><?= $j->jenis_kegiatan ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="judul_kegiatan">Judul Kegiatan *</label>
                                    <input type="text" id="judul_kegiatan" name="judul_kegiatan" class="form-control" placeholder="Judul Kegiatan" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="narasumber">Narasumber *</label>
                                    <input type="text" id="narasumber" name="narasumber" class="form-control" placeholder="Narasumber" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jam_mulai">Jam Mulai *</label>
                                    <input type="text" id="jam_mulai" name="jam_mulai" class="form-control" placeholder="00:00:00" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jam_selesai">Jam Selesai</label>
                                    <input type="text" id="jam_selesai" name="jam_selesai" class="form-control" placeholder="00:00:00">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan *</label>
                                    <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan">
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