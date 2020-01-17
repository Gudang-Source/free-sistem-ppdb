<?php

include "config.php";
$siswa = $_SESSION['user_id'];
$nis = $_POST['siswa_nis'];

//--------------------------------------- Perintah untuk upload
if (!empty($_FILES['siswa_berkas']['name'])) {
	
	$jam = date('H_i_s');	
	$folder = "File/Berkas/";
	$nama = $_FILES['siswa_berkas']['name'];
	$tmp  = $_FILES['siswa_berkas']['tmp_name'];	
	$upload = $folder . $jam . "_" . $nama;
	$simpan = $jam . "_" . $nama;
	move_uploaded_file($tmp, $upload);
	
	$berkas = mysql_query("INSERT INTO tb_berkas (berkas_id_user, berkas_upload_name)
						VALUES ('$siswa', '$simpan')");
}
//--------------------------------------- Perintah untuk upload

//--------------------------------------- Validasi
if (empty($_POST['siswa_id_jur']) || empty($_POST['siswa_nama']) || empty($nis)) {
	$_SESSION['pesan'] = "Mohon Lengkapi data anda";
	header("location:index.php?hal=menu_pendaftaran");
}
//--------------------------------------- Validasi


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	
  $sql = mysql_query("SELECT * FROM tb_siswa WHERE siswa_nis='$nis'");
  $ada = mysql_num_rows($sql);
  
  if ($ada) {
		$_SESSION['pesan'] = "Maaf! NIS sudah terdaftar";
		header("location:index.php?hal=menu_pendaftaran");
  } else {
	  
	  	//--------------------------------------- Perintah untuk No Pendaftaran
		$sql_kode = mysql_query("SELECT siswa_no_psb FROM tb_siswa ORDER BY siswa_id DESC LIMIT 1");
		$str_kode = mysql_result($sql_kode, 0, 'siswa_no_psb');
		
		$prefix = date('Ym'); //2015060001
		$kode_urut = (int) substr($str_kode, 6, 6);
		$kode_urut++;	
		$kode = $prefix . '' . sprintf("%04s", $kode_urut);
				
		//--------------------------------------- Perintah untuk No Pendaftaran
	  	
		$insertSQL = sprintf("INSERT INTO tb_siswa (siswa_id_user,
										siswa_no_psb,
										siswa_id_jur, 
										siswa_nama, 
										siswa_nis, 
										siswa_jk, 
										siswa_tmplahir, 
										siswa_tgllahir, 
										siswa_agama, 
										siswa_alamat, 
										siswa_ayah_nama, 
										siswa_ayah_alamat, 
										siswa_ayah_pek, 
										siswa_ayah_hp, 
										siswa_sekolah_asal, 
										siswa_sekolah_sta, 
										siswa_sekolah_alm, 
										siswa_no_sttb, 
										siswa_no_skhun, 
										siswa_thn_lls, 
										siswa_nilai) VALUES (%s, %s, %s, UPPER(%s), %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
						   GetSQLValueString($_POST['siswa_id_user'], "int"),
						   GetSQLValueString($kode, "text"),
						   GetSQLValueString($_POST['siswa_id_jur'], "int"),
						   GetSQLValueString($_POST['siswa_nama'], "text"),
						   GetSQLValueString($_POST['siswa_nis'], "text"),
						   GetSQLValueString($_POST['siswa_jk'], "text"),
						   GetSQLValueString($_POST['siswa_tmplahir'], "text"),
						   GetSQLValueString($_POST['siswa_tgllahir'], "date"),
						   GetSQLValueString($_POST['siswa_agama'], "text"),
						   GetSQLValueString($_POST['siswa_alamat'], "text"),
						   GetSQLValueString($_POST['siswa_ayah_nama'], "text"),
						   GetSQLValueString($_POST['siswa_ayah_alamat'], "text"),
						   GetSQLValueString($_POST['siswa_ayah_pek'], "text"),
						   GetSQLValueString($_POST['siswa_ayah_hp'], "text"),
						   GetSQLValueString($_POST['siswa_sekolah_asal'], "text"),
						   GetSQLValueString($_POST['siswa_sekolah_sta'], "text"),
						   GetSQLValueString($_POST['siswa_sekolah_alm'], "text"),
						   GetSQLValueString($_POST['siswa_no_sttb'], "text"),
						   GetSQLValueString($_POST['siswa_no_skhun'], "text"),
						   GetSQLValueString($_POST['siswa_thn_lls'], "text"),
						   GetSQLValueString($_POST['siswa_nilai'], "int"));
		
		mysql_select_db($database_koneksi, $koneksi);
		$Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());
		
		$_SESSION['pesan'] = "Data berhasil disimpan";
		header("location:index.php?hal=menu_pendaftaran");
	}
}


if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE tb_siswa SET siswa_id_jur=%s, siswa_nama=UPPER(%s), siswa_nis=%s, siswa_jk=%s, siswa_tmplahir=%s, siswa_tgllahir=%s, siswa_agama=%s, siswa_alamat=%s, siswa_ayah_nama=%s, siswa_ayah_alamat=%s, siswa_ayah_pek=%s, siswa_ayah_hp=%s, siswa_sekolah_asal=%s, siswa_sekolah_sta=%s, siswa_sekolah_alm=%s, siswa_no_sttb=%s, siswa_no_skhun=%s, siswa_thn_lls=%s, siswa_nilai=%s WHERE siswa_no_psb=%s",
                       GetSQLValueString($_POST['siswa_id_jur'], "int"),
                       GetSQLValueString($_POST['siswa_nama'], "text"),
                       GetSQLValueString($_POST['siswa_nis'], "text"),
                       GetSQLValueString($_POST['siswa_jk'], "text"),
                       GetSQLValueString($_POST['siswa_tmplahir'], "text"),
                       GetSQLValueString($_POST['siswa_tgllahir'], "date"),
                       GetSQLValueString($_POST['siswa_agama'], "text"),
                       GetSQLValueString($_POST['siswa_alamat'], "text"),
                       GetSQLValueString($_POST['siswa_ayah_nama'], "text"),
                       GetSQLValueString($_POST['siswa_ayah_alamat'], "text"),
                       GetSQLValueString($_POST['siswa_ayah_pek'], "text"),
                       GetSQLValueString($_POST['siswa_ayah_hp'], "text"),
                       GetSQLValueString($_POST['siswa_sekolah_asal'], "text"),
                       GetSQLValueString($_POST['siswa_sekolah_sta'], "text"),
                       GetSQLValueString($_POST['siswa_sekolah_alm'], "text"),
                       GetSQLValueString($_POST['siswa_no_sttb'], "text"),
                       GetSQLValueString($_POST['siswa_no_skhun'], "text"),
                       GetSQLValueString($_POST['siswa_thn_lls'], "text"),
                       GetSQLValueString($_POST['siswa_nilai'], "int"),
                       GetSQLValueString($_POST['siswa_no_psb'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());
  
  $_SESSION['pesan'] = "Data berhasil diperbaharui";
  header("location:index.php?hal=menu_pendaftaran");
}
