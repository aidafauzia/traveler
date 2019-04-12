<?php 
require_once 'action/koneksi.php'
?>

<?php require_once 'page/header.php' ?>
<style type="text/css">
p{
	padding-left: 5px;
}
</style>

<div class="gtco-loader"></div>

<div id="page">

	
	<!-- <div class="page-inner"> -->
		<nav class="gtco-nav" role="navigation" style="background-color: #000">
			<div class="gtco-container">

				<div class="row">
					<div class="col-sm-4 col-xs-12">
						<div id="gtco-logo"><a href="index.php">Traveler <em>.</em></a></div>
					</div>
					<div class="col-xs-8 text-right menu-1">
						<ul>
							<li class="has-dropdown">
								<a href="#">Travel</a>
								<ul class="dropdown">
									<li><a href="#">Europe</a></li>
									<li><a href="#">Asia</a></li>
									<li><a href="#">America</a></li>
									<li><a href="#">Canada</a></li>
								</ul>
							</li>
							<li><a href="pricing.php">Pricing</a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>	
					</div>
				</div>

			</div>
		</nav>
		
		<div id="gtco-features" >
			<div class="gtco-container">
				<div class="tamprute">
					
				</div>
			</div>
		</div>

		
		<div class="overlay"></div>
		<div class="konfirm">
			<div class="gtco-container">
				<div class="col-md-8">
					<div class="kbreadcum">
						<h3>Detail Pemesanan</h3>
						<div style="width: 100%; height: 1px; background-color: red; margin: 10px 0px;"></div>
						<?php
						$id_rute = $_GET['id_rute'];
						$jumlah = $_GET['jumlah'];
						$data = mysqli_query($connect, "SELECT rute.asal, rute.tujuan, rute.tanggal, rute.sisa_seat, rute.berangkat, rute.tiba, rute.harga, rute.id_rute, transport.nama, transport.logo, transport.kode from rute, transport where rute.maskapai=transport.id_transport and rute.id_rute=".$id_rute."");
						$d = mysqli_fetch_array($data);
						echo "<i class='icon-paper-plane'> </i>";
						echo $d['asal'];
						echo " <i class='icon-arrow-right'> </i> ";
						echo $d['tujuan'];
						?>
						<p><?php echo date('D, d/M/Y', strtotime($d['tanggal']));?></p>						
						<p><?php echo '<img src="assets/images/'.$d['logo'].'" width="70px" > '.$d['nama'].' '.$d['kode'].''; ?></p>
						<p><?php echo $d['berangkat'].' <span class="icon-arrow-right" style="margin-left:100px; margin-right:50px;"></span> '.$d['tiba']?><br>
							<?php echo $d['asal'].' <span class="icon-arrow-right" style="margin:50px"></span> '.$d['tujuan']?></p>
							<?php
							$tiba = strtotime($d['tiba']);
							$berangkat = strtotime($d['berangkat']);
							$durasi = $tiba-$berangkat;
							echo '<h5>Durasi: '.gmdate("H",$durasi).' jam '.gmdate("i", $durasi). ' menit </h5>';
							?>
						</div>
					</div>

					<div class="col-md-4">
						<div class="kbreadcum">
							<h3><span class="icon-credit-card"> Rincian Harga</span></h3>
							<div style="width: 100%; height: 1px; background-color: red; margin: 10px 0px;"></div>
							<p><?php echo 'Harga<span style="float:right">Rp '.$d['harga'].'</span>'; ?></p>
							<p><?php echo 'Jumlah<span style="float:right">'.$jumlah.'</span>'; ?></p>
							<p><?php echo 'Total harga<span style="float:right">Rp '.$total=$d['harga']*$jumlah.'</span>'; ?></p>
							<a href="<?php echo 'booking.php?id_rute='.$d['id_rute'].'&jumlah='.$jumlah.'&sisa_seat='.$d['sisa_seat'].'' ?>" class="btn btn-primary" style="position: relative; left: 63%;">Pesan</a>
						</div>
					</div>

					<div class="clearfix"></div>
				</div>
			</div>


			<footer id="gtco-footer" role="contentinfo">
				<div class="gtco-container">
					<div class="row row-p	b-md">

						<div class="col-md-4">
							<div class="gtco-widget">
								<h3>About Us</h3>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore eos molestias quod sint ipsum possimus temporibus officia iste perspiciatis consectetur in fugiat repudiandae cum. Totam cupiditate nostrum ut neque ab?</p>
							</div>
						</div>

						<div class="col-md-2 col-md-push-1">
							<div class="gtco-widget">
								<h3>Destination</h3>
								<ul class="gtco-footer-links">
									<li><a href="#">Europe</a></li>
									<li><a href="#">Australia</a></li>
									<li><a href="#">Asia</a></li>
									<li><a href="#">Canada</a></li>
									<li><a href="#">Dubai</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-2 col-md-push-1">
							<div class="gtco-widget">
								<h3>Hotels</h3>
								<ul class="gtco-footer-links">
									<li><a href="#">Luxe Hotel</a></li>
									<li><a href="#">Italy 5 Star hotel</a></li>
									<li><a href="#">Dubai Hotel</a></li>
									<li><a href="#">Deluxe Hotel</a></li>
									<li><a href="#">BoraBora Hotel</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-md-push-1">
							<div class="gtco-widget">
								<h3>Get In Touch</h3>
								<ul class="gtco-quick-contact">
									<li><a href="#"><i class="icon-phone"></i> +1 234 567 890</a></li>
									<li><a href="#"><i class="icon-mail2"></i> info@freehtml5.co</a></li>
									<li><a href="#"><i class="icon-chat"></i> Live Chat</a></li>
								</ul>
							</div>
						</div>

					</div>

					<div class="row copyright">
						<div class="col-md-12">
							<p class="pull-left">
								<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
								<small class="block">Designed by <a href="https://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></small>
							</p>
							<p class="pull-right">
								<ul class="gtco-social-icons pull-right">
									<li><a href="#"><i class="icon-twitter"></i></a></li>
									<li><a href="#"><i class="icon-facebook"></i></a></li>
									<li><a href="#"><i class="icon-linkedin"></i></a></li>
									<li><a href="#"><i class="icon-dribbble"></i></a></li>
								</ul>
							</p>
						</div>
					</div>

				</div>
				<?php require_once 'page/footer.php' ?>