<?php 

	include "../config.php"; 
	logout();
	
		$MM_authorizedUsers = "";
	$MM_donotCheckaccess = "true";
	
	// *** Restrict Access To Page: Grant or deny access to this page
	function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
	  // For security, start by assuming the visitor is NOT authorized. 
	  $isValid = False; 
	
	  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
	  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
	  if (!empty($UserName)) { 
		// Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
		// Parse the strings into arrays. 
		$arrUsers = Explode(",", $strUsers); 
		$arrGroups = Explode(",", $strGroups); 
		if (in_array($UserName, $arrUsers)) { 
		  $isValid = true; 
		} 
		// Or, you may restrict access to only certain users based on their username. 
		if (in_array($UserGroup, $arrGroups)) { 
		  $isValid = true; 
		} 
		if (($strUsers == "") && true) { 
		  $isValid = true; 
		} 
	  } 
	  return $isValid; 
	}
	
	$MM_restrictGoTo = "login.php";
	if (!((isset($_SESSION['user_name'])) && ($_SESSION['user_level'] == 1) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['user_name'], $_SESSION['MM_UserGroup'])))) {   
	  $MM_qsChar = "?";
	  $MM_referrer = $_SERVER['PHP_SELF'];
	  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
	  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
	  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
	  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
	  header("Location: ". $MM_restrictGoTo); 
	  exit;
	}
	?> 
	

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PPDB Online</title>
<link rel="shortcut icon" href="../Asset/images/favicon.png" />
<link href="../Asset/css/bootstrap.min.css" rel="stylesheet">
<link href="../Asset/css/font-awesome.min.css" rel="stylesheet">
<link href="../Asset/css/style.css" rel="stylesheet">
<link href="../Asset/css/datepicker.css" rel="stylesheet">
<link href="../Asset/css/bootstrap.datatable.css" rel="stylesheet">

<script src="../Asset/js/jquery.js"></script>
<script src="../Asset/js/bootstrap.min.js"></script>
<script src="../Asset/js/bootstrap.datepicker.js"></script>
<script src="../Asset/js/jquery.datatable.min.js"></script>
<script src="../Asset/js/bootstrap.datatable.js"></script>
<script src="../Asset/tinymce/tinymce.min.js"></script>
<script type="text/javascript" charset="utf-8">
		$(document).ready(function () {
			$('#dtb').dataTable();
		});
	</script> 
</head>

<body>

<div class="container-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<a href="index.php" alt="PPDB Online"><img src="../Asset/images/logo.png"></a>
			<div class="pull-right text-right">
					<?php if (!empty($_SESSION['user_id'])) { ?>
						<div>Selamat Datang 
							<a href="index.php?hal=menu_profil"><b><?php echo $_SESSION['user_nama_lengkap']; ?></b></a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-content">
	<div class="space"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
			    <div class="menu-utama">
				<a href="index.php" class="item"><i class="fa fa-home"></i> Beranda</a>
				<a href="index.php?hal=siswa_tampil" class="item"><i class="fa fa-users"></i> Calon Siswa</a>
				<a href="index.php?hal=jurusan_tampil" class="item"><i class="fa fa-users"></i> Jurusan</a>
				<a href="index.php?hal=berita_tampil" class="item"><i class="fa fa-coffee"></i> Berita</a>
				<a href="index.php?hal=pesan_tampil" class="item"><i class="fa fa-envelope"></i> Pesan</a>
				<a href="index.php?hal=setting_tampil" class="item"><i class="fa fa-cogs"></i> Setting</a>
				<a href="index.php?hal=user_tampil" class="item"><i class="fa fa-user"></i> User</a>
				<a href="index.php?akun=logout2" class="item"><i class="fa fa-sign-out"></i> Keluar</a>
				</div>
			</div>	
			<div class="col-md-9">
				<div class="content-utama">
					<?php include "link.php"; unset($_SESSION['pesan'])?>
				</div>				
			</div>
		</div>
		<footer>
				Copyright &copy; 2016. PPDB Online.
		</footer>
	</div>	
</div>

</body>
</html>