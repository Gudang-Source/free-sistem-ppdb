<?php

if (!isset($_GET['hal'])){
    include 'main.php';
}

else {

	switch(isset($_GET['hal'])) {
		
		
		case ($_GET['hal'] == "setting_tampil"):
			include "setting_tampil.php";
			break;
			
		case ($_GET['hal'] == "setting_edit"):
			include "setting_edit.php";
			break;	
		
		case ($_GET['hal'] == "user_input"):
			include "user_input.php";
			break;
		
		case ($_GET['hal'] == "user_tampil"):
			include "user_tampil.php";
			break;
			
		case ($_GET['hal'] == "user_edit"):
			include "user_edit.php";
			break;	
		
		case ($_GET['hal'] == "jurusan_tampil"):
			include "jurusan_tampil.php";
			break;
			
		case ($_GET['hal'] == "jurusan_edit"):
			include "jurusan_edit.php";
			break;	
		
		case ($_GET['hal'] == "jurusan_input"):
			include "jurusan_input.php";
			break;
			
		case ($_GET['hal'] == "siswa_tampil"):
			include "siswa_tampil.php";
			break;
			
		case ($_GET['hal'] == "siswa_jurnal"):
			include "siswa_jurnal.php";
			break;
			
		case ($_GET['hal'] == "siswa_detail"):
			include "siswa_detail.php";
			break;
			
		case ($_GET['hal'] == "berita_tampil"):
			include "berita_tampil.php";
			break;
		
		case ($_GET['hal'] == "berita_input"):
			include "berita_input.php";
			break;
			
		case ($_GET['hal'] == "berita_edit"):
			include "berita_edit.php";
			break;

		case ($_GET['hal'] == "pesan_tampil"):
			include "pesan_tampil.php";
			break;
			
		case ($_GET['hal'] == "pesan_balas"):
			include "pesan_balas.php";
			break;
			
		case ($_GET['hal'] == ""):		
		case (!file_exists($_GET['hal'] . ".php")):	
			include "404.php";
			break;
	}
}