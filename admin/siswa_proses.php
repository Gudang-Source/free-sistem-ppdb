<?php

include "../config.php";

$no_psb = $_GET['no_psb'];

if (isset($no_psb) && $_GET['status'] == "terima" ) {	

		
		$skuota = mysql_query("SELECT jur_kuota FROM tb_jurusan WHERE jur_id=(SELECT siswa_id_jur FROM tb_siswa WHERE siswa_no_psb='$no_psb')");
		$kuota = mysql_result($skuota, 0, 'jur_kuota'); 
		$stot = mysql_query("SELECT COUNT(*) as KUO FROM tb_siswa WHERE siswa_terima='Y' AND siswa_id_jur=(SELECT siswa_id_jur FROM tb_siswa WHERE siswa_no_psb='$no_psb')");
		$tot = mysql_result($stot, 0, 'KUO');
		
		if ($tot < $kuota ) {
			$valid = mysql_query("UPDATE tb_siswa SET siswa_terima='Y' WHERE siswa_no_psb='$no_psb'") or die(mysql_error());
		
			$_SESSION['pesan'] = "<b>Diterima</b>. Status berhasil diproses";
			header("location:index.php?hal=siswa_tampil");
		} else {
			$_SESSION['pesan'] = "<b>Error</b>. Kuota sudah terpenuhi, proses tidak bisa dilanjutkan.";
			header("location:index.php?hal=siswa_tampil");
		}
	}
	
if (isset($no_psb) && $_GET['status'] == "tolak") {	
		$valid = mysql_query("UPDATE tb_siswa SET siswa_terima='N' WHERE siswa_no_psb='$no_psb'") or die(mysql_error());
		
		$_SESSION['pesan'] = "<b>Ditolak</b>. Status berhasil diproses";
		header("location:index.php?hal=siswa_tampil");
	}