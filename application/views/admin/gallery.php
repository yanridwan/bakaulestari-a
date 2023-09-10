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
							<h1>GALLERY</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= site_url('Admin/home')?>">Home</a></li>
								<li class="breadcrumb-item active">Gallery</li>
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
									<h3 class="card-title">Tabel Gallery</h3>
									<div class="card-tools">
										<ul class="nav nav-pills ml-auto">
											<li class="nav-item">
												<button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
													data-target="#addgallery">
													<i class="fas fa-folder-plus"></i> Tambah Gallery
												</button>
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
												<th>Nama</th>
												<th>Gambar</th>
												<th>Deskripsi</th>
												<th>Status</th>
												<th style="width:16%">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1;
                        					foreach($gallery as $file) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $file->gallery_nama ?></td>
												<td><img src="<?= base_url('upload/Gallery/') . $file->gallery_gambar ?>" style="width:100px"></td>
												<td><?= $file->gallery_deskripsi ?></td>
												<td><?= $file->gallery_status ?></td>
												<td>
													<button type="button" class="btn btn-success btn-sm" data-toggle="modal"
														data-target="#edit<?= $file->gallery_id ?>">
														<i class="far fa-edit"></i> Edit
													</button>
													<button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
														data-target="#hapus<?= $file->gallery_id ?>">
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
				<!-- modal tambah gallery -->
				<div class="modal fade" id="addgallery">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Tambah Gallery</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form method="POST" action="<?= site_url('Gallery/tambah')?>" enctype="multipart/form-data">
								<div class="modal-body">
									<div class="card-body">
										<div class="form-group">
											<label>Judul</label>
											<input type="text" class="form-control" name="judul" placeholder="Judul Gallery" required>
										</div>
										<div class="form-group">
											<div class="form-group">
												<label for="exampleInputFile">Gambar</label>
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
											<textarea rows="3" class="form-control" name="deskripsi" placeholder="Deskripsi" required></textarea>
										</div>
										<div class="form-group">
											<label>Status</label>
											<select class="form-control select2" style="width: 100%;" name="status" required>
												<option value="Bakau Lestari"selected="selected">Bakau Lestari</option>
												<option value="Satwa">Satwa</option>
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

				<!-- modal edit gallery -->
				<?php $no = 0;
        foreach ($gallery as $gall) : $no++; ?>
				<div class="modal fade" id="edit<?= $gall->gallery_id?>">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Edit Gallery</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form method="POST" action="<?= site_url('Gallery/edit')?>" enctype="multipart/form-data">
								<input type="hidden" name="id" value="<?= $gall->gallery_id ?>">
								<div class="modal-body">
									<div class="card-body">
										<div class="form-group">
											<label>Judul</label>
											<input type="text" class="form-control" name="judul" value="<?= $gall->gallery_nama?>"
												placeholder="Judul Gallery">
										</div>
										<div class="form-group">
											<div class="form-group">
												<label for="exampleInputFile">Gambar</label>
												<div class="input-group">
													<div class="custom-file">
														<input type="file" class="custom-file-input" name="gambar">
														<label class="custom-file-label"
															value="<?= $gall->gallery_gambar?>"><?= $gall->gallery_gambar?></label>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Deskripsi</label>
											<textarea rows="3" class="form-control" name="deskripsi"
												value="<?= $gall->gallery_deskripsi?>"
												placeholder="Deskripsi"><?= $gall->gallery_deskripsi?></textarea>
										</div>
										<div class="form-group">
									    <label>Status</label>
									      <select class="form-control select2" style="width: 100%;" name="status"
										      value="<?= $gall->gallery_status?>">
										        <option value="Bakau Lestari" <?php if($gall->gallery_status == 'Bakau Lestari')
										          {
											          echo 'selected="selected"';
										          }?>>Bakau Lestari
										        </option>
										        <option value="Satwa" <?php if($gall->gallery_status == 'Satwa')
										          {
											          echo 'selected="selected"';
										          }?>>Satwa</option>
									</select>
								</div>
									</div>
									<div class="modal-footer justify-content-between">
										<button type="button" class="btn btn-default" data-dismiss="modal">batal</button>
										<button type="submit" class="btn btn-primary">submit</button>
									</div>
							</form>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>
		<?php endforeach ?>

    <!-- Modal Hapus -->
		<?php $no = 0;
        		foreach ($gallery as $file) : $no++; ?>
		<div class="modal fade" id="hapus<?= $file->gallery_id ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Hapus Gallery</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Apakah Anda Yakin Ingin Menghapus Gallery <?= $file->gallery_nama?> ?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-gradient" data-dismiss="modal">Close</button>
						<a href="<?= site_url('Gallery/hapus/' . $file->gallery_id) ?>"><button type="button"
								class="btn btn-danger">Hapus</button></a>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
		<!-- /.content-wrapper -->
		<?php $this->load->view('admin/partials/logout')?>
		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				<b>Version</b> 3.2.0
			</div>
			<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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
