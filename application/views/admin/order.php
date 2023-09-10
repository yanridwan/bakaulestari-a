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
							<h1>Order Customer</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= site_url('Admin/home')?>">Home</a></li>
								<li class="breadcrumb-item active">Order Customer</li>
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
									<h3 class="card-title">Tabel Order Customer</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No</th>
                                                <th>Tanggal</th>
												<th>Subject</th>
												<th>Nama</th>
												<th>Email</th>
												<th>No. Hp</th>
                                                <th>Pesan</th>
												<th style="width:10%">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1;
                      						foreach($order as $ord) : ?>
											<tr>
												<td><?= $no++ ?></td>
                                                <td><?= date('D, d-M-Y, H:i:s', strtotime($ord->tanggal_masuk)) ?></td>
												<td><?= $ord->customer_subject ?></td>
												<td><?= $ord->customer_nama ?></td>
												<td><?= $ord->customer_email ?></td>
												<td><?= $ord->customer_phone ?></td>
												<td><?= $ord->customer_order ?></td>
												<td>
													<button type="button" class="btn btn-info btn-sm"
														data-toggle="modal" data-target="#baca<?= $ord->customer_id ?>">

														<i class = <?php if( $ord->customer_status == 'baru')
														{
															echo '"far fa-envelope"';
														} else{
															echo '"fa fa-envelope-open"';
														}?>>
														</i>
													</button>
													<button type="button" class="btn btn-danger btn-sm"
														data-toggle="modal"
														data-target="#hapus<?= $ord->customer_id ?>">
														<i class="far fa-trash-alt"></i>
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
		<!-- modal baca agenda -->
		<?php $no = 0;
        foreach ($order as $psn) : $no++; ?>
		<div class="modal fade" id="baca<?= $psn->customer_id ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Pesan Masuk</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="<?= site_url('Order/terbuka')?>" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?= $psn->customer_id ?>">
						<div class="modal-body">
							<div class="card-body">
                            <div class="form-group">
									<label for="tanggal">Tanggal Masuk</label>
									<input type="text" class="form-control" name="tanggal" placeholder="tanggal"
										value="<?= $psn->tanggal_masuk?>" readonly>
								</div>
                                <div class="form-group">
									<label for="nama">Nama Customer</label>
									<input type="text" class="form-control" name="nama" placeholder="nama"
										value="<?= $psn->customer_nama?>" readonly>
								</div>
                                <div class="form-group">
									<label for="nama">No. Hp Customer</label>
									<input type="text" class="form-control" name="phone" placeholder="phone"
										value="<?= $psn->customer_phone?>" readonly>
								</div>
								<div class="form-group">
									<label for="subject">Subject</label>
									<input type="text" class="form-control" name="judul" placeholder="Judul Kegiatan"
										value="<?= $psn->customer_subject?>" readonly>
								</div>
								<div class="form-group">
									<label for="pesan">Pesan</label>
									<textarea rows="3" class="form-control" name="pesan"
										value="<?= $psn->customer_order?>"
										placeholder="subject" readonly><?= $psn->customer_order?></textarea>
								</div>
							</div>
							<div class="modal-footer justify-content-between">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
								<button type="submit" class="btn btn-primary">Oke</button>
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
            foreach ($order as $cust) : $no++; ?>
	<div class="modal fade" id="hapus<?= $cust->customer_id ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Hapus Agenda</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Apakah Anda Yakin Ingin Menghapus Pesan dari <?= $cust->customer_nama?> ?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-gradient" data-dismiss="modal">Close</button>
					<a href="<?= site_url('Order/hapus/' . $cust->customer_id) ?>"><button type="button"
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
