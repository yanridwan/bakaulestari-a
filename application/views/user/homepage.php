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

	<section id="home-section" class="hero">
		<div class="container">
			<div class="row">
				<div class="home-slider owl-carousel">
					<div class="slider-item"
						style="background-image: url(<?= base_url('assets/user/img/bg__1.jpg')?>); width:100%;">
						<div class="overlay"></div>
						<div class="container">
							<div class="row slider-text justify-content-center align-items-center"
								data-scrollax-parent="true" style="background-color:#00000057">

								<div class="col-md-12 ftco-animate text-center">
									<h1 class="mb-2">Kegiatan Kebun Bibit Desa</h1>
									<h2 class="subheading mb-4">di Desa Tungka 1, Tungkal Ilir, Tanjung Jabung Barat,
										Jambi</h2>
								</div>
							</div>
						</div>
					</div>

					<?php $no = 0; 
					foreach ($news as $brt) : $no++ ?>
					<div class="slider-item"
						style="background-image: url(<?= base_url('upload/Agenda/' . $brt->agenda_gambar)?>); ">
						<div class="overlay"></div>
						<div class="container">
							<div class="row slider-text justify-content-center align-items-center"
								data-scrollax-parent="true" style="background-color:#00000057">
								<div class="col-md-8 ftco-animate text-center">
									<h1 class="mb-2"
										style="font-weight: bold; font-size: 58px; height: 88px;">
										<a style="color:white" href="<?= site_url('User/detailAgenda/' . $brt->agenda_id)?>"><?= $brt->agenda_nama ?></a></h1>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</section>
	<section class="ftco-section" style="padding:5em;">
		<div class="container">
			<div class="row">
				<p style="text-align:justify"> Kelompok Tani Hutan (KTH) Bakau Lestari terbentuk dikarenakan adanya
					sekelompok
					masyarakat yang peduli tentang lingkungan karena mereka sadar dan dapat menyaksikan
					langsung dan merasakan langsung dampak dari pada kerusakan lingkungan terutama adanya
					banjir akibat dari gelombang air laut yang langsung sampai ke perkebunan kelapa masyarakat
					dan mengakibatkan kerusakan. Masyarakat membentuk Kelompok Tani Hutan dengan nama KTH Bakau Lestari
					yang bergerak di bidang pengelolaan dan penjagaan kawasan mangrove.
					Anggota KTH Bakau Lestari sebagian besar berprofesi sebagai petani pekebun kelapa dalam
					dan nelayan pantai, dari awal mereka sadar tentang hal pentingnya kawasan mangrove
					sebagai daerah penyanggah (buffer zone), pelindung dari pada ombak laut, mencegah adanya
					abrasi pantai dan yang paling penting adalah sebagai tempat berkembang biaknya satwa liar
					serta penyimpan karbon 3-5 kali lebih besar di bandingkan dengan hutan tropis dataran rendah.
				</p>
			</div>
		</div>
	</section>

	<section class="ftco-section" style="padding:5em">
		<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<span class="subheading" style="margin-top:-4em">Our Service</span>
					<h2 class="mb-4">Layanan Kami</h2>
					<p>Kami Memberikan Layanan Unggulan dari Kami Untuk Anda</p>
				</div>
			</div>
			<div class="row no-gutters ftco-services">
				<div class="col-lg-3 text-center d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services mb-md-0 mb-4">
						<div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
							<span class="fas fa-seedling"></span>
						</div>
						<div class="media-body">
							<h3 class="heading">Penyediaan bibit mangrove dan tanaman hutan lainnya</h3>
						</div>
					</div>
				</div>
				<div class="col-lg-3 text-center d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services mb-md-0 mb-4">
						<div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
							<span class="fas fa-hand-holding-heart"></span>
						</div>
						<div class="media-body">
							<h3 class="heading">Penanaman dan pemeliharaan tanaman</h3>
						</div>
					</div>
				</div>
				<div class="col-lg-3 text-center d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services mb-md-0 mb-4">
						<div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
							<span class="fab fa-envira"></span>
						</div>
						<div class="media-body">
							<h3 class="heading">Jasa pelestarian lingkungan</h3>
						</div>
					</div>
				</div>
				<div class="col-lg-3 text-center d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services mb-md-0 mb-4">
						<div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
							<span class="fas fa-users"></span>
						</div>
						<div class="media-body">
							<h3 class="heading">Jasa pendampingan kegiatan di kawasan mangrove</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section" style="padding:3em">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section ftco-animate text-center">
					<span class="subheading">Our Activity</span>
					<h2 class="mb-4">Kegiatan Kami</h2>
					<p>Kegiatan Kami Dalam Menanam dan Membudidayakan Tanaman Bakau</p>
				</div>
			</div>
			<div class="row">
				<?php $no = 0;
				foreach ($asd as $gas) : $no++ ?>
				<div class="col-md-6 col-lg-3 ftco-animate">
					<div class="product">
						<a href="<?= site_url('User/detailAgenda/' . $gas->agenda_id)?>" class="img-prod">
						<img
								style="height:180px; display: block; margin-left: auto; margin-right: auto;" class="img-fluid"
								src="<?= base_url('upload/Agenda/' . $gas->agenda_gambar)?>"
								alt="<?= $gas->agenda_nama ?>">
							<div class="overlay"></div>
						</a>
						<div class="text py-3 pb-4 px-3 text-center">
							<span class="icon-calendar"> <?= date('D, d-M-Y', strtotime($gas->agenda_tanggal)) ?> </span>
							<h3 style="padding-bottom:8%"><a
									href="<?= site_url('User/detailAgenda/' . $gas->agenda_id)?>"
									style="font-weight: 600;"><?= $gas->agenda_nama ?></a></h3>
							<div class="d-flex">
								<a href="<?= site_url('User/detailAgenda/' . $gas->agenda_id)?>">	
								<p style="text-align:left"><?= substr($gas->agenda_deskripsi, 0, 100) . "..." ?></p></a>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach ?>
				<div style ="margin-left:69em">
					<a href="<?= site_url('User/agenda')?>"> See More ... </a>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section pb-10" style="margin-top:-4em">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section ftco-animate text-center">
					<span class="subheading">Our Schedule</span>
					<h2 class="mb-4">Jadwal Kami</h2>
					<p>Jadwal Kegiatan Kelompok Tani Hutan Bakau Lestari Mendatang </p>
				</div>
			</div>
			<div class="row">
				<?php $no = 0;
					foreach ($sch as $jdw) : $no++ ?>
				<div class="col-md-6 col-lg-3 ftco-animate">
					<div class="product">
						<a href="<?= site_url('User/detailAgenda/' . $jdw->agenda_id)?>" class="img-prod">
						<img
						style="height:180px; display: block; margin-left: auto; margin-right: auto;" class="img-fluid"
								src="<?= base_url('upload/Agenda/' . $jdw->agenda_gambar)?>" justify-content="center"
								alt="<?= $jdw->agenda_nama ?>">
							<div class="overlay"></div>
						</a>
						<div class="text py-3 pb-4 px-3 text-center">
							<span class="icon-calendar"> <?= date('D, d-M-Y', strtotime($jdw->agenda_tanggal)) ?> </span>
							<h3 style="padding-bottom:8%"><a href="<?= site_url('User/detailAgenda')?>"
									style="font-weight: 600;"><?= $jdw->agenda_nama ?></a></h3>
							<div class="d-flex">
								<a href="<?= site_url('User/detailAgenda/' . $jdw->agenda_id)?>">	
								<p style="text-align:left"><?= substr($jdw->agenda_deskripsi, 0, 100) . "..." ?></p></a>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach ?>
				<div style ="margin-left:69em">
					<a href="<?= site_url('User/agenda')?>"> See More ... </a>
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
	<script>
		$('.carousel').carousel({
			interval: 4000
		})

	</script>
</body>

</html>
