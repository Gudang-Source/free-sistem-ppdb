<?php

include "config.php";
$siswa = $_SESSION['user_id'];

if (isset($_GET['validasi']) && $_GET['validasi'] == 1) {	
		$valid = mysql_query("UPDATE tb_siswa SET siswa_validasi='Y' WHERE siswa_id_user='$siswa'");
		header("location:index.php?hal=menu_pendaftaran");
	}