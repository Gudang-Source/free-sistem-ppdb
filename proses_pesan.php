<?php

include "config.php";

$user = $_SESSION['user_id'];

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO tb_pesan (pesan_id_user,
  								pesan_judul, 
  								pesan_text) VALUES (%s, %s, %s)",
                       GetSQLValueString($user, "text"),
					   GetSQLValueString($_POST['pesan_judul'], "text"),
                       GetSQLValueString($_POST['pesan_text'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());
  
  $_SESSION['pesan'] = "Pesan anda terkirim!";
  header("location:index.php?hal=menu_pesan");
}