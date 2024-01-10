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
					<a href="#" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addUjian" style="float: right;">Tambah Data</a>
				</div>
			</div>
			<form id="filterForm" class="mt-3 d-flex align-items-end">
				<div class="col-md-4 col-sm-3">
					<label for="start_date">Dari Tanggal:</label>
					<input type="date" class="form-control" name="start_date" id="start_date" required>
				</div>
				<div class="col-md-4 col-sm-3 mx-2">
					<label for="end_date">Sampai Tanggal:</label>
					<input type="date" class="form-control" name="end_date" id="end_date" required>
				</div>
				<div class="col-md-3 col-sm-2">
					<button type="button" onclick="filterData()" class="btn btn-primary">Filter</button>
					<button type="button" onclick="resetFilter()" class="btn btn-secondary ml-2">Reset</button>
				</div>

			</form>

		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Ujian</th>
							<th>Mata Pelajaran</th>
							<th>Tanggal</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; ?>
						<?php foreach ($ujian as $item): ?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?= $item['nama_ujian'] ?></td>
								<td>
									<?php foreach ($matpel as $pel): ?>
										<?php if ($pel['id_matpel'] == $item['id_matpel']): ?>
											<?= $pel['nama_matpel'] ?>
										<?php endif ?>
									<?php endforeach ?>
								</td>
								<td><?= date('d F Y', strtotime($item['tanggal'])) ?></td>
								<td class="text-center">
									<a type="button" href="#" data-toggle="modal" data-target="#edit-<?= $item['id_ujian'] ?>" class="btn btn-primary btn-sm btn-circle"><i class="fas fa-edit"></i></a>
									<a type="button" href="#" class="btn btn-danger btn-sm btn-circle" data-toggle="modal" data-target="#hapus-<?= $item['id_ujian'] ?>"><i class="fas fa-trash"></i></a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- MODAL ADD -->
	<div class="modal fade" id="addUjian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Ujian</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?= base_url('data-ujian/add') ?>" method="POST">
				<div class="modal-body">
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Nama Ujian</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="nama_ujian" value="<?= old('nama_ujian') ?>" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Mata Pelajaran</label>
						<div class="col-sm-10">
							<select name="id_matpel" class="form-control form-select" required>
								<option selected disabled>-- Pilih Mata Pelajaran --</option>
								<?php foreach ($matpel as $mat): ?>
									<option value="<?= $mat['id_matpel'] ?>"><?= $mat['nama_matpel'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" name="tanggal" value="<?= old('tanggal') ?>" required>
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
	<?php foreach ($ujian as $item): ?>
		<div class="modal fade" id="edit-<?= $item['id_ujian'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Form Edit Data Siswa</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<form action="<?= base_url('data-ujian/update/' . $item['id_ujian']) ?>" method="POST">
						<div class="modal-body">
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Nama Ujian</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="nama_ujian" value="<?= $item['nama_ujian'] ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Mata Pelajaran</label>
								<div class="col-sm-10">
									<select name="id_matpel" class="form-control form-select" required>
										<option selected disabled>-- Pilih Mata Pelajaran --</option>
										<?php foreach ($matpel as $mat): ?>
											<option value="<?= $mat['id_matpel'] ?>" <?= ($item['id_matpel'] == $mat['id_matpel'] ? 'selected' : '') ?>><?= $mat['nama_matpel'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Tanggal</label>
								<div class="col-sm-10">
									<input type="date" class="form-control" name="tanggal" value="<?= $item['tanggal'] ?>" required>
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

			<div class="modal fade" id="hapus-<?= $item['id_ujian'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan Data</h5>
							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">Yakin ingin menghapus data mata pelajaran (<?= $item['nama_ujian'] ?>)</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
							<a type="button" class="btn btn-danger" href="<?= base_url('data-ujian/delete/' . $item['id_ujian']) ?>">Hapus</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach ?>

		<script>
			function filterData() {
				var startDate = document.getElementById("start_date").value;
				var endDate = document.getElementById("end_date").value;

				var startDateMillis = new Date(startDate).getTime();
				var endDateMillis = new Date(endDate).getTime();

				var tableRows = document.querySelectorAll("#dataTable tbody tr");

				tableRows.forEach(function(row) {
					var rowData = row.cells[3].innerText; 

					var rowDateMillis = new Date(rowData).getTime();

					if (rowDateMillis >= startDateMillis && rowDateMillis <= endDateMillis) {
						row.style.display = ""; 
					} else {
						row.style.display = "none"; 
					}
				});
			}

			function resetFilter() {
				document.getElementById("start_date").value = "";
				document.getElementById("end_date").value = "";

				var tableRows = document.querySelectorAll("#dataTable tbody tr");

				tableRows.forEach(function(row) {
					row.style.display = "";
				});
			}
		</script>

		<?= $this->endSection() ?>