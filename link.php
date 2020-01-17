<?php

if (!isset($_GET['hal'])){
    include 'main.php';
}

else {

	switch(isset($_GET['hal'])) {		
	
		case ($_GET['hal'] == "menu_sambutan"):
			include "menu_sambutan.php";
			break;
		
		case ($_GET['hal'] == "menu_pesan"):
			include "menu_pesan.php";
			break;
			
		case ($_GET['hal'] == "menu_pesan_input"):
			include "menu_pesan_input.php";
			break;
			
		case ($_GET['hal'] == "menu_pesan_detail"):
			include "menu_pesan_detail.php";
			break;
		
		case ($_GET['hal'] == "menu_berita"):
			include "menu_berita.php";
			break;
			
		case ($_GET['hal'] == "menu_berita_detail"):
			include "menu_berita_detail.php";
			break;
		
		case ($_GET['hal'] == "menu_alur"):
			include "menu_alur.php";
			break;	
		
		case ($_GET['hal'] == "menu_jurnal"):
			include "menu_jurnal.php";
			break;	
			
		case ($_GET['hal'] == "menu_jurusan"):
			include "menu_jurusan.php";
			break;	
			
		case ($_GET['hal'] == "menu_kuota"):
			include "menu_kuota.php";
			break;	
			
		case ($_GET['hal'] == "menu_pendaftaran"):
			include "menu_pendaftaran.php";
			break;	
			
		case ($_GET['hal'] == "menu_pendaftaran_edit"):
			include "menu_pendaftaran_edit.php";
			break;
			
		case ($_GET['hal'] == "menu_pendaftaran_cek"):
			include "menu_pendaftaran_cek.php";
			break;
		
		case ($_GET['hal'] == "menu_kalender"):
			include "menu_kalender.php";
			break;
		
		case ($_GET['hal'] == "menu_akun"):
			include "menu_akun.php";
			break;
			
		case ($_GET['hal'] == "menu_profil"):
			include "menu_profil.php";
			break;

		case ($_GET['hal'] == ""):		
		case (!file_exists($_GET['hal'] . ".php")):	
			include "404.php";
			break;
	}
}