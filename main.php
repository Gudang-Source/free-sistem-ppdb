<?php 
if (isset($_SESSION['pesan'])) {
	echo '<div class="alert alert-info">' . $_SESSION['pesan'] . '</div>';
} 
?>

<div class="row">
	<div class="col-md-3">
		<div class="metro-box metro-primary">
			<a href="index.php?hal=menu_alur">
				<h1><i class="fa fa-map" aria-hidden="true"></i></h1>
				Alur Pendaftaran								
			</a>
		</div>
	</div>
	<div class="col-md-3">
		<div class="metro-box metro-primary">
			<a href="index.php?hal=menu_pendaftaran">
				<h1><i class="fa fa-mouse-pointer" aria-hidden="true"></i></h1>
				Pendaftaran								
			</a>
		</div>
	</div>
	<div class="col-md-3">
		<div class="metro-box metro-primary">
			<a href="index.php?hal=menu_jurnal">
				<h1><i class="fa fa-check-square-o" aria-hidden="true"></i></h1>
				Jurnal Pendaftaran								
			</a>
		</div>
	</div>
	<div class="col-md-3">
		<?php if (!empty($_SESSION['user_id'])) { ?>
			<div class="metro-box metro-danger">
				<a href="index.php?akun=logout">
					<h1><i class="fa fa-lock" aria-hidden="true"></i></h1>
					Logout								
				</a>
			</div>
		<?php } else { ?>
			<div class="metro-box metro-primary">
				<a href="" data-toggle="modal" data-target="#login-modal">
					<h1><i class="fa fa-unlock" aria-hidden="true"></i></h1>
					Login User								
				</a>
			</div>
		<?php } ?>
	</div>
	</div>	
	<div class="row">
	<div class="col-md-4">
		<div class="metro-box metro-primary">
			<a href="index.php?hal=menu_kuota">
				<h1><i class="fa fa-bar-chart" aria-hidden="true"></i></h1>
				Kuota Per Jurusan								
			</a>
		</div>
	</div>
	<div class="col-md-4">
		<div class="metro-box metro-primary">
			<a href="index.php?hal=menu_jurusan">
				<h1><i class="fa fa-send" aria-hidden="true"></i></h1>
				Jurusan								
			</a>
		</div>
	</div>
	<div class="col-md-4">
		<div class="metro-box metro-primary">
			<a href="index.php?hal=menu_kalender">
				<h1><i class="fa fa-calendar" aria-hidden="true"></i></h1>
				Kalender Akademik								
			</a>
		</div>
	</div>
</div>	