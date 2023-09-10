<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('user/partials/head')?>
	<!-- SweetAlert2 -->
	<link rel="stylesheet"
		href="<?= base_url('assets/admin/')?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>

<body class="goto-here">
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<?php $this->load->view('user/partials/navbar')?>
	</nav>
	<!-- END nav -->

	<div class="container">
		<div class="row">
			<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/user/img/bg_4.jpg')?>">
				<div class="container">
					<div class="row no-gutters slider-text align-items-center justify-content-center">
						<div class="col-md-9 ftco-animate text-center">
							<h1 class="mb-0 bread">Contact us</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section contact-section">
		<div class="container">
			<div class="row d-flex mb-5 contact-info">
				<div class="w-100"></div>
				<div class="col-md-3 d-flex" >
					<div class="info p-4" style="border-radius:38px; background-color:#6B8C42; color:white">
						<p><span class="icon icon-map-marker"></span>&nbsp;<b>Address:</b>
						<br> Pangkal Babu Dusun
							Bahagia RT. 14 Desa Tungkal I Kecamatan Tunggal Ilir Kabupaten
							Tanjung Jabung Barat, Jambi</p>
					</div>
				</div>		
				<div class="col-md-3 d-flex" >
					<div class="info p-4" style="border-radius:38px; background-color:#6B8C42; color:white">
						<p><span class="icon icon-whatsapp"></span>&nbsp;<b>Phone:</b>
						<br><a style="color:white"
								href="https://wa.me/6282215478460?text=saya%20ingin%20tanya%20tentang%20KTH%20bakau%20Lestari">0822-1547-8460</a>
						</p>
					</div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="info p-4" style="border-radius:38px; background-color:#6B8C42; color:white">
						<p><span class="icon icon-envelope">&nbsp;</span><b>E-mail:</b>
						<br><a style="font-size:90%; color:white" href="mailto:hutanbakaulestari@gmail.com">hutanbakaulestari@gmail.com</a></p>
					</div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="info p-4" style="border-radius:38px; background-color:#6B8C42; color:white">
						<p><span class="icon icon-globe">&nbsp;</span><b>Website:</b>
						<br><a style="color:white" href="<?= site_url('User/home')?>">www.bakaulestari.com</a></p>
					</div>
				</div>
			</div>
			<div class="row block-9">
				<div class="col-md-6 order-md-last">
					<?php if(!empty($this->session->flashdata('sucess'))) {?>
					<div class="col-md-2 offset-5" style="padding-top:18%">
						<img src="<?= base_url('assets/user/img/checker.svg') ?>" style="width:100%">
					</div>
					<h3 style="text-align:center">Terimakasih</h3>
					<p style="text-align:center">Terimakasih Sudah Mengisi Form</p>
					<?php } else { ?>
					<div class="heading-section ftco-animate text-center">
						<h2 class="mb-4">Form Pemesanan</h2>
					</div>
					<form method="POST" class="bg-white pl-5 pr-5 pb-5 contact-form"
						action="<?= site_url('user/orderCustomer') ?>">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Your Name" name="nama" id="nama"
								required>
						</div>
						<div class="form-group">
							<input type="email" class="form-control" placeholder="email@gmail.com" name="email"
								id="email" required>
						</div>
						<div class="form-group">
							<input type="tel" pattern="[0-9]{4}[0-9]{4}[0-9]{3,4,5}" minlength="11" maxlength="13"
								class="form-control" placeholder="08xxxxxxxxxx" name="phone" name="phone" required>
						</div>
						<div class="form-group">
							<select class="form-control select2" style="width: 100%;" name="subject" id="subject"
								required>
								<option selected hidden>Subject</option>
								<option value="pertanyaan">Tanya produk atau jasa Bakau Lestari</option>
								<option value="pesan">Order produk atau jasa Bakau Lestari</option>
							</select>
						</div>
						<div class="form-group">
							<textarea cols="30" rows="7" class="form-control" placeholder="Message" name="pesan"
								id="pesan" required></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success py-3 px-5">Send Message</button>
						</div>
					</form>
					<?php } ?>

				</div>

				<div class="col-md-6 d-flex">
					<!-- <div id="map" class="bg-white"></div> -->
					<iframe
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.40338647838!2d103.53967041427254!3d-0.8263314355292642!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e289f7ea054b667%3A0x770a8f1f123ff037!2sWisata%20Mangrove%20Pangkal%20Babu!5e0!3m2!1sen!2sid!4v1673598510189!5m2!1sen!2sid"
						width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
						referrerpolicy="no-referrer-when-downgrade"></iframe>
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
	<script src="<?= base_url('assets//user/jquery-3.6.0.min.js') ?>"></script>
	<script src="<?= base_url('assets/user/jquery-3.6.0.js') ?>"></script>
	<!-- SweetAlert2 -->
	<script src="<?= base_url('assets/admin/')?>plugins/sweetalert2/sweetalert2.min.js"></script>
	<script src="<?= base_url('assets//user/jquery-3.6.0.min.js') ?>"></script>
	<script src="<?= base_url('assets/user/jquery-3.6.0.js') ?>"></script>
	<?php $this->load->view('user/partials/script')?>

<script>
	$(function () {
		var Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		}); 
		<?php if($this->session->flashdata('sucess')) { ?>
			$('.swalDefaultSuccess').ready(function () {
				Toast.fire({
					icon: 'success',
					title: 'terimakasih, pesan anda telah terkirim'
				})
			}); <?php } ?>
	});

</script>
<script type="text/javascript">
	$('#order').submit(function (e) {
		$.ajax({
			type: 'POST',
			data: $('#order').serialize(),
			url: "<?= site_url('User/pesan') ?>",
			dataType: "JSON",
			success: function (data) {
				if (data == 'true') {
					getdata();

					$('#nama').val('');
					$('#email').val('');
					$('#phone').val('');
					$('#subject').val('');
					$('#pesan').val('');
					alert("Data Berhasil Ditambah");
				} else {
					alert("Data Gagal Ditambah");
				}
			}
		});
	});

</script>
</body>

</html>
