<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="roq">
		<div class="col-lg-8">
			<?= form_open_multipart('inventaris/masukubah/' . $bm['id_barang']); ?>

			<div class="form-group row">
				<label for="id" class="col-sm-2 col-form-label">ID</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="id" name="id" value="<?= $bm['id_barang']; ?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<label for="id" class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-10">
					<input type="date" class="form-control" id="tgl_pendataan" name="tgl_pendataan" value="<?= $bm['tgl_pendataan']; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="id" class="col-sm-2 col-form-label">Nama Barang</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $bm['nama_barang']; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $bm['keterangan']; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="kuantitas_masuk" class="col-sm-2 col-form-label">Kuantitas Masuk *</label>
				<div class="col-sm-10">
					<input type="text" id="kuantitas_masuk" name="kuantitas_masuk" class="form-control" value="<?= $bm['kuantitas_masuk']; ?>" pattern="^([0-9.]+)">
				</div>
			</div>
			<div class="form-group row">
				<label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="satuan" name="satuan" value="<?= $bm['satuan']; ?>">
				</div>
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
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary">Edit</button>
			</div>

			</form>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->