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
							<h1>Gallery Bakau Lestari</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= site_url('Admin/home')?>">Home</a></li>
								<li class="breadcrumb-item active">Gallery Bakau Lestari</li>
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
							<div class="card card-danger">
								<div class="card-header">
									<h4 class="card-title">Gallery Bakau Lestari</h4>
								</div>
								<div class="card-body">
									<div>
										<div class="btn w-100 mb-5 justify-content-center">
											<a class="btn btn-secondary <?php if(isset($kategori) && $kategori == 'all'){ echo 'active' ;} ?>"
												href="javascript:void(0)" data-filter="all"
												onclick="filter_kategori('all')"> All </a>
											<a class="btn btn-secondary <?php if(isset($kategori) && $kategori == 'Bakau Lestari'){ echo 'active' ;} ?>"
												href="javascript:void(0)" data-filter="Bakau Lestari"
												onclick="filter_kategori('Bakau Lestari')"> Bakau Lestari </a>
											<a class="btn btn-secondary <?php if(isset($kategori) && $kategori == 'Satwa'){ echo 'active' ;} ?>"
												href="javascript:void(0)" data-filter="Satwa"
												onclick="filter_kategori('Satwa')"> Satwa </a>
										</div>
									</div>
									<div class="filter-container p-0 row">
										<?php if (!empty($aaa['gallery'])) foreach ($aaa['gallery'] as $gol) : ?>
										<div class="filtr-item col-sm-2 pb-3"
											data-category="<?= $gol->gallery_status ?>" data-sort="black sample">
											<a href="<?= base_url('upload/Gallery/') . $gol->gallery_gambar ?>"
												data-toggle="lightbox" data-title="<?= $gol->gallery_nama ?>"
												data-footer="<?= $gol->gallery_deskripsi?>">
												<img src="<?= base_url('upload/Gallery/') . $gol->gallery_gambar ?>"
													class="img-fluid" alt="<?= $gol->gallery_nama ?>" />
											</a>
										</div>
										<?php endforeach; else{
										echo " <p align = 'center' style='color:#6555559e;'>Tidak Ada Data Tersedia </p>";
									}?>
									</div>
									<div class="row mt-5">
										<div class="col text-center">
											<div class="block-27">
												<div style="margin-left:auto; margin-right:auto">
													<?php 
														echo $aaa['pagination'];
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>
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
	<!-- Ekko Lightbox -->
	<script src="<?= base_url('assets/admin/')?>/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
	<!-- Filterizr-->
	<script src="<?= base_url('assets/admin/')?>/plugins/filterizr/jquery.filterizr.min.js"></script>
	<!-- Page specific script -->
	<script>
		$(function () {
			$(document).on('click', '[data-toggle="lightbox"]', function (event) {
				event.preventDefault();
				$(this).ekkoLightbox({
					alwaysShowClose: true
				});
			});

			$('.filter-container').filterizr({
				gutterPixels: 3
			});
			$('.btn[data-filter]').on('click', function () {
				$('.btn[data-filter]').removeClass('active');
				$(this).addClass('active');
			});
		})

		function filter_kategori(keyword) {
			var url = "<?= site_url('Admin/galleryWidget/0?kategori=')?>" + keyword;
			window.location.href = url;
		}

	</script>
</body>

</html>
