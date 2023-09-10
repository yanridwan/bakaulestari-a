<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('user/partials/head') ?>
</head>

<body class="goto-here">
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<?php $this->load->view('user/partials/navbar')?>
	</nav>
	<!-- END nav -->

	<div class="container">
		<div class="row">
			<div class="hero-wrap hero-bread"
				style="background-image: url('<?= base_url('assets/user/img/bg_5.jpg')?>">
				<div class="container">
					<div class="row no-gutters slider-text align-items-center justify-content-center">
						<div class="col-md-9 ftco-animate text-center">
							<h1 class="mb-0 bread">Agenda</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section ftco-degree-bg" style="margin-top:-3em">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 ftco-animate">
					<div class="row">
						<?php
						if( ! empty($model['agenda'])){
							foreach($model['agenda'] as $data){ ?>
						<div class="col-md-12 d-flex ftco-animate" style="margin-bottom:-4em">
							<div class="blog-entry align-self-stretch d-md-flex">
								<a href="blog-single.html" class="block-20"
									style="background-image: url('<?= base_url('upload/Agenda/' . $data->agenda_gambar)?>');">
								</a>
								<div class="text d-block pl-md-4">
									<div class="meta mb-3">
										<div><a href="#"><span
												class="icon-calendar"></span> <?= date('D, d-M-Y', strtotime($data->agenda_tanggal)) ?></a>
										</div>
									</div>
									<h3 class="heading"><a href="#"><?= $data->agenda_nama ?></a></h3>
									<p><?= substr($data->agenda_deskripsi, 0, 150) . "..." ?></p>
									<p><a href="<?= site_url('User/detailAgenda/' . $data->agenda_id)?>"
											class="btn btn-success py-2 px-3">Read more</a></p>
								</div>
							</div>
						</div>
						<?php }
						}else{ // Jika data tidak ada
							echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
						}
						?>
					</div>
				</div> <!-- .col-md-8 -->
				<div class="col-lg-4 sidebar ftco-animate">
					<div class="sidebar-box">
						<!-- <form action="#" class="search-form"> -->
						<form action="<?php echo site_url('user/search') ?>" method="get" class="search-form">
							<div class="form-group">
								<span class="icon ion-ios-search"></span>
								<input type="text" name="search" class="form-control" placeholder="Search...">
							</div>
						</form>
					</div>

					<div class="sidebar-box ftco-animate">
						<h3 class="heading" style="margin-top:-3em">Agenda Terjadwal</h3>
						<?php $no = 1;
                        foreach ($aaa as $abc) : ?>

						<div class="block-21 mb-4 d-flex">
							<a href="<?= site_url('User/detailAgenda/' . $abc->agenda_id)?>" class="blog-img mr-4"
								style="background-image: url(<?= base_url('upload/Agenda/' . $abc->agenda_gambar)?>);"></a>
							<div class="text">
								<h3 class="heading-1"><a
										href="<?= site_url('User/detailAgenda/' . $abc->agenda_id)?>"><?= $abc->agenda_nama ?></a>
								</h3>
								<div class="meta">
									<div><a href="#"><span
												class="icon-calendar"></span> <?= date('D, d-M-Y', strtotime($abc->agenda_tanggal)) ?></a>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach ?>
					</div>

					<div class="sidebar-box ftco-animate" style="margin-top:-5em">
						<h3 class="heading">Recent Gallery</h3>
						<?php $no = 1;
                        foreach ($gallery as $recent) : ?>

						<div class="block-21 mb-4 d-flex">
							<a href="<?= site_url('User/gallery')?>" class="blog-img mr-4"
								style="background-image: url(<?= base_url('upload/Gallery/' . $recent->gallery_gambar)?>);"></a>
							<div class="text" style="margin-top:2em">
								<h3 class="heading-1"><a
										href="<?= site_url('User/gallery')?>"><?= $recent->gallery_nama ?></a>
								</h3>
							</div>
						</div>
						<?php endforeach ?>
					</div>
				</div>
				<div class="row mt-5">
							<div class="col text-center" style="margin-left:34em">
								<div class="block-27">
									<?php
	                                // Tampilkan link-link paginationnya
	                                echo $model['aswd'];
	                                ?>
								</div>
							</div>
						</div>
			</div>
		</div>
	</section> <!-- .section -->

	<?php $this->load->view('user/partials/footer') ?>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#F96D00" /></svg></div>


	<?php $this->load->view('user/partials/script') ?>

</body>

</html>
