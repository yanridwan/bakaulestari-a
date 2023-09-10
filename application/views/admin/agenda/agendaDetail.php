<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminLTE 3 | Detail Agenda</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('assets/admin/')?>plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets/admin/')?>dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
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
							<h1>Detail Agenda</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Detail Agenda</li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>

			<!-- Main content -->
			<section class="content">

				<!-- Default box -->
				<div class="card card-solid">
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-sm-6">
								<h3 class="d-inline-block d-sm-none"><?= $agenda->agenda_nama ?></h3>
								<div class="col-12">
									<img src="<?= base_url('upload/Agenda/') . $agenda->agenda_gambar ?>"
										class="product-image" alt="Product Image">
								</div>
								<div class="col-12 product-image-thumbs">
									<div class="product-image-thumb active"><img
											src="<?= base_url('upload/Agenda/') . $agenda->agenda_gambar?>"
											alt="Product Image"></div>
									<?php $no = 1;
                                    if (!empty($agendaDetail->agenda_id)){
                                    foreach($agendaDetail as $aD) : ?>
									<div class="product-image-thumb"><img
											src="<?= base_url('upload/Agenda/') . $aD->agenda_gallery_file?>"
											alt="Product Image"></div>
									<?php endforeach; } ?>
								</div>
							</div>
							<div class="col-12 col-sm-6">
								<h3 class="my-3"><?= $agenda->agenda_nama ?></h3>
								<p><?= $agenda->agenda_deskripsi ?></p>

								<hr>
								<h4>Status</h4>
								<p><?= $agenda->agenda_status ?></p>

								<hr>
								<h4>Tanggal</h4>
								<p><?= date('D, d-M-Y', strtotime($agenda->agenda_tanggal)) ?></p>

							</div>
						</div>
						<div class="row mt-5">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Gallery Agenda</h3>
										<div class="card-tools">
											<ul class="nav nav-pills ml-auto">
												<li class="nav-item">
													<button type="button" class="btn btn-primary btn-sm"
														data-toggle="modal"
														data-target="#tambahGalleryAgenda<?= $agenda->agenda_id ?>">
														<i class="far fa-calendar-plus"></i> Tambah Agenda
													</button>
												</li>
											</ul>
										</div>
									</div>
									<!-- /.card-header -->
									<div class="card-body table-responsive p-0" style="height: 300px;">
										<table class="table table-head-fixed text-nowrap">
											<thead>
												<tr>
													<th style="width:5%">No</th>
													<th>Gambar</th>
													<th>Tanggal</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php $no = 1;
                                            if (!empty($agendaDetail->agenda_id)) {
                      						foreach($agendaDetail as $aD) : ?>
												<tr>
													<td><?= $no++ ?></td>
													<?php if (substr($aD->agenda_gallery_file, -3) == 'mp4') { ?>
													<td>
  <video controls>
    <source src="<?= base_url('upload/Agenda/') . $aD->agenda_gallery_file ?>" type="video/webm" />
    Browsermu tidak mendukung tag ini, upgrade donk!
  </video>
													</td>
													<?php } else { ?>
													<td><img src="<?= base_url('upload/Agenda/') . $aD->agenda_gallery_file ?>"
															style="width:100px"><?= $aD->agenda_gallery_file ?></td>
                                                            <?php } ?>
													<td><?= date('D, d-M-Y', strtotime($aD->agenda_gallery_tanggal)) ?>
													</td>
													<td>
														<button type="button" class="btn btn-success btn-sm"
															data-toggle="modal"
															data-target="#edit<?= $aD->agenda_gallery_id ?>">
															<i class="far fa-edit"></i> Edit
														</button>
														<button type="button" class="btn btn-danger btn-sm"
															data-toggle="modal"
															data-target="#hapus<?= $aD->agenda_gallery_id ?>">
															<i class="far fa-trash-alt"></i> Hapus
														</button>
													</td>
												</tr>
												<?php endforeach; } else { ?>
												<tr>
													<th colspan="4" style="text-align:center">Tidak Ada Data</th>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
									<!-- /.card-body -->
								</div>
								<!-- /.card -->
							</div>
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->

			</section>
			<!-- /.content -->
		</div>
		<!-- modal tambah agenda -->
		<div class="modal fade" id="tambahGalleryAgenda<?= $agenda->agenda_id ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Tambah Agenda</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="<?= site_url('Agenda/tambahAgendaGallery')?>"
						enctype="multipart/form-data">
						<div class="modal-body">
							<div class="card-body">
								<input type="hidden" name="id" value="<?= $agenda->agenda_id ?>">
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
		<!-- /.content-wrapper -->
		<!-- modal edit agenda -->
		<?php $no = 0;
        if(!empty($agendaDetail->agenda_id)){
        foreach ($agendaDetail as $asd) : $no++; ?>
		<div class="modal fade" id="edit<?= $asd->agenda_gallery_id ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Edit Agenda</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="<?= site_url('Agenda/editGallery')?>" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?= $asd->agenda_gallery_id ?>">
						<div class="modal-body">
							<div class="card-body">
								<div class="form-group">
									<div class="form-group">
										<label>Gambar/Video</label>
										<div class="input-group">
											<div class="custom-file">
												<input type="file" class="custom-file-input" name="gambar">
												<label class="custom-file-label"><?= $asd->agenda_gambar?></label>
											</div>
										</div>
									</div>
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
		<?php } ?>
        <!-- Modal Hapus pesan -->
		<?php $no = 0;
         if(!empty($agendaDetail->agenda_id)){
            foreach ($agendaDetail as $asd) : $no++; ?>
		<div class="modal fade" id="hapus<?= $asd->agenda_gallery_id ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Hapus Agenda</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Apakah Anda Yakin Ingin Menghapus Agenda ini ?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-gradient" data-dismiss="modal">Close</button>
						<a href="<?= site_url('Agenda/hapusAgendaGallery/' . $asd->agenda_gallery_id) ?>"><button type="button"
								class="btn btn-danger">Hapus</button></a>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
        <?php } ?>
        <?php $this->load->view('admin/partials/logout')?>
		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				<b>Version</b> 3.1.0
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

	<!-- jQuery -->
	<script src="<?= base_url('assets/admin/')?>plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url('assets/admin/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url('assets/admin/')?>dist/js/adminlte.min.js"></script>
	<!-- bs-custom-file-input -->
	<script src="<?= base_url('assets/admin/') ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
	<script>
		$(document).ready(function () {
			$('.product-image-thumb').on('click', function () {
				var $image_element = $(this).find('img')
				$('.product-image').prop('src', $image_element.attr('src'))
				$('.product-image-thumb.active').removeClass('active')
				$(this).addClass('active')
			})
		})

	</script>
	<script>
		$(function () {
			bsCustomFileInput.init();
		});

	</script>
</body>

</html>
