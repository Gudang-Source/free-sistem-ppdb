<?php

include "../config.php";

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO tb_user (user_name, user_password, user_email, user_nama_lengkap, user_level, user_aktif) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['user_name'], "text"),
                       GetSQLValueString($_POST['user_password'], "text"),
                       GetSQLValueString($_POST['user_email'], "text"),
                       GetSQLValueString($_POST['user_nama_lengkap'], "text"),
                       GetSQLValueString($_POST['user_level'], "int"),
                       GetSQLValueString($_POST['user_aktif'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());
  
  $_SESSION['pesan'] = "User berhasil ditambahkan";
  header("location:index.php?hal=user_tampil");
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $f = $_POST['user_aktif'] == 'Y' ? 'Y' : 'N';
  
  if ($_POST['user_password'] != "") {
	  $updateSQL = sprintf("UPDATE tb_user SET user_name=%s, user_password=%s, user_email=%s, user_nama_lengkap=%s, user_level=%s, user_aktif=%s WHERE user_id=%s",
						   GetSQLValueString($_POST['user_name'], "text"),
						   GetSQLValueString($_POST['user_password'], "text"),
						   GetSQLValueString($_POST['user_email'], "text"),
						   GetSQLValueString($_POST['user_nama_lengkap'], "text"),
						   GetSQLValueString($_POST['user_level'], "int"),
						   GetSQLValueString($f, "text"),
						   GetSQLValueString($_POST['user_id'], "int"));
  } else {
	  $updateSQL = sprintf("UPDATE tb_user SET user_name=%s, user_email=%s, user_nama_lengkap=%s, user_level=%s, user_aktif=%s WHERE user_id=%s",
						   GetSQLValueString($_POST['user_name'], "text"),
						   GetSQLValueString($_POST['user_email'], "text"),
						   GetSQLValueString($_POST['user_nama_lengkap'], "text"),
						   GetSQLValueString($_POST['user_level'], "int"),
						   GetSQLValueString($f, "text"),
						   GetSQLValueString($_POST['user_id'], "int"));	  
  }

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());
  
  $_SESSION['pesan'] = "User berhasil diperbaharui";
  header("location:index.php?hal=user_tampil");
}
