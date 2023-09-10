<div class="container">
	<!-- <div class="row"> -->
		<!-- <div class="col-md-6"> -->
			<a class="navbar-brand" style="color:#6B8C42"href="<?= site_url('User/home')?>">
			<img src="<?= base_url('assets/user/') ?>images/logo.png" width="30" height="30" class="d-inline-block"> Kelompok Tani Hutan Bakau Lestari </a><br>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>
		<!-- </div> -->

	<div class="collapse navbar-collapse" id="ftco-nav">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item <?php if($this->uri->segment(2) == "home"){
					echo "cta cta-colored";
				} ?>"><a href="<?= site_url('User/home')?>" class="nav-link" style="<?php if($this->uri->segment(2) == "home"){
																					echo "color:white; background:#6B8C42";
																				} ?>">Home</a></li>
			<li class="nav-item <?php if($this->uri->segment(2) == "profile"){
					echo "cta cta-colored";
				} ?>"><a href="<?= site_url('User/profile')?>" class="nav-link" style="<?php if($this->uri->segment(2) == "profile"){
																					echo "color:white; background:#6B8C42";
																				} ?>">Profile</a></li>
			<li class="nav-item <?php if($this->uri->segment(2) == "agenda"){
					echo "cta cta-colored";
				} ?>"><a href="<?= site_url('User/agenda')?>" class="nav-link" style="<?php if($this->uri->segment(2) == "agenda"){
																					echo "color:white; background:#6B8C42";
																				} ?>">Agenda</a></li>
			<li class="nav-item <?php if($this->uri->segment(2) == "gallery"){
					echo "cta cta-colored";
				} ?>"><a href="<?= site_url('User/gallery')?>" class="nav-link" style="<?php if($this->uri->segment(2) == "gallery"){
																					echo "color:white; background:#6B8C42";
																				} ?>">Gallery</a></li>
			<li class="nav-item <?php if($this->uri->segment(2) == "contact"){
					echo "cta cta-colored";
				} ?>"><a href="<?= site_url('User/contact')?>" class="nav-link" style="<?php if($this->uri->segment(2) == "contact"){
																					echo "color:white; background:#6B8C42";
																				} ?>">Contact</a></li>
		</ul>
	</div>
	<!-- </div> -->
</div>
