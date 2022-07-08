<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


	<div class="row">
		<div class="col-lg">
			<div class="form-group row">
				<?= form_error('bk', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
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
						<th scope="col">Kuantitas Keluar</th>
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
							<td><?= $s['kuantitas_keluar']; ?> <?= $s['satuan']; ?></td>
							<td><?= $s['keterangan']; ?></td>
							<td>
								<a href="<?= base_url('inventaris/keluarubah/') . $s['id_barang']; ?>" class="badge rounded-pill bg-success">Edit</a>
								<a href="<?= base_url('inventaris/keluarhapus/') . $s['id_barang']; ?>" class="badge rounded-pill bg-danger">Delete</a>
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
				<form action="<?= base_url('inventaris/keluar'); ?>" method="post" enctype="multipart/form-data">
					<div class="modal-body">

						<div class="form-group mb-3" style="margin-left:12px">
							<div class="form-group row">
								<input type="text" class="form-control col-lg-3" id="no2" name="no2" value="<?= $no_otomatis; ?>">/
								<input type="text" class="form-control col-lg-2" id="no1" name="no1" value="BK">/
								<select name="no3" id="no3" class="form-control col-lg-3">
									<?php foreach ($array_bln as $b) { ?>
										<option value="<?= $b; ?>" <?php if ($b == $bln) {
																		echo "selected";
																	} ?>><?= $b; ?></option>
									<?php } ?>
								</select>/
								<input type="text" class="form-control col-lg-2" id="no4" name="no4" value="<?= date('Y'); ?>">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="date">Tanggal *</label>
									<input type="date" id="date" name="tgl_pendataan" class="form-control" required="required">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="nama_barang">Nama Barang *</label>
									<select name="nama_barang" id="nama_barang" class="form-control" required="required">
										<option value="">Pilih Barang</option>
										<?php foreach ($stok_list as $stok) : ?>

											<option value="<?= $stok['nama_barang'] ?>" data-stok="<?= $stok['stok'] ?>"><?= $stok['nama_barang'] ?></option>
										<?php endforeach; ?>

									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="keterangan">Keterangan</label>

									<select name="keterangan" id="keterangan" class="form-control" required="required">
										<option value="">Pilih Keterangan</option>
										<option value="Rusak">Rusak</option>
										<option value="Hilang">Hilang</option>
										<option value="Habis Pakai">Habis Pakai</option>
										<option value="Dihibahkan">Dihibahkan</option>
										<option value="Dijual">Dijual</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="stok_barang">Stok Barang</label>
									<input type="text" id="stok_barang" name="stok" class="form-control" placeholder="0.0" readonly="readonly">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="kuantitas_keluar">Kuantitas Keluar *</label>
									<input type="text" id="kuantitas_keluar" name="kuantitas_keluar" class="form-control" placeholder="0.0" pattern="^([0-9.]+)" required="required">
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
									<label>Dokumentasi</label>
									<input type="hidden" name="dokumentasi_old" id="dokumentasi_old">
									<input type="file" name="dokumentasi" id="dokumentasi_barang" class="file-upload-default">
									<small class="text-danger">
										<p>Maksimal 3MB dengan ekstensi jpg, jpeg, atau png.
										</p>
									</small>
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