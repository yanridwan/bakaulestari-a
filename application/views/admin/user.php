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
							<h1>USER</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= site_url('Admin/home')?>">Home</a></li>
								<li class="breadcrumb-item active">User</li>
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
									<h3 class="card-title">Tabel user</h3>
									<div class="card-tools">
										<ul class="nav nav-pills ml-auto">
											<li class="nav-item">
												<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#adduser">
													<i class="fas fa-user-plus"></i> Tambah User
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
												<th>Username</th>
												<th>Email</th>
												<th style="width:16%">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1;
                      foreach($user as $data) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $data->username ?></td>
												<td><?= $data->email ?></td>
												<td>
													<button type="button" class="btn btn-success btn-sm" data-toggle="modal"
														data-target="#edit<?= $data->id ?>">
														<i class="far fa-edit"></i> Edit
													</button>
													<button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
														data-target="#hapus<?= $data->id ?>">
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
				<!-- Modal tambah user -->
				<div class="modal fade" id="adduser">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Tambah User</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form method="POST" action="<?= site_url('Akun/tambah')?>">
								<div class="modal-body">
									<div class="card-body">
										<div class="form-group">
											<label>Username</label>
											<input type="text" class="form-control" name="username" placeholder="Enter Username" required>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Email address</label>
											<input type="email" class="form-control" name="email" placeholder="Enter email" required>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Password</label>
											<input type="password" class="form-control" name="password" placeholder="Password" required>
										</div>
									</div>
								</div>
								<div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default btn-gradient" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">submit</button>
								</div>
							</form>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>

				<!-- Modal edit user -->
				<?php $no = 0;
        foreach ($user as $akun) : $no++; ?>
				<div class="modal fade" id="edit<?= $akun->id ?>">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Edit User</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form method="POST" action="<?= site_url('Akun/edit')?>">
								<input type="hidden" name="id" value="<?= $akun->id ?>">
								<div class="modal-body">
									<div class="card-body">
										<div class="form-group">
											<label>Username</label>
											<input type="text" class="form-control" name="username" value="<?= $akun->username?>"
												placeholder="Enter Username">
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Email address</label>
											<input type="email" class="form-control" name="email" value="<?= $akun->email?>"
												placeholder="Enter email">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Password</label>
											<input type="password" class="form-control" name="password" value="<?= $akun->password?>"
												placeholder="Password">
										</div>
										<div class="form-group">
											<label>Role</label>
											<input type="text" class="form-control" name="role" value ="<?= $akun->role?>" readonly>
										</div>
									</div>
								</div>
								<div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default btn-gradient" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">submit</button>
								</div>
							</form>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<?php endforeach; ?>

				<!-- Modal Hapus-->
				<?php $no = 0;
        foreach ($user as $akun) : $no++; ?>
				<div class="modal fade" id="hapus<?= $akun->id ?>">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Hapus User</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								Apakah Anda Yakin Ingin Menghapus User <?= $akun->username ?> ?
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default btn-gradient" data-dismiss="modal">Close</button>
								<a href="<?= site_url('Akun/hapus/' . $akun->id) ?>"><button type="button"
										class="btn btn-danger">Hapus</button></a>
							</div>
						</div>
					</div>
				</div>
        <?php endforeach; ?>
				<!-- /.container-fluid -->
				<?php $this->load->view('admin/partials/logout')?>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
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
</body>

</html>