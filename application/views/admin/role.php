<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


	<div class="row">
		<div class="col-lg-6">
			<?= form_error('role', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			<?= $this->session->flashdata('message'); ?>
			<a href="<?= base_url('admin/role') ?>" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Tambah Jabatan</a>
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Jabatan</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($role as $r) : ?>
						<tr>
							<th scope="row"><?= $i; ?></th>
							<td><?= $r['nama_roles']; ?></td>
							<td>
								<a href="<?= base_url('admin/roleaccess/') . $r['id_roles']; ?>" class="badge rounded-pill bg-warning">Access</a>
								<a href="<?= base_url('admin/roleubah/') . $r['id_roles']; ?>" class="badge rounded-pill bg-success">Edit</a>
								<a href="<?= base_url('admin/rolehapus/') . $r['id_roles']; ?>" class="badge rounded-pill bg-danger">Delete</a>
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
					<h5 class="modal-title" id="exampleModalLabel">Tambah jabatan</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('admin/role'); ?>" method="post">
					<div class="modal-body">
						<div class="mb-3">
							<input type="text" class="form-control" id="rol" name="rol" placeholder="Role Name">
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
