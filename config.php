<?php 

require_once('Connections/koneksi.php');

session_start();

mysql_select_db($database_koneksi, $koneksi);

/*
 * Identitas
 */

$sekolah = "SMK N 1 BERBAKTI";
$alamat = "Jl. Kartini No 10, Jakarta";
$email = "ppdb@gmail.com";
$tahun = "2016/2017";

/*
 * Function
 */


if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}


function logout(){

	if ((isset($_GET["akun"])) && ($_GET["akun"] == "logout")) {	
		unset($_SESSION['user_id']);
		unset($_SESSION['user_name']);
		unset($_SESSION['user_level']);
		session_destroy();
		header("location:index.php");
	}	
	
	if ((isset($_GET["akun"])) && ($_GET["akun"] == "logout2")) {	
		unset($_SESSION['user_id']);
		unset($_SESSION['user_name']);
		unset($_SESSION['user_level']);
		session_destroy();
		header("location:../index.php");
	}	
}

function  tanggal_indonesia1($tgl){
	$tanggal  =  substr($tgl,8,2);
	$bulan  =  substr($tgl,5,2);
	$tahun  =  substr($tgl,0,4);
return  $tanggal.'-'.$bulan.'-'.$tahun;
}

function  tanggal_indonesia2($tgl){
	$tanggal  =  substr($tgl,8,2);
	$bulan  =  getBulan(substr($tgl,5,2));
	$tahun  =  substr($tgl,0,4);
return  $tanggal.' '.$bulan.' '.$tahun;
}
 
function  getBulan($bln){
	switch  ($bln){
		case  1:
		return  "Januari";
		break;
		case  2:
		return  "Februari";
		break;
		case  3:
		return  "Maret";
		break;
		case  4:
		return  "Maret";
		break;
		case  5:
		return  "Mei";
		break;
		case  6:
		return  "Juni";
		break;
		case  7:
		return  "Juli";
		break;
		case  8:
		return  "Agustus";
		break;
		case  9:
		return  "September";
		break;
		case  10:
		return  "Oktober";
		break;
		case  11:
		return  "November";
		break;
		case  12:
		return  "Desember";
		break;
	}
}