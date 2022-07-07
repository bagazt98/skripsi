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

			<div class="form-group row">
				<label for="id_kategori" class="col-sm-2 col-form-label">Dana Pembelian dari</label>
				<div class="col-sm-10">
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
			<div class="form-group row">
				<label for="saldo" class="col-sm-2 col-form-label">saldo</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="saldo" name="saldo" placeholder="0.0" readonly="readonly">
				</div>
			</div>
			<div class="form-group row">
				<label for="pengeluaran" class="col-sm-2 col-form-label">Pengeluaran</label>
				<div class="col-sm-10">
					<input type="text" id="pengeluaran" name="pengeluaran" class="form-control" value="<?= $bm['pengeluaran']; ?>" pattern="^([0-9.]+)">
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