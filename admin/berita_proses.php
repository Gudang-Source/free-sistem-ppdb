<?php

include "../config.php";

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO tb_berita (berita_judul, berita_text) VALUES (%s, %s)",
                       GetSQLValueString($_POST['berita_judul'], "text"),
                       GetSQLValueString($_POST['berita_text'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());
  
  $_SESSION['pesan'] = "Berita berhasil ditambahkan";
  header("location:index.php?hal=berita_tampil");
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $f = $_POST['berita_aktif'] == 'Y' ? 'Y' : 'N';
  $updateSQL = sprintf("UPDATE tb_berita SET berita_tgl=%s, berita_judul=%s, berita_text=%s, berita_aktif=%s WHERE berita_id=%s",
                       GetSQLValueString($_POST['berita_tgl'], "date"),
                       GetSQLValueString($_POST['berita_judul'], "text"),
                       GetSQLValueString($_POST['berita_text'], "text"),
                       GetSQLValueString($f, "text"),
                       GetSQLValueString($_POST['berita_id'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());
  
  $_SESSION['pesan'] = "Berita berhasil diperbaharui";
  header("location:index.php?hal=berita_tampil");
}

if ((isset($_GET['hapus'])) && ($_GET['hapus'] != "")) {
  $deleteSQL = sprintf("DELETE FROM tb_berita WHERE berita_id=%s",
                       GetSQLValueString($_GET['hapus'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($deleteSQL, $koneksi) or die(mysql_error());
  
  $_SESSION['pesan'] = "Berita berhasil dihapus";
  header("location:index.php?hal=berita_tampil");
}