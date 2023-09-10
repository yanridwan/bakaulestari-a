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

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<?php $this->load->view('admin/partials/aside')?>
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Dashboard</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Dashboard</li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<!-- Small boxes (Stat box) -->
					<div class="row">
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-info">
								<div class="inner">
									<h3><?= $visitor ?></h3>

									<p>Visitors</p>
								</div>
								<div class="icon">
									<i class="ion ion-android-contacts"></i>
								</div>
								<a href="<?= site_url('Admin/visitor')?>" class="small-box-footer">Our Visitors</a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-success">
								<div class="inner">
									<h3><?= $terlaksana ?></h3>

									<p>Agenda Terlaksana</p>
								</div>
								<div class="icon">
									<i class="ion ion-checkmark-circled"></i>
								</div>
								<a href="<?= site_url('Admin/agendaTerlaksana')?>" class="small-box-footer">More info <i
										class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-warning">
								<div class="inner">
									<h3><?= $terjadwal ?></h3>

									<p>Agenda Terjadwal</p>
								</div>
								<div class="icon">
									<i class="ion ion-clipboard"></i>
								</div>
								<a href="<?= site_url('Admin/agendaTerjadwal')?>" class="small-box-footer">More info <i
										class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-danger">
								<div class="inner">
									<h3><?= $gallery ?></h3>

									<p>Gallery Bakau Lestari</p>
								</div>
								<div class="icon">
									<i class="ion ion-images"></i>
								</div>
								<a href="<?= site_url('Admin/galleryWidget')?>" class="small-box-footer">More info <i
										class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>

					</div>
					<!-- /.row -->
					<!-- Main row -->
					<div class="row">
						<!-- Left col -->
						<section class="col-lg-7">
							<!-- Pesan Masuk -->
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">
										<i class="fa fa-envelope-square"></i>&nbsp;
										Pesan Masuk
									</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body p-0">
									<table id="example1" class="table table-striped" style="width:fixed">
										<thead>
											<tr>
												<th style="width: 5%">No</th>
												<th style="width: 18%">Tanggal</th>
												<th>Subject</th>
												<th>Nama</th>
												<!-- <th style="width: 10px">Email</th> -->
												<th>No. Hp</th>
												<!-- <th style="width: 10px">Pesan</th> -->
												<th style="width: 20%">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1;
                      						foreach($masuk as $tampil) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td>
													<?= date('D,' , strtotime($tampil->tanggal_masuk)) ?><br>
													<?= date('d-M-Y' , strtotime($tampil->tanggal_masuk)) ?></td>
												<td><?= $tampil->customer_subject ?></td>
												<td><?= $tampil->customer_nama ?></td>
												<!-- <td><?= $tampil->customer_email ?></td> -->
												<td><?= $tampil->customer_phone ?></td>
												<!-- <td><?= $tampil->customer_order ?></td> -->
												<td>
													<button type="button" class="btn btn-info btn-sm"
														data-toggle="modal"
														data-target="#baca<?= $tampil->customer_id ?>">
														<i class="far fa-envelope"></i>
													</button>
													<button type="button" class="btn btn-danger btn-sm"
														data-toggle="modal"
														data-target="#hapus<?= $tampil->customer_id ?>">
														<i class="far fa-trash-alt"></i>
													</button>
												</td>
											</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
								<div class="card-footer clearfix">
								<?php if (!empty($masuk)) { ?>
									<button type="button" class="btn btn-primary float-right"> <a
											href="<?= site_url('admin/order') ?>" style="color:white">
											Load More
									</button></a>
								<?php }else {
									echo " <center style='color:#6555559e'>Tidak Ada Pesan Baru</center>";
								}?>
								</div>
							</div>
							<!-- /.card -->
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">
										Recently Added Agenda
									</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body p-0">
									<table id="example1" class="table table-striped" style="width:fixed">
										<thead>
											<tr>
												<th style="width: 5%">No</th>
												<th style="width: 18%">Tanggal</th>
												<th>Nama</th>
												<th>Deskripsi</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1;
											foreach ($agenda as $a) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td>
													<?= date('D,' , strtotime($a->agenda_tanggal)) ?><br>
													<?= date('d-M-Y' , strtotime($a->agenda_tanggal)) ?></td>
												<td><?= $a->agenda_nama ?></td>
												<td><?= substr($a->agenda_deskripsi, 0, 60) . "..." ?></td>
												<td><?= $a->agenda_status ?></td>
											</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
								<div class="card-footer clearfix">
								<?php if (!empty($agenda)) { ?>
									<button type="button" class="btn btn-primary float-right"> <a
											href="<?= site_url('admin/agendaData') ?>" style="color:white">
											Load More
									</button></a>
								<?php }else {
									echo " <center style='color:#6555559e'>Tidak Ada Agenda Baru</center>";
								}?>
								</div>
							</div>
							<!-- /.card -->
						</section>
						<section class="col-lg-5">
							<!-- Calendar -->
							<div class="card bg-secondary">
								<div class="card-header border-0">
									<h3 class="card-title">
										<i class="far fa-calendar-alt"></i>&nbsp;
										Calendar
									</h3>
									<!-- tools card -->
									<!-- <div class="card-tools">
										<button type="button" class="btn btn-secondary btn-sm"
											data-card-widget="collapse">
											<i class="fas fa-minus"></i>
										</button>
									</div> -->
									<!-- /. tools -->
								</div>
								<!-- /.card-header -->
								<div class="card-body pt-0">
									<!--The calendar -->
									<div id="calendar" style="width: 100%"></div>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Recently Added Gallery</h3>

									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse">
											<i class="fas fa-minus"></i>
										</button>
										<button type="button" class="btn btn-tool" data-card-widget="remove">
											<i class="fas fa-times"></i>
										</button>
									</div>
								</div>
								<!-- /.card-header -->
								<div class="card-body p-0">
									<ul class="products-list product-list-in-card pl-2 pr-2">
										<?php $no = 1;
										foreach ($asd as $asd) : ?>
										<li class="item">
											<div class="product-img">
												<img src="<?= base_url('upload/Gallery/') . $asd->gallery_gambar ?>"
													alt="Product Image" class="img-size-50">
											</div>
											<div class="product-info">
												<a href="javascript:void(0)"
													class="product-title"><?= $asd->gallery_nama ?>
													<?php if ($asd->gallery_status == "Bakau Lestari"){ ?>
														<span class="badge badge-warning float-right">Bakau Lestari</span>
													<?php } else { ?>
														<span class="badge badge-info float-right">Satwa</span>
													<?php } ?>
												</a><br>
												<span class="product-description">
													<?= $asd->gallery_deskripsi ?>
												</span>
											</div>
										</li>
										<?php endforeach ?>
									</ul>
								</div>
								<!-- /.card-body -->
								<div class="card-footer text-center">
								<?php if (!empty($asd)) { ?>
									<a href="<?= site_url('admin/gallery') ?>" class="uppercase">View All</a>
								<?php }else {
									echo " <center style='color:#6555559e'>Tidak Ada Gallery Baru</center>";
								}?>
									
								</div>
								<!-- /.card-footer -->
							</div>
							<!-- /.card -->
						</section>
						<!-- /.Left col -->
					</div>
					<!-- /.row (main row) -->
				</div><!-- /.container-fluid -->
				
			</section>
			<!-- /.content -->
		</div>
		<!-- Modal Baca Pesan -->
		<?php $no = 0;
        foreach ($masuk as $psn) : $no++; ?>
		<div class="modal fade" id="baca<?= $psn->customer_id ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Pesan Masuk</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="<?= site_url('Admin/terbaca')?>" enctype="multipart/form-data">
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
									<input type="text" class="form-control" name="subject" placeholder="suject"
										value="<?= $psn->customer_subject?>" readonly>
								</div>
								<div class="form-group">
									<label for="pesan">Pesan</label>
									<textarea rows="3" class="form-control" name="pesan"
										value="<?= $psn->customer_order?>"
										placeholder="<?= $psn->customer_order?>" readonly></textarea>
								</div>
							</div>
							<div class="modal-footer justify-content-between">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
								<button type="submit" class="btn btn-primary">Terbaca</button>
							</div>
						</div>
					</form>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<?php endforeach ?>
		<!-- Modal Hapus pesan -->
		<?php $no = 0;
            foreach ($masuk as $cust) : $no++; ?>
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
						<a href="<?= site_url('Admin/hapus/' . $cust->customer_id) ?>"><button type="button"
								class="btn btn-danger">Hapus</button></a>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
		<?php $this->load->view('admin/partials/logout')?>
		<!-- /.content-wrapper -->
		<footer class="main-footer">
			<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
			All rights reserved.
			<div class="float-right d-none d-sm-inline-block">
				<b>Version</b> 3.2.0
			</div>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<?php $this->load->view('admin/partials/script')?>
	<script>
		$('#calendar').datetimepicker({
			format: 'L',
			inline: true
		});

	</script>
</body>

</html>
