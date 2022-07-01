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
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Beras</th>
                        <th scope="col">Uang</th>
                        <th scope="col">Tanggal Input</th>
                        <th scope="col">Dibuat Oleh</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>          
                <?php $i = 1; ?>   
                    <?php foreach ($mal as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $s['nama']; ?></td>
                            <td><?= $s['beras']; ?></td>
                            <td><?= $s['uang']; ?></td>
                            <td><?= date('d F Y', $s['tanggal_input']); ?></td>
                            <td><?= $s['dibuat_oleh']; ?></td>
                            <td>                              
                                <a href="<?= base_url('zakat/malubah/') . $s['id']; ?>" class="badge rounded-pill bg-success">Edit</a>
                                <a href="<?= base_url('zakat/malhapus/') . $s['id']; ?>" class="badge rounded-pill bg-danger">Delete</a>
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
                        
                        <div class="mb-3">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="beras" name="beras" placeholder="Beras">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="uang" name="uang" placeholder="Uang">
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