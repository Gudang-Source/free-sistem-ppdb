<?php 
include "../config.php";

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "index.php";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_koneksi, $koneksi);
  
  $LoginRS__query=sprintf("SELECT * FROM tb_user WHERE user_name=%s AND user_password=%s AND user_level=1 AND user_aktif='Y'",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $koneksi) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
	 
	 $_SESSION['user_id'] = mysql_result($LoginRS , 0, 'user_id');
	 $_SESSION['user_name'] = $loginUsername;
	 $_SESSION['user_nama_lengkap'] = mysql_result($LoginRS , 0, 'user_nama_lengkap');
	 $_SESSION['user_level'] = 1;
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
	$_SESSION['pesan'] = "Maaf Login Tidak Diketahui";
    header('Location:login.php');
  }
}