<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
	<a href="<?= current_url() ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
		class="fas fa-sync fa-sm text-white-50"></i> Reload Halaman</a>
	</div>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<div class="row">
				<div class="col-lg-8 col-sm-6">
					<h6 class="m-0 font-weight-bold text-primary">Data Mata Pelajaran</h6>
				</div>
				<div class="col-lg-4 col-sm-6">
					<a href="#" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addSiswa" style="float: right;">Tambah Data</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Mata Pelajaran</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; ?>
						<?php foreach ($matpel as $item): ?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?= $item['nama_matpel'] ?></td>
								<td class="text-center">
									<a type="button" href="#" data-toggle="modal" data-target="#edit-<?= $item['id_matpel'] ?>" class="btn btn-primary btn-sm btn-circle"><i class="fas fa-edit"></i></a>
									<a type="button" href="#" class="btn btn-danger btn-sm btn-circle" data-toggle="modal" data-target="#hapus-<?= $item['id_matpel'] ?>"><i class="fas fa-trash"></i></a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- MODAL ADD -->
	<div class="modal fade" id="addSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Siswa</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?= base_url('data-matpel/add') ?>" method="POST">
				<div class="modal-body">
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="nama_matpel" value="<?= old('nama_matpel') ?>" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Simpan</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- MODAL EDIT dan HAPUS -->
	<?php foreach ($matpel as $item): ?>
		<div class="modal fade" id="edit-<?= $item['id_matpel'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Form Edit Data Siswa</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<form action="<?= base_url('data-matpel/update/' . $item['id_matpel']) ?>" method="POST">
						<div class="modal-body">
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="nama_matpel" value="<?= $item['nama_matpel'] ?>" required>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Simpan</a>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="modal fade" id="hapus-<?= $item['id_matpel'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan Data</h5>
							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">Yakin ingin menghapus data mata pelajaran (<?= $item['nama_matpel'] ?>)</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
							<a type="button" class="btn btn-danger" href="<?= base_url('data-matpel/delete/' . $item['id_matpel']) ?>">Hapus</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach ?>
		<?= $this->endSection() ?>