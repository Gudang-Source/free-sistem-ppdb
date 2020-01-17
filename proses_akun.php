<?php

include "config.php";

if ((isset($_POST["form_login"])) && ($_POST["form_login"] == "login")) {
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = mysql_query("SELECT * FROM tb_user WHERE user_name='$username' AND user_password='$password' AND user_aktif='Y'");
	$ada = mysql_num_rows($sql);
	
	if ($ada) {
		$_SESSION['user_id'] = mysql_result($sql , 0, 'user_id');
		$_SESSION['user_name'] = mysql_result($sql , 0, 'user_name');
		$_SESSION['user_nama_lengkap'] = mysql_result($sql , 0, 'user_nama_lengkap');
		$_SESSION['user_level'] = mysql_result($sql , 0, 'user_level');
		header("location:index.php");
	} else {
		$_SESSION['pesan'] = "Data Login tidak ditemukan!";
		header("location:index.php");
	}
}

if ((isset($_POST["form_daftar"])) && ($_POST["form_daftar"] == "daftar")) {
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama = $_POST['namalengkap'];
	$email = $_POST['email'];
	
	$sql = mysql_query("SELECT * FROM tb_user WHERE user_name='$username'");
	$ada = mysql_num_rows($sql);
	
	if ($ada) {
		$_SESSION['pesan'] = "Username sudah digunakan, mohon diganti!";
		header("location:index.php?hal=menu_akun");
	} else {
		mysql_query("INSERT INTO tb_user (user_name, user_password, user_nama_lengkap, user_email) VALUES ('$username', '$password', UPPER('$nama'), '$email')");
		$_SESSION['pesan'] = "Pendaftaran berhasil! Silakan Login";
		header("location:index.php");
	}
}


if ((isset($_POST["form_profil"])) && ($_POST["form_profil"] == "profil")) {

  if ($_POST['user_password'] != "") {
	  $updateSQL = sprintf("UPDATE tb_user SET user_name=%s, user_password=%s, user_email=%s, user_nama_lengkap=%s WHERE user_id=%s",
						   GetSQLValueString($_POST['user_name'], "text"),
						   GetSQLValueString($_POST['user_password'], "text"),
						   GetSQLValueString($_POST['user_email'], "text"),
						   GetSQLValueString($_POST['user_nama_lengkap'], "text"),
						   GetSQLValueString($_POST['user_id'], "int"));
  } else {
	  $updateSQL = sprintf("UPDATE tb_user SET user_name=%s, user_email=%s, user_nama_lengkap=%s WHERE user_id=%s",
						   GetSQLValueString($_POST['user_name'], "text"),
						   GetSQLValueString($_POST['user_email'], "text"),
						   GetSQLValueString($_POST['user_nama_lengkap'], "text"),
						   GetSQLValueString($_POST['user_id'], "int"));
  }

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());
  
  $_SESSION['pesan'] = "Data Profil berhasil diperbaharui!";
  header("location:index.php?hal=menu_profil");
}