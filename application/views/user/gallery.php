<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('user/partials/head')?>
</head>

<body class="goto-here">
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<?php $this->load->view('user/partials/navbar')?>
	</nav>
	<!-- END nav -->
	<div class="container">
		<div class="row">
			<div class="hero-wrap hero-bread"
				style="background-image: url('<?= base_url('assets/user/img/bg__3.jpg')?>">
				<div class="container">
					<div class="row no-gutters slider-text align-items-center justify-content-center">
						<div class="col-md-9 ftco-animate text-center">
							<h1 class="mb-0 bread">Gallery</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Main content -->
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center" style="padding-bottom:5em">
				<div class="col-md-10 mb-5 text-center">
					<ul class="product-category mb-5">
						<li><a class="btn <?php if(isset($kategori) && $kategori == 'all'){ echo 'active' ;} ?>" href="javascript:void(0)" data-filter="all" onclick="filter_kategori('all')"> All </a></li>
						<li><a class="btn <?php if(isset($kategori) && $kategori == 'Bakau Lestari'){ echo 'active' ;} ?>" href="javascript:void(0)" data-filter="Bakau Lestari" onclick="filter_kategori('Bakau Lestari')"> Bakau Lestari </a></li>
						<li><a class="btn <?php if(isset($kategori) && $kategori == 'Satwa'){ echo 'active' ;} ?>" href="javascript:void(0)" data-filter="Satwa" onclick="filter_kategori('Satwa')"> Satwa </a></li>
					</ul>
					<div>
						<div class="filter-container mb-8">
							<?php if (!empty($aaa['gallery'])) foreach ($aaa['gallery'] as $gol) : ?>
								<div class="filtr-item col-md-4" data-category="<?= $gol->gallery_status ?>" data-sort="white sample">
									<div class="product">
										<a href="<?= base_url('upload/Gallery/') . $gol->gallery_gambar ?>" data-toggle="lightbox"
										data-title="<?= $gol->gallery_nama ?>" data-footer="<?= $gol->gallery_deskripsi ?>" data-max-width="600">
											<img class="img-fluid" src="<?= base_url('upload/Gallery/' . $gol->gallery_gambar)?>" alt="<?= base_url('upload/Gallery/' . $gol->gallery_nama)?>">
											<div class="overlay"></div>
										</a>
										<div class="text py-3 pb-4 px-3 text-center">
											<h3><a href="#"><?= $gol->gallery_nama?></a></h3>
											<div class="d-flex">
												<div>
													<p class="price" align="justify"><span> <?= substr($gol->gallery_deskripsi, 0, 20) . "..." ?></span></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach ?>
						</div>
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
		</div>
							</section>
	

	<?php $this->load->view('user/partials/footer') ?>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#F96D00" /></svg></div>
	<?php $this->load->view('user/partials/script')?>
	<!-- Filterizr-->
	<script src="<?= base_url('assets/user/') ?>plugins/filterizr/jquery.filterizr.min.js"></script>

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

		function filter_kategori(keyword){
			var url = "<?= site_url('User/gallery/0?kategori=')?>" + keyword;
			window.location.href = url;
		}

	</script>
</body>

</html>
