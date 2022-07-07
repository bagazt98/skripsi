<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


	<div class="row">
		<div class="col-lg">
			<div class="form-group row">
				<?= form_error('km', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
				<?= $this->session->flashdata('message'); ?>

				<div class="col-lg-3">

				</div>

			</div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">tanggal</th>
						<th>Kategori kas</th>
						<th>Pemasukan</th>
						<th>Pengeluaran</th>
						<th>Sisa Saldo</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($saldo_kas as $kas) : ?>
						<tr>
							<td><?= $kas['date'] ?></td>
							<td><?= $kas['nama_kategori'] ?></td>
							<td><?= ($kas['pemasukan'] === null) ? 0 : ($kas['pemasukan']) ?></td>
							<td><?= ($kas['pengeluaran'] === null) ? 0 : ($kas['pengeluaran']) ?></td>
							<td><?= ($kas['pemasukan'] - $kas['pengeluaran']) ?></td>
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
