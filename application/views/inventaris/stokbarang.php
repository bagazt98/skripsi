<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg">
            <div class="form-group row">
                <?= form_error('km', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= $this->session->flashdata('message'); ?>
                <!-- <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Tambah Baru</a> -->
                <div class="col-lg-3">

                </div>

            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kuantitas Masuk</th>
                        <th>Kuantitas Keluar</th>
                        <th>Stok Barang</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($stok_brg as $brg) : ?>
                        <tr>
                            <td><?= $brg['nama_barang'] ?></td>
                            <td class="text-right"><?= $brg['stok_in'] ?> <?= $brg['satuan'] ?></td>
                            <td class="text-right"><?= $brg['stok_out'] ?> <?= $brg['satuan'] ?></td>
                            <td class="text-right"><?= $brg['stok_in'] - $brg['stok_out'] ?> <?= $brg['satuan'] ?></td>
                        </tr>
                        <?php $i++; ?>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->