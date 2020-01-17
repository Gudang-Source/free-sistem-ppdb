<?php

include "../config.php";

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	
	$baca = mysql_query("UPDATE tb_pesan SET pesan_baca='Y' WHERE pesan_id=$_POST[pesan_id]");
	
  	$insertSQL = sprintf("INSERT INTO tb_pesan (pesan_id_user, pesan_text, pesan_parent) VALUES (%s, %s, %s)",
                       GetSQLValueString($_SESSION['user_id'], "text"),
					   GetSQLValueString($_POST['pesan_text'], "text"),
                       GetSQLValueString($_POST['pesan_id'], "int"));

  	mysql_select_db($database_koneksi, $koneksi);
  	$Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());

	$_SESSION['pesan'] = "Pesan balasan terkirim";
   	header("location:index.php?hal=pesan_balas&pesan_id=$_POST[pesan_id]");
}