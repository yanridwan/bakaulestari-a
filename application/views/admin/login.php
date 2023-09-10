<?php
    if($this->session->userdata('role') == 'admin'){
        echo "<script>document.location = '" . site_url('Admin/home') . "';</script>";
    }
    else {
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Log In</title>
	<?php $this->load->view('admin/partials/head')?>
	<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?= base_url('assets/admin/')?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<!-- /.login-logo -->
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="#" class="h1"><b>Admin</b></a>
			</div>
			<div class="card-body">
				<form method="POST" action="<?= site_url('Login/index') ?>">
					<div class="input-group mb-3">
						<input type="email" class="form-control" placeholder="Email" name="email" required autofocus>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control form-password" placeholder="Password" name="password" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-8">
							<div class="icheck-primary">
								<input type="checkbox" id="show" class="show">
								<label for="show">
									Show Password
								</label>
							</div>
						</div>
					</div>
					<!-- /.col -->
					<div class="col-4 ml-auto">
						<button type="submit" class="btn btn-primary btn-block">Sign In</button>
					</div>
					<!-- /.col -->
				</form>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.login-box -->
	<!-- SweetAlert2 -->
	<script src="<?= base_url('assets/admin/')?>plugins/sweetalert2/sweetalert2.min.js"></script>
	<?php $this->load->view('admin/partials/script')?>

<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
	<?php if($this->session->flashdata('error')) { ?>
	$('.swalDefaultError').ready(function() { 
      Toast.fire({
        icon: 'error',
        title: 'Mohon Maaf, Username atau password Anda salah'
      })
    });
	<?php } ?>
 });
</script>
<script type="text/javascript">
        $(document).ready(function() {
            $('.show').click(function() {
                if ($(this).is(':checked')) {
                    $('.form-password').attr('type', 'text');
                } else {
                    $('.form-password').attr('type', 'password');
                }
            });
        });
    </script>


</body>

</html>
<?php } ?>