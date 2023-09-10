<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/partials/head')?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed ">
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<?php $this->load->view('admin/partials/navbar')?>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<?php $this->load->view('admin/partials/aside')?>
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>AGENDA</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= site_url('Admin/home')?>">Home</a></li>
								<li class="breadcrumb-item active">Agenda</li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Tabel Agenda</h3>
									<div class="card-tools">
										<ul class="nav nav-pills ml-auto">
											<li class="nav-item">
											</li>
										</ul>
									</div>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Tanggal</th>
												<th>Nama</th>
												<th>Gambar</th>
												<th>Deskripsi</th>
												<th>Status</th>
												<th style="width:16%">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1;
                      						foreach($agenda as $agen) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= date('D, d-M-Y', strtotime($agen->agenda_tanggal)) ?></td>
												<td><?= $agen->agenda_nama ?></td>
												<td><img src="<?= base_url('upload/Agenda/') . $agen->agenda_gambar ?>" style="width:100px"></td>
												<td><?= $agen->agenda_deskripsi ?></td>
												<td><?= $agen->agenda_status ?></td>
												<td>
													<button type="button" class="btn btn-success btn-sm"
														data-toggle="modal" data-target="#edit<?= $agen->agenda_id ?>">
														<i class="far fa-edit"></i> Edit
													</button>
													<button type="button" class="btn btn-danger btn-sm"
														data-toggle="modal" data-target="#hapus<?= $agen->agenda_id ?>">
														<i class="far fa-trash-alt"></i> Hapus
													</button>
												</td>
											</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>
		<!-- modal tambah agenda -->
		<div class="modal fade" id="addagenda">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Tambah Agenda</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="<?= site_url('Agenda/tambah')?>" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="card-body">
								<div class="form-group">
									<label>Tanggal</label>
									<input type="date" class="form-control" name="tanggal" required>
								</div>
								<div class="form-group">
									<label>Judul</label>
									<input type="text" class="form-control" name="judul" placeholder="Judul Kegiatan" required>
								</div>
								<div class="form-group">
									<div class="form-group">
										<label>Gambar</label>
										<div class="input-group">
											<div class="custom-file">
												<input type="file" class="custom-file-input" name="gambar" required>
												<label class="custom-file-label">Choose
													file</label>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Deskripsi</label>
									<textarea rows="3" class="form-control" name="deskripsi"
										placeholder="Deskripsi" required></textarea>
								</div>
								<div class="form-group">
									<label>Status</label>
									<select class="form-control select2" style="width: 100%;" name="status" required>
										<option selected="selected" value="sudah terlaksana">Sudah Terlaksana
										</option>
										<option value="terjadwal">Terjadwal</option>
									</select>
								</div>
							</div>
							<div class="modal-footer justify-content-between">
								<button type="button" class="btn btn-default" data-dismiss="modal">batal</button>
								<button type="submit" class="btn btn-primary">submit</button>
							</div>
						</div>
						</form>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- modal edit agenda -->
		<?php $no = 0;
        foreach ($agenda as $asd) : $no++; ?>
		<div class="modal fade" id="edit<?= $asd->agenda_id ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Edit Agenda</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="<?= site_url('Agenda/edit')?>" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?= $asd->agenda_id ?>">
						<div class="modal-body">
							<div class="card-body">
								<div class="form-group">
									<label>Tanggal</label>
									<input type="date" class="form-control" name="tanggal"
										value="<?= $asd->agenda_tanggal?>" readonly>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Judul</label>
									<input type="text" class="form-control" name="judul" placeholder="Judul Kegiatan"
										value="<?= $asd->agenda_nama?>">
								</div>
								<div class="form-group">
									<div class="form-group">
										<label>Gambar</label>
										<div class="input-group">
											<div class="custom-file">
												<input type="file" class="custom-file-input" name="gambar">
												<label class="custom-file-label"><?= $asd->agenda_gambar?></label>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Deskripsi</label>
									<textarea rows="3" class="form-control" name="deskripsi"
										value="<?= $asd->agenda_deskripsi?>"
										placeholder="Deskripsi"><?= $asd->agenda_deskripsi?></textarea>
								</div>
								<div class="form-group">
									<label>Status</label>
									<select class="form-control select2" style="width: 100%;" name="status"
										value="<?= $asd->agenda_status?>">
										<option value="sudah terlaksana" <?php if($asd->agenda_status == 'sudah terlaksana')
										{
											echo 'selected="selected"';
										}?>>Sudah Terlaksana
										</option>
										<option value="terjadwal" <?php if($asd->agenda_status == 'terjadwal')
										{
											echo 'selected="selected"';
										}?>>Terjadwal</option>
									</select>
								</div>
							</div>
							<div class="modal-footer justify-content-between">
								<button type="button" class="btn btn-default" data-dismiss="modal">batal</button>
								<button type="submit" class="btn btn-primary">submit</button>
							</div>
						</div>
					</form>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<?php endforeach ?>

		<!-- Modal Hapus-->
		<?php $no = 0;
        		foreach ($agenda as $routine) : $no++; ?>
		<div class="modal fade" id="hapus<?= $routine->agenda_id ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Hapus Agenda</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Apakah Anda Yakin Ingin Menghapus Agenda <?= $routine->agenda_nama?> ?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-gradient" data-dismiss="modal">Close</button>
						<a href="<?= site_url('Agenda/hapus/' . $routine->agenda_id) ?>"><button type="button"
								class="btn btn-danger">Hapus</button></a>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
		<?php $this->load->view('admin/partials/logout')?>
		<!-- /.content-wrapper -->
		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				<b>Version</b> 3.2.0
			</div>
			<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
			reserved.
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->
	<?php $this->load->view('admin/partials/script')?>
	<!-- bs-custom-file-input -->
	<script src="<?= base_url('assets/admin/') ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
	<!-- Page specific script -->
	<script>
		$(function () {
			$("#example1").DataTable({
				"responsive": true,
				"lengthChange": false,
				"autoWidth": false,
				"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
			}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
				"responsive": true,
			});
		});

	</script>
	<script>
		$(function () {
			bsCustomFileInput.init();
		});

	</script>
</body>

</html>
