<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


	<div class="row">
		<div class="col-lg">
			<div class="form-group row">
				<?= form_error('brt', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
				<?= $this->session->flashdata('message'); ?>
				<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Tambah Baru</a>
				<div class="col-lg-3">
				</div>
			</div>

			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Judul Berita</th>
						<th scope="col">Isi Berita</th>
						<th scope="col">Kategori Berita</th>
						<th scope="col">Gambar</th>
						<th scope="col">Petugas</th>
						<th scope="col">Tanggal Input</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($daftar_berita as $s) : ?>
						<tr>
							<th scope="row"><?= $i; ?></th>
							<td><?= $s['judul_berita']; ?></td>
							<td><?= $s['isi_berita']; ?></td>
							<td><?= $s['kategori']; ?></td>
							<td><?= $s['gambar']; ?></td>
							<td><?= $s['name']; ?></td>
							<td><?= $s['tanggal']; ?></td>
							<td>
								<a href="<?= base_url('post/beritaubah/') . $s['id']; ?>" class="badge rounded-pill bg-success">Edit</a>
								<a href="<?= base_url('post/beritahapus/') . $s['id']; ?>" class="badge rounded-pill bg-danger">Delete</a>
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
				<form action="<?= base_url('post/berita'); ?>" method="post" enctype="multipart/form-data">
					<div class="modal-body">

						<div class="mb-3">
							<input type="text" class="form-control" id="judul_berita" name="judul_berita" placeholder="Judul Berita">
						</div>
						<div class="mb-3">
							<input type="textarea" class="form-control" id="isi_berita" name="isi_berita" placeholder="Isi Berita">
						</div>
						<div class="mb-3">
							<select name="kategori" id="kategori" class="form-control">
								<option value="">Kategori</option>
								<?php foreach ($kategori as $k) { ?>
									<option value="<?= $k['id_kategori']; ?>">
										<?= $k['kategori']; ?>
									</option>
								<?php } ?>
							</select>
						</div>
						<div class=" form-group row">
							<div class="col-sm-2">File</div>
							<div class="col-sm-10">
								<div class="row">
									<div class="col-sm-9">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="gambar" name="gambar" required="required">
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
