<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg">
            <div class="form-group row">
                <?= form_error('kegi', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
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
                        <th scope="col">Waktu Mulai</th>
                        <th scope="col">Waktu Selesai</th>
                        <th scope="col">Narasumber</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>          
                <?php $i = 1; ?>   
                    <?php foreach ($ak as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= date('d F Y', $s['tanggal']); ?></td>
                            <td><?= $s['jenis_kegiatan']; ?></td>
                            <td><?= $s['judul_kegiatan']; ?></td>
                            <td><?= $s['mulai']; ?></td>
                            <td><?= $s['selesai']; ?></td>
                            <td><?= $s['narasumber']; ?></td>
                            <td><?= $s['keterangan']; ?></td>
                            <td>                              
                                <a href="<?= base_url('kegiatan/kegiatanubah/') . $s['id']; ?>" class="badge rounded-pill bg-success">Edit</a>
                                <a href="<?= base_url('kegiatan/kegiatanhapus/') . $s['id']; ?>" class="badge rounded-pill bg-danger">Delete</a>
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
                <form action="<?= base_url('kegiatan/kegiatan'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        
                        <div class="mb-3">
                            <input type="date" class="form-control" id="tanggal" name="tanggal" >
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                        </div>
                        <div class="form-group mb-3">
                            <div class="form-group row">
                                <input type="text" class="form-control col-lg-3" id="t1" name="t1" >
                                <input type="text" class="form-control col-lg-2" id="t2" name="t2" >
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="judul_kegiatan" name="judul_kegiatan" placeholder="Judul Kegiatan">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="narasumber" name="narasumber" placeholder="Narasumber">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan">
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