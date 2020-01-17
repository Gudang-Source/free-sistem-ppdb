<?php

include "../config.php";

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO tb_jurusan (jur_kode, jur_nama, jur_keterangan, jur_kuota) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['jur_kode'], "text"),
                       GetSQLValueString($_POST['jur_nama'], "text"),
                       GetSQLValueString($_POST['jur_keterangan'], "text"),
                       GetSQLValueString($_POST['jur_kuota'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());

	$_SESSION['pesan'] = "Jurusan berhasil ditambahkan";
   	header("location:index.php?hal=jurusan_tampil");
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE tb_jurusan SET jur_kode=%s, jur_nama=%s, jur_keterangan=%s, jur_kuota=%s WHERE jur_id=%s",
                       GetSQLValueString($_POST['jur_kode'], "text"),
                       GetSQLValueString($_POST['jur_nama'], "text"),
                       GetSQLValueString($_POST['jur_keterangan'], "text"),
                       GetSQLValueString($_POST['jur_kuota'], "int"),
                       GetSQLValueString($_POST['jur_id'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());
  
    $_SESSION['pesan'] = "Jurusan berhasil diperbaharui";
   header("location:index.php?hal=jurusan_tampil");
}