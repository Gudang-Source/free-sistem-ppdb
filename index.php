<?php include "config.php"; logout(); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PPDB Online</title>
<link rel="shortcut icon" href="Asset/images/favicon.png" />
<link href="Asset/css/bootstrap.min.css" rel="stylesheet">
<link href="Asset/css/font-awesome.min.css" rel="stylesheet">
<link href="Asset/css/style.css" rel="stylesheet">
<link href="Asset/css/datepicker.css" rel="stylesheet">

<script src="Asset/js/jquery.js"></script>
<script src="Asset/js/bootstrap.min.js"></script>
<script src="Asset/js/bootstrap.datepicker.js"></script>
</head>

<body>

<div class="container-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<a href="index.php" alt="PPDB Online"><img src="Asset/images/logo.png"></a>
				<div class="pull-right text-right">
					<div>Alamat Sekolah : <?php echo $alamat; ?></div>
					<div>Email : <?php echo $email; ?></div>
					<?php if (!empty($_SESSION['user_id'])) { ?>
						<div>Selamat Datang 
							<a href="index.php?hal=menu_profil"><b><?php echo $_SESSION['user_nama_lengkap']; ?></b></a> | 
							<a href="index.php?akun=logout"><b>Logout</b></a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-banner">
	<div class="container">
	<div class="row">
		<div class="col-md-3">
		<div class="menu-banner">
			<div class="head">
				<div><b>Pencarian Hasil Seleksi</b></div>
				<div style="font-size:11px;margin-left:1px;">Pendaftaran Siswa PPDB Online</div>
			</div>
			<div class="content">
				<form method="get" action="">
                	<input type="hidden" name="hal" value="menu_pendaftaran_cek">
					<input class="form-control" name="no_psb" type="text" placeholder="Nomor Pendaftaran" pattern="[0-9]+">
				</form>
				<div class="space"></div>
				<i class="fa fa-keyboard-o" aria-hidden="true"></i> Masukkan Nomor Pendaftaran
			</div>
		</div>	
		</div>	

		<div class="header-banner"></div>	

	</div>		
	</div>
</div>

<div class="container-content">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
			    <div class="menu-utama">
				<a href="index.php" class="item"><i class="fa fa-home"></i> Beranda</a>
				<a href="index.php?hal=menu_sambutan" class="item"><i class="fa fa-bullhorn"></i> Sambutan Kepala</a>
				<a href="index.php?hal=menu_berita" class="item"><i class="fa fa-coffee"></i> Berita</a>
				<a href="index.php?hal=menu_pesan" class="item"><i class="fa fa-envelope"></i> Pesan Anda</a>
				<?php if (empty($_SESSION['user_id'])) { ?>
					<a href="admin/index.php" class="item"><i class="fa fa-sign-in"></i> Login Admin</a>
				<?php } ?>
				</div>
			</div>	
			<div class="col-md-9">
				<div class="content-utama">
					<?php 
					
						ob_start();
				
						include "link.php"; 
						unset($_SESSION['pesan']);
						
						ob_end_flush();
						
					?>
				</div>				
			</div>
		</div>
		<footer>
				Copyright &copy; 2016. PPDB Online.
		</footer>
	</div>	
</div>

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="loginmodal-container">
		<button type="button" class="close" data-dismiss="modal">
        					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        				</button>
			<h1>Login Sistem</h1>
			<form method="POST" action="proses_akun.php">
				<div class="form-group">
					<label>Username</label>
					<input type="text" class="form-control" name="username" placeholder="Username">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" placeholder="Password">
				</div>
					<input type="submit" class="btn btn-primary" value="Login">
					<a href="index.php?hal=menu_akun" class="btn btn-success">Daftar Akun Baru</a>
					<input type="hidden" name="form_login" value="login">
			</form>
		</div>
	</div>
</div>
<script> $(".input-group.date").datepicker({ autoclose: true, todayHighlight: true }); </script>
</body>
</html>