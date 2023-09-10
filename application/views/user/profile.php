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

	<div class="container bg-light" style="background-image: url(<?= base_url('assets/user/') ?>img/profile_1.jpg);">
		<div class="row">
			<div class="hero-wrap hero-bread"
				style="background-image: url(<?= base_url('assets/user/') ?>img/profile_1.jpg);">
				<div class="container">
					<div class="row no-gutters slider-text align-items-center justify-content-center">
						<div class="col-md-9 ftco-animate text-center">
							<h1 class="mb-0 bread">About us</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section class="ftco-section">
		<div class="container">
			<div class="row">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Profile</span>
            <h2 class="mb-4">Sejarah KTH Bakau Lestari</h2>
          </div>
        </div>   
				<p align="justify"> Pangkal Babu merupakan suatu kawasan pantai yang terletak di pinggir laut
					diantara muara sungai Betara dengan muara sungai Pangkal Babu.
					Kawasan ini merupakan areal mangrove yang harus dijaga kelestariannya dikarenakan sebagai
					daerah penyangga (buffer zone) bagi areal tambak, perkebunan kelapa dalam,
					dan pemukiman masyarakat. Secara administratif kawasan Pangkal Babu meliputi RT. 13, RT. 14,
					dan RT. 15 Dusun Bahagia Desa Tungkal I Kecamatan Tungkal Ilir Kabupaten Tanjung Jabung Barat.
					Kawasan Mangrove Pangkal Babu memiliki keaneka ragaman jenis yang cukup banyak yaitu sekitar
					20 (dua puluh) jenis tanaman mangrove, hal ini merupakan areal yang sangat berpotensi untuk
					sebagai tempat penelitian.
				</p>
				<p align="justify">
					Kelompok Tani Hutan (KTH) Bakau Lestari pada awalnya adalah hanya sekelompok masyarakat
					yang peduli terhadap keberadaan hutan mangrove karena mereka sadar dan dapat melihat langsung
					manfaat dari pada hutan Mangrove sebagai pelindung baik dari abrasi karena gelombang laut,
					penghambat angin/badai dan yang terpenting adalah sebagai penghambat laju air laut masuk ke areal
					perkebunan kelapa dalam. Pada awalnya anggota KTH Bakau Lestari adalah masyarakat pekebun kelapa
					dan nelayan sedangkan masyarakat petambak kurang mendukung keberadaan mangrove karena masih
					menganggap bahwa keberadaan mangrove menghambat sirkulasi air laut.
				</p>
				<p align="justify">
					KTH Bakau Lestari dibentuk melalui Akta Notaris Achamad Zaki Yandri, SH Nomor 73
					Tanggal 22 Juli 2011 dan KTH Bakau Lestari dikukuhkan melalui Surat Keputusan Kepala Desa Tungkal I
					Nomor 37 Tahun 2020 Tentang Kelompok Tani Hutan (KTH) Bakau Lestari Desa Tungkal I Kecamatan Tungkal
					Ilir Kabupaten Tanjung Jabng Barat Provinsi Jambi. KTH Bakau Lestari bertujuan menjadi pelopor
					kelestarian lingkungan, pemberdayaan masyarakat, dan turut serta dalam mensukseskan program
					pemerintah, sedangkan jenis usaha KTH Bakau Lestari adalah pengelolaan dan penjagaan hutan mangrove
					dengan luas izin 360 Ha. Sejak tahun 2002 KTH Bakau Lestari ikut serta dalam pekerjaan penanaman
					mangrove, dari mulai kegiatan rehabilitasi hutan mangrove dari Dinas Kehutanan dan Perkebunan
					Kabupaten Tanjung Jabung Barat dan kegiatan penanaman dari Balai Pengelolaan Daerah Aliran Sungai
					dan Hutan Lindung Batanghari, dan akan tetap membantu pemerintah konsen dalam pelestarian hutan.
				</p>

				<div class="container">
						<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<h2 class="mb-4">Visi</h2>
				</div>
				</div>   
				<p style="text-align::center">
					Menuju terciptanya masyarakat yang mandiri, kreatif, cerdas dan sejahtera
				</p>

				<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<h2 class="mb-4">Misi</h2>
				</div>
				</div>   
				<p align="justify">
					1. Meningkatkan taraf kehidupan masyarakat<br>
					2. Terciptanya rasa solidaritas dan kekeluargakan antar sesama<br>
					3. Menjadi peloporkelestarian lingkungan<br>
					4. Menumbuh kembangkan semangat gotong royong dan jiwa kewirausahaan<br>
				</p>
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
</body>

</html>
