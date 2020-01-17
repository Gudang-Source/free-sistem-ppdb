<?php

include "../config.php";

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	
	if (!empty($_POST['set_file'])) {
		$jam = date('H_i_s');	
		$folder = "File/Setting/";
		$nama = $_FILES['set_file']['name'];
		$tmp  = $_FILES['set_file']['tmp_name'];	
		$upload = $folder . $jam . "_" . $nama;
		$simpan = $jam . "_" . $nama;
		move_uploaded_file($tmp, $upload);


	    $updateSQL = sprintf("UPDATE tb_setting SET set_name=%s, set_value=%s, set_file=%s WHERE set_id=%s",
						   GetSQLValueString($_POST['set_name'], "text"),
						   GetSQLValueString($_POST['set_value'], "text"),
						   GetSQLValueString($simpan, "text"),
						   GetSQLValueString($_POST['set_id'], "int"));
	} else {
		 $updateSQL = sprintf("UPDATE tb_setting SET set_name=%s, set_value=%s WHERE set_id=%s",
						   GetSQLValueString($_POST['set_name'], "text"),
						   GetSQLValueString($_POST['set_value'], "text"),
						   GetSQLValueString($_POST['set_id'], "int"));
	}

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());
  
  $_SESSION['pesan'] = "Setting berhasil diperbaharui";
  header("location:index.php?hal=setting_tampil");
}

