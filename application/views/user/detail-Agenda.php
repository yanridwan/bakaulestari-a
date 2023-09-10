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
	<section class="ftco-section">
    	<div class="container">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 style="margin-bottom:-8em"><?php if($agenda->agenda_status == 'sudah terlaksana') {
			echo "Kegiatan Kami";								
			} else{
			echo "Jadwal Kami";
			}?>
			</h2>
          </div>
        </div>   		
</section>
	<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 mb-5 ftco-animate">
					<a href="<?= base_url('upload/Agenda/' . $agenda->agenda_gambar)?>" class="image-popup"><img
							src="<?= base_url('upload/Agenda/' . $agenda->agenda_gambar)?>" class="img-fluid"
							alt="<?= $agenda->agenda_nama?>"></a>
				</div>
				<div class="col-lg-6 product-details pl-md-5 ftco-animate">
				<span class="icon-calendar"> <?= date('D, d-M-Y', strtotime($agenda->agenda_tanggal)) ?> </span>
					<h3><?= $agenda->agenda_nama?></h3>
					<p align="justify"><?= $agenda->agenda_deskripsi?>
					</p>
				</div>
			</div>
		</div>
	</section>
	<section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3" style="margin-top:-8em">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading"><?php if($agenda->agenda_status == 'sudah terlaksana') {
			echo "Activity";								
			} else{
			echo "Scheduled";
			}?></span>
            <h2 class="mb-4">Related News</h2>
            <p>Berita yang lainnya</p>
          </div>
        </div>   		
    	</div>
    	<div class="container">
			<?php  if($agenda->agenda_status == 'sudah terlaksana') { ?>		
    		<div class="row">
				<?php $no = 0; 
					foreach ($terlaksana as $aaa) : $no++ ?>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="<?= site_url('User/detailAgenda/' . $aaa->agenda_id)?>" class="img-prod"><img style="height:180px" class="img-fluid" src="<?= base_url('upload/Agenda/' . $aaa->agenda_gambar)?>">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
						<span class="icon-calendar"> <?= date('D, d-M-Y', strtotime($aaa->agenda_tanggal)) ?> </span>
							<h3><a href="<?= site_url('User/detailAgenda/' . $aaa->agenda_id)?>" style="font-weight: 600;"><?= $aaa->agenda_nama?></a></h3>
							<div class="d-flex">
							<p align="justify"><?= substr($aaa->agenda_deskripsi, 0, 100) . "..." ?></p>
							</div>
						</div>
    				</div>
    			</div>
				<?php endforeach ?>
    		</div>		
			<?php } else { ?> 
    		<div class="row">
				<?php $no = 0; 
					foreach ($terjadwal as $aaa) : $no++ ?>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="<?= site_url('User/detailAgenda/' . $aaa->agenda_id)?>" class="img-prod"><img style="height:180px" class="img-fluid" src="<?= base_url('upload/Agenda/' . $aaa->agenda_gambar)?>">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
						<span class="icon-calendar"> <?= date('D, d-M-Y', strtotime($aaa->agenda_tanggal)) ?> </span>
							<h3><a href="<?= site_url('User/detailAgenda/' . $aaa->agenda_id)?>" style="font-weight: 600;"><?= $aaa->agenda_nama?></a></h3>
							<div class="d-flex">
							<p align="justify"><?= substr($aaa->agenda_deskripsi, 0, 100) . "..." ?></p>
							</div>
						</div>
    				</div>
    			</div>
				<?php endforeach ?>
    		</div>
			<?php } ?> 
    	</div>
    </section>


	<?php $this->load->view('user/partials/footer')?>


	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#F96D00" /></svg></div>


	<?php $this->load->view('user/partials/script')?>

	<!-- <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script> -->

</body>

</html>
